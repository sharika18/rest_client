<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once (dirname(__FILE__) . "/Email.php");
class PayrollSlip extends Email {
    public function __construct(){
        include "construct.php";
        $this->load->library('session'); 
        $this->load->library('Pdf');
        $this->load->helper('form'); 
    }

    public function getVwKaryawanDetailByNIP($NIP = '')
    {
        $getVwKaryawanDetailByNIP_get = json_decode($this -> curl -> simple_get ($this->API.'/Karyawan/getVwKaryawanDetailByNIP/', array('AR-KEY'=>$this->key, 'NIP'=>$NIP) ),true);
        $data['detailKaryawan'] = null;
        if($getVwKaryawanDetailByNIP_get)
        {
        $data['detailKaryawan'] = $getVwKaryawanDetailByNIP_get['data'];
        }
        return $data['detailKaryawan'];
    }

    public function getVwKaryawanDetailByID($ID = '')
    {
        $getVwKaryawanDetailByID_get = json_decode($this -> curl -> simple_get ($this->API.'/Karyawan/getVwKaryawanDetailByID/', array('AR-KEY'=>$this->key, 'ID'=>$ID) ),true);
        $data['detailKaryawan'] = null;
        if($getVwKaryawanDetailByID_get)
        {
        $data['detailKaryawan'] = $getVwKaryawanDetailByID_get['data'];
        }
        return $data['detailKaryawan'];
    }

    public function getAllFinanceByPeriode($periode = '')
    {
        $getAllFinanceByPeriode_get = json_decode($this -> curl -> simple_get ($this->API.'/Payroll/getAllFinanceByPeriode/', array('AR-KEY'=>$this->key, 'periode'=>$periode) ),true);
        $data['financeDataByPeriode'] = null;
        if($getAllFinanceByPeriode_get)
        {
        $data['financeDataByPeriode'] = $getAllFinanceByPeriode_get['data'];
        }
        return $data['financeDataByPeriode'];
    }

    public function getAllFinanceByPeriodeNIP($periode = '', $NIP = '')
    {
        $getAllFinanceByPeriodeNIP_get = json_decode($this -> curl -> simple_get ($this->API.'/Payroll/getAllFinanceByPeriodeNIP/', array('AR-KEY'=>$this->key, 'periode'=>$periode, 'NIP'=>$NIP) ),true);
        $data['financeDataByPeriodeNIP'] = null;
        if($getAllFinanceByPeriodeNIP_get)
        {
        $data['financeDataByPeriodeNIP'] = $getAllFinanceByPeriodeNIP_get['data'];
        }
        return $data['financeDataByPeriodeNIP'];
    }

    function EditKaryawanIsSent($NIP = "", $Periode = "", $isSent)
    {
        $now = date('Y-m-d H:i:s');
        $data = array(
            'AR-KEY'          => $this->key,
            'NIP'             => $NIP,
            'Periode'         => $Periode,
            'isSent'          => $isSent,
            // 'ModifiedBy'      => $this->session->userdata('loggedIn')['userName'],
            // 'ModifiedDate'    => $now
        );
        $update = $this->curl->simple_put($this->API.'/Payroll/updatePayrollByNIPPeriode/', $data, array(CURLOPT_BUFFERSIZE => 10)); 
        if($update)
        {
            $this->session->set_flashdata('success',$this->successPut);
        }else
        {
            $this->session->set_flashdata('error',$this->errorPut);
            echo $NIP;
        }
        print_r($data);
        
    }

    public function extractExcel($fileName = "")
	{
        if(!isset($_FILES['fileExcel']['name']))
        {
            $this->session->set_flashdata('error',"File belum dipilih");
        }
        else
        {
            $now = date('Y-m-d H:i:s');
            $newFilename = $fileName;
            $dir =$this->tmpPaymentExcelDir.$newFilename;
            if (is_file($dir)) 
            {
                unlink($dir);
            }
            
            $uploadFile = $_FILES['fileExcel']['name'];
            $tmpFile = $_FILES['fileExcel']['tmp_name'];
            $extension = pathinfo($uploadFile, PATHINFO_EXTENSION);
            if($extension == 'xlsx')
            {
                move_uploaded_file($tmpFile, $dir);

                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                $spreadsheet = $reader->load($dir);
                $sheetData = $spreadsheet->getActiveSheet()->toArray();
                //echo '<pre>';
                //print_r($sheetData);
                $sheetCount = count($sheetData);
                if($sheetCount > 1)
                {
                    for($i = 1; $i < $sheetCount; $i++)
                    {
                        $Periode    = $sheetData[$i][0];
                        $NIP        = $sheetData[$i][1];
                        $Nama       = $sheetData[$i][2];
                        
                        $dataDetail = $this->getVwKaryawanDetailByNIP($NIP);
                        if(!isset($dataDetail[0]['NIP']))
                        {
                            continue;
                        }
                        //print_r($data);
                        $Email          = "";
                        $jabatanTugas   = "";
                        $unit           = "";
                        $status         = "";

                        if (isset($dataDetail[0]['Email'])) {
                            $Email = $dataDetail[0]['Email'];
                        }
                        if (isset($dataDetail[0]['jabatanTugas'])) {
                            $jabatanTugas = $dataDetail[0]['jabatanTugas'];
                        }
                        if (isset($dataDetail[0]['unit'])) {
                            $unit = $dataDetail[0]['unit'];
                        }
                        if (isset($dataDetail[0]['status'])) {
                            $status = $dataDetail[0]['status'];
                        }
                        //Pendapatan
                        $incomeGajiPokok                = (double)$sheetData[$i][3];
                        $incomeTunjanganHarian          = (double)$sheetData[$i][4];
                        $incomeTunjanganJabatan1        = (double)$sheetData[$i][5];
                        $incomeTunjanganJabatan2        = (double)$sheetData[$i][6];
                        $incomeTunjanganAnak            = (double)$sheetData[$i][7];
                        $incomeTunjanganIstri           = (double)$sheetData[$i][8];
                        $incomeRewardKehadiran          = (double)$sheetData[$i][9];
                        $incomeKepanitiaan              = (double)$sheetData[$i][10];
                        $incomeSupervisi                = (double)$sheetData[$i][11];
                        $incomeTambahanJamMengajar      = (double)$sheetData[$i][12];
                        $incomeTambahanExtracurricular  = (double)$sheetData[$i][13];

                        //Fasilitas
                        $fasilitasTempatTinggal         = (double)$sheetData[$i][14];
                        $fasilitasAir                   = (double)$sheetData[$i][15];
                        $fasilitasListrik               = (double)$sheetData[$i][16];
                        $fasilitasMaintenanceRumah      = (double)$sheetData[$i][17];
                        $fasilitasKonsumsiBulanan       = (double)$sheetData[$i][18];
                        $fasilitasSembako               = (double)$sheetData[$i][19];
                        $fasilitasBiayaSekolah          = (double)$sheetData[$i][20];
                        $fasilitasSppSekolah            = (double)$sheetData[$i][21];
                        $fasilitasKesehatan             = (double)$sheetData[$i][22];
                        $fasilitasBpjsKesehatan         = (double)$sheetData[$i][23];
                        $fasilitasBpjsKetenagakerjaan   = (double)$sheetData[$i][24];
                        $fasilitasLainnya               = (double)$sheetData[$i][25];

                        //Potongan
                        $hariKetidakhadiran             = (int)$sheetData[$i][26];
                        $potonganKetidakhadiran         = (double)$sheetData[$i][27];
                        $potonganKeterlambatan          = (double)$sheetData[$i][28];
                        $potonganArisanPondok           = (double)$sheetData[$i][29];
                        $potonganDanaPensiun            = (double)$sheetData[$i][30];
                        $potonganTabungan               = (double)$sheetData[$i][31];
                        $potonganPinjaman               = (double)$sheetData[$i][32];
                        $potonganPembiayaanBma1         = (double)$sheetData[$i][33];
                        $potonganPembiayaanBma2         = (double)$sheetData[$i][34];
                        $potonganBpjsKesehatan          = (double)$sheetData[$i][35];
                        $potonganBpjsKetenagakerjaan    = (double)$sheetData[$i][36];
                        $potonganArisanQurban           = (double)$sheetData[$i][37];
                        $potonganLainnya                = (double)$sheetData[$i][38];

                        $incomeTotal                    = 
                                                        (
                                                            0
                                                            + $incomeGajiPokok
                                                            + $incomeTunjanganHarian
                                                            + $incomeTunjanganJabatan1
                                                            + $incomeTunjanganJabatan2
                                                            + $incomeTunjanganAnak
                                                            + $incomeTunjanganIstri
                                                            + $incomeRewardKehadiran
                                                            + $incomeKepanitiaan
                                                            + $incomeSupervisi
                                                            + $incomeTambahanJamMengajar
                                                            + $incomeTambahanExtracurricular

                                                        );
                        $fasilitasTotal                 =
                                                        (
                                                            0
                                                            + $fasilitasTempatTinggal
                                                            + $fasilitasAir
                                                            + $fasilitasListrik
                                                            + $fasilitasMaintenanceRumah
                                                            + $fasilitasKonsumsiBulanan
                                                            + $fasilitasSembako
                                                            + $fasilitasBiayaSekolah
                                                            + $fasilitasSppSekolah
                                                            + $fasilitasKesehatan
                                                            + $fasilitasBpjsKesehatan
                                                            + $fasilitasBpjsKetenagakerjaan
                                                            + $fasilitasLainnya
                                                        );
                        $potonganTotal                  =
                                                        (
                                                            0
                                                            + $potonganKetidakhadiran
                                                            + $potonganKeterlambatan
                                                            + $potonganArisanPondok
                                                            + $potonganPinjaman
                                                            + $potonganDanaPensiun
                                                            + $potonganTabungan
                                                            + $potonganPembiayaanBma1
                                                            + $potonganPembiayaanBma2
                                                            + $potonganBpjsKesehatan
                                                            + $potonganBpjsKetenagakerjaan
                                                            + $potonganArisanQurban
                                                            + $potonganLainnya
                                                        );

                        $data[] = array(
                            'Periode'           => $Periode,
                            'NIP'               => $NIP,
                            'Nama'              => $Nama,
                            'Email'             => $Email,
                            'jabatanTugas'      => $jabatanTugas,
                            'Unit'              => $unit,
                            'statusKepegawaian' => $status,
                            //Pendapatan
                            'incomeGajiPokok'               => $incomeGajiPokok,
                            'incomeTunjanganHarian'         => $incomeTunjanganHarian,
                            'incomeTunjanganJabatan1'       => $incomeTunjanganJabatan1,
                            'incomeTunjanganJabatan2'       => $incomeTunjanganJabatan2,
                            'incomeTunjanganAnak'           => $incomeTunjanganAnak,
                            'incomeTunjanganIstri'          => $incomeTunjanganIstri,
                            'incomeRewardKehadiran'         => $incomeRewardKehadiran,
                            'incomeKepanitiaan'             => $incomeKepanitiaan,
                            'incomeSupervisi'               => $incomeSupervisi,
                            'incomeTambahanJamMengajar'     => $incomeTambahanJamMengajar,
                            'incomeTambahanExtracurricular' => $incomeTambahanExtracurricular,
                            'incomeTotal'                   => $incomeTotal,
                            //Fasilitas
                            'fasilitasTempatTinggal'        => $fasilitasTempatTinggal,
                            'fasilitasAir'                  => $fasilitasAir,
                            'fasilitasListrik'              => $fasilitasListrik,
                            'fasilitasMaintenanceRumah'     => $fasilitasMaintenanceRumah,
                            'fasilitasKonsumsiBulanan'      => $fasilitasKonsumsiBulanan,
                            'fasilitasSembako'              => $fasilitasSembako,
                            'fasilitasBiayaSekolah'         => $fasilitasBiayaSekolah,
                            'fasilitasSppSekolah'           => $fasilitasSppSekolah,
                            'fasilitasKesehatan'            => $fasilitasKesehatan,
                            'fasilitasBpjsKesehatan'        => $fasilitasBpjsKesehatan,
                            'fasilitasBpjsKetenagakerjaan'  => $fasilitasBpjsKetenagakerjaan,
                            'fasilitasLainnya'              => $fasilitasLainnya,
                            'fasilitasTotal'                => $fasilitasTotal,
                            //Potongan
                            'hariKetidakhadiran'            => $hariKetidakhadiran,
                            'potonganKetidakhadiran'        => $potonganKetidakhadiran,
                            'potonganKeterlambatan'         => $potonganKeterlambatan,
                            'potonganArisanPondok'          => $potonganArisanPondok,
                            'potonganDanaPensiun'           => $potonganDanaPensiun,
                            'potonganTabungan'              => $potonganTabungan,
                            'potonganPinjaman'              => $potonganPinjaman,
                            'potonganPembiayaanBma1'        => $potonganPembiayaanBma1,
                            'potonganPembiayaanBma2'        => $potonganPembiayaanBma2,
                            'potonganBpjsKesehatan'         => $potonganBpjsKesehatan,
                            'potonganBpjsKetenagakerjaan'   => $potonganBpjsKetenagakerjaan,
                            'potonganArisanQurban'          => $potonganArisanQurban,
                            'potonganLainnya'               => $potonganLainnya,
                            'potonganTotal'                 => $potonganTotal
                        );
                    }
                    //print_r($data);
                    return $data;
                }
            }
            else
            {
                $this->session->set_flashdata('error',"Hanya file (.xlsx) yang diperbolehkan");
            }
        }
	}

	public function import($fileName = "")
	{
        $now = date('Y-m-d H:i:s');
        $dataInserted = [];
        $dataDeclined = [];
        $newFilename = $fileName;
        $dir =$this->tmpPaymentExcelDir.$newFilename;
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load($dir);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();
        echo '<pre>';
        //print_r($sheetData);
        $sheetCount = count($sheetData);
        if($sheetCount > 1)
        {
            for($i = 1; $i < $sheetCount; $i++)
            {
                $noTransaksi= date('YmdHisv');
                $Periode    = $sheetData[$i][0];
                $NIP        = $sheetData[$i][1];
                $Nama       = $sheetData[$i][2];
                
                if( trim($NIP) == '')
                continue;

                $data= $this->getVwKaryawanDetailByNIP($NIP);
                
                //print_r($data);
                //$Email          = "";
                $jabatanTugas   = "";
                $unit           = "";
                $status         = "";

                /*if (isset($data[0]['Email'])) {
                    $Email = $data[0]['Email'];
                }*/
                if (isset($data[0]['jabatanTugas'])) {
                    $jabatanTugas = $data[0]['jabatanTugas'];
                }
                if (isset($data[0]['unit'])) {
                    $unit = $data[0]['unit'];
                }
                if (isset($data[0]['status'])) {
                    $status = $data[0]['status'];
                }
                
                //print_r($Email);
                //Pendapatan
                $incomeGajiPokok                = (double)$sheetData[$i][3];
                $incomeTunjanganHarian          = (double)$sheetData[$i][4];
                $incomeTunjanganJabatan1        = (double)$sheetData[$i][5];
                $incomeTunjanganJabatan2        = (double)$sheetData[$i][6];
                $incomeTunjanganAnak            = (double)$sheetData[$i][7];
                $incomeTunjanganIstri           = (double)$sheetData[$i][8];
                $incomeRewardKehadiran          = (double)$sheetData[$i][9];
                $incomeKepanitiaan              = (double)$sheetData[$i][10];
                $incomeSupervisi                = (double)$sheetData[$i][11];
                $incomeTambahanJamMengajar      = (double)$sheetData[$i][12];
                $incomeTambahanExtracurricular  = (double)$sheetData[$i][13];
                //Fasilitas
                $fasilitasTempatTinggal         = (double)$sheetData[$i][14];
                $fasilitasAir                   = (double)$sheetData[$i][15];
                $fasilitasListrik               = (double)$sheetData[$i][16];
                $fasilitasMaintenanceRumah      = (double)$sheetData[$i][17];
                $fasilitasKonsumsiBulanan       = (double)$sheetData[$i][18];
                $fasilitasSembako               = (double)$sheetData[$i][19];
                $fasilitasBiayaSekolah          = (double)$sheetData[$i][20];
                $fasilitasSppSekolah            = (double)$sheetData[$i][21];
                $fasilitasKesehatan             = (double)$sheetData[$i][22];
                $fasilitasBpjsKesehatan         = (double)$sheetData[$i][23];
                $fasilitasBpjsKetenagakerjaan   = (double)$sheetData[$i][24];
                $fasilitasLainnya               = (double)$sheetData[$i][25];

                //Potongan
                $hariKetidakhadiran             = (int)$sheetData[$i][26];
                $potonganKetidakhadiran         = (double)$sheetData[$i][27];
                $potonganKeterlambatan          = (double)$sheetData[$i][28];
                $potonganArisanPondok           = (double)$sheetData[$i][29];
                $potonganDanaPensiun            = (double)$sheetData[$i][30];
                $potonganTabungan               = (double)$sheetData[$i][31];
                $potonganPinjaman               = (double)$sheetData[$i][32];
                $potonganPembiayaanBma1         = (double)$sheetData[$i][33];
                $potonganPembiayaanBma2         = (double)$sheetData[$i][34];
                $potonganBpjsKesehatan          = (double)$sheetData[$i][35];
                $potonganBpjsKetenagakerjaan    = (double)$sheetData[$i][36];
                $potonganArisanQurban           = (double)$sheetData[$i][37];
                $potonganLainnya                = (double)$sheetData[$i][38];

                $data = [
                    'noTransaksi'       => $noTransaksi,
                    'Periode'           => $Periode,
                    'NIP'               => $NIP,
                    'Nama'              => $Nama,
                    //'Email'             => $Email,
                    'jabatanTugas'      => $jabatanTugas,
                    'Unit'              => $unit,
                    'statusKepegawaian' => $status,
                    //Pendapatan
                    'incomeGajiPokok'               => $incomeGajiPokok,
                    'incomeTunjanganHarian'         => $incomeTunjanganHarian,
                    'incomeTunjanganJabatan1'       => $incomeTunjanganJabatan1,
                    'incomeTunjanganJabatan2'       => $incomeTunjanganJabatan2,
                    'incomeTunjanganAnak'           => $incomeTunjanganAnak,
                    'incomeTunjanganIstri'          => $incomeTunjanganIstri,
                    'incomeRewardKehadiran'         => $incomeRewardKehadiran,
                    'incomeKepanitiaan'             => $incomeKepanitiaan,
                    'incomeSupervisi'               => $incomeSupervisi,
                    'incomeTambahanJamMengajar'     => $incomeTambahanJamMengajar,
                    'incomeTambahanExtracurricular' => $incomeTambahanExtracurricular,
                    //Fasilitas
                    'fasilitasTempatTinggal'        => $fasilitasTempatTinggal,
                    'fasilitasAir'                  => $fasilitasAir,
                    'fasilitasListrik'              => $fasilitasListrik,
                    'fasilitasMaintenanceRumah'     => $fasilitasMaintenanceRumah,
                    'fasilitasKonsumsiBulanan'      => $fasilitasKonsumsiBulanan,
                    'fasilitasSembako'              => $fasilitasSembako,
                    'fasilitasBiayaSekolah'         => $fasilitasBiayaSekolah,
                    'fasilitasSppSekolah'           => $fasilitasSppSekolah,
                    'fasilitasKesehatan'            => $fasilitasKesehatan,
                    'fasilitasBpjsKesehatan'        => $fasilitasBpjsKesehatan,
                    'fasilitasBpjsKetenagakerjaan'  => $fasilitasBpjsKetenagakerjaan,
                    'fasilitasLainnya'              => $fasilitasLainnya,
                    //Potongan
                    'hariKetidakhadiran'            => $hariKetidakhadiran,
                    'potonganKetidakhadiran'        => $potonganKetidakhadiran,
                    'potonganKeterlambatan'         => $potonganKeterlambatan,
                    'potonganArisanPondok'          => $potonganArisanPondok,
                    'potonganPinjaman'              => $potonganPinjaman,
                    'potonganDanaPensiun'           => $potonganDanaPensiun,
                    'potonganTabungan'              => $potonganTabungan,
                    'potonganPembiayaanBma1'        => $potonganPembiayaanBma1,
                    'potonganPembiayaanBma2'        => $potonganPembiayaanBma2,
                    'potonganBpjsKesehatan'         => $potonganBpjsKesehatan,
                    'potonganBpjsKetenagakerjaan'   => $potonganBpjsKetenagakerjaan,
                    'potonganArisanQurban'          => $potonganArisanQurban,
                    'potonganLainnya'               => $potonganLainnya,
                    'AR-KEY'        => $this->key,
                ];
                $insert = $this->curl->simple_post($this->API.'/Payroll/createPayroll/', $data, array(CURLOPT_BUFFERSIZE => 10)); 
                if($insert)
                {
                    array_push($dataInserted, $Nama);
                }
                else
                {
                    array_push($dataDeclined, $Nama);
                }
            }

            if(count($dataDeclined) > 0)
            {
                $this->session->set_flashdata('error',"Beberapa data gagal diimport");
            }
            else
            {
                $this->session->set_flashdata('success',$this->successImport);
            }
            print_r($dataDeclined);
            //print_r($this->successImport.join(',', $dataInserted));
        }
        unlink($dir);
	}

    public function payrollSlipCreatePDF($data = null)
    {
        $now = date('d M Y');
        $dataInserted = [];
        $dataDeclined = [];
        
        foreach($data as $row)
        {
            if(trim($row['Email']) == ''){
                //$this->session->set_flashdata('error','Alamat email tidak ada');

                
                //array_push($dataDeclined, $row['Nama']);
            }
            else{
                $year = substr($row['Periode'], 0, 4);
                $month = substr($row['Periode'], -2);
                $periode = $year." ".$month;
                error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
                $pdf = new FPDF('P', 'mm','A4');
                $pdf->AddPage();
                $pdf->SetFont('Arial','B',14);
                $pdf->Cell(0,6,'PESANTREN MODERN ARRISALAH',0,1,'C');
                $pdf->SetFont('Arial','B',12);
                $pdf->Cell(0,6,'SLIP GAJI KARYAWAN PERIODE - '.$periode,0,1,'C');
                $pdf->Cell(10,6,'',0,1);

                //IDENTITAS KARYAWAN
                    $pdf->SetFont('Arial','',10);

                    $pdf->Cell(45,6,'Nama Karyawan',0,0, 'L');
                    $pdf->Cell(5,6,':',0,0, 'C');
                    $pdf->Cell(132,6,$row['Nama'],0,1, 'L');

                    $pdf->Cell(45,6,'Jabatan/Tugas',0,0, 'L');
                    $pdf->Cell(5,6,':',0,0, 'C');
                    $pdf->Cell(132,6,$row['jabatanTugas'],0,1, 'L');

                    $pdf->Cell(45,6,'Unit',0,0, 'L');
                    $pdf->Cell(5,6,':',0,0, 'C');
                    $pdf->Cell(132,6,$row['Unit'],0,1, 'L');

                    $pdf->Cell(45,6,'Status Karyawan',0,0, 'L');
                    $pdf->Cell(5,6,':',0,0, 'C');
                    $pdf->Cell(132,6,$row['statusKepegawaian'],0,1, 'L');

                //LINE
                    $pdf->Line(10,54,195,54);//header
                    $pdf->Line(10,55,195,55);//header
                    
                    $pdf->Line(101,59,101,212);//garis tengah
                    
                    $pdf->Line(10,215,195,215);//garis bawah

                    $pdf->Line(10,234,100,234);//garis total

                    $pdf->Cell(200,6,'',0,1,'L');

                //HONOR TUNJANGAN & POTONGAN
                    $pdf->SetFont('Arial','B',10);
                    $pdf->Cell(45,6,'INCOME',0,0,'L');
                    $pdf->Cell(5,6,'',0,0,'C');
                    $pdf->Cell(40,6,'',0,0,'R');
                    $pdf->Cell(2,6,'',0,0,'C');
                    $pdf->Cell(45,6,'DEDUCTION',0,0,'L');
                    $pdf->Cell(5,6,'',0,0,'C');
                    $pdf->Cell(40,6,'',0,1,'R');

                    $pdf->Cell(45,6,'Honor & Tunjangan',0,0,'L');
                    $pdf->Cell(5,6,'',0,0,'C');
                    $pdf->Cell(40,6,'',0,0,'R');
                    $pdf->Cell(2,6,'',0,0,'C');
                    $pdf->Cell(45,6,'Potongan',0,0,'L');
                    $pdf->Cell(5,6,'',0,0,'C');
                    $pdf->Cell(40,6,'',0,1,'R');

                    $pdf->SetFont('Arial','',10);
                    $pdf->Cell(45,6,'Gaji Pokok',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['incomeGajiPokok'], 0, '.', ','),0,0, 'R');
                    $pdf->Cell(2,6,'',0,0,'C');
                    $pdf->Cell(25,6,'Ketidakhadiran',0,0, 'L');
                    $pdf->SetTextColor(194,8,8);
                    $pdf->SetFont('Arial','B',10);
                    $pdf->Cell(20,6,' ('.$row['hariKetidakhadiran'].' Hari)',0,0, 'L');
                    $pdf->SetFont('Arial','',10);
                    $pdf->SetTextColor(0,0,0);
                    
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['potonganKetidakhadiran'], 0, '.', ','),0,1, 'R');
                    
                    $pdf->Cell(45,6,'Tunjangan Harian',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['incomeTunjanganHarian'], 0, '.', ','),0,0, 'R');
                    $pdf->Cell(2,6,'',0,0,'C');
                    $pdf->Cell(45,6,'Keterlambatan',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['potonganKeterlambatan'], 0, '.', ','),0,1, 'R');

                    $pdf->Cell(45,6,'Tunjangan Jabatan 1',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['incomeTunjanganJabatan1'], 0, '.', ','),0,0, 'R');
                    $pdf->Cell(2,6,'',0,0,'C');
                    $pdf->Cell(45,6,'Arisan Pondok',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['potonganArisanPondok'], 0, '.', ','),0,1, 'R');

                    
                    $pdf->Cell(45,6,'Tunjangan Jabatan 2',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['incomeTunjanganJabatan2'], 0, '.', ','),0,0, 'R');
                    $pdf->Cell(2,6,'',0,0,'C');
                    $pdf->Cell(45,6,'Dana Pensiun',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['potonganDanaPensiun'], 0, '.', ','),0,1, 'R');
                    
                    $pdf->Cell(45,6,'Tunjangan Anak',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['incomeTunjanganAnak'], 0, '.', ','),0,0, 'R');
                    $pdf->Cell(2,6,'',0,0,'C');
                    $pdf->Cell(45,6,'Tabungan',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['potonganTabungan'], 0, '.', ','),0,1, 'R');

                    
                    $pdf->Cell(45,6,'Tunjangan Istri',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['incomeTunjanganIstri'], 0, '.', ','),0,0, 'R');
                    $pdf->Cell(2,6,'',0,0,'C');
                    $pdf->Cell(45,6,'Pinjaman',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['potonganPinjaman'], 0, '.', ','),0,1, 'R');

                    
                    $pdf->Cell(45,6,'Reward Kehadiran',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['incomeRewardKehadiran'], 0, '.', ','),0,0, 'R');
                    $pdf->Cell(2,6,'',0,0,'C');
                    $pdf->Cell(45,6,'Pembiayaan BMA 1',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['potonganPembiayaanBma1'], 0, '.', ','),0,1, 'R');
                    
                    $pdf->Cell(45,6,'Kepanitiaan',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['incomeKepanitiaan'], 0, '.', ','),0,0, 'R');
                    $pdf->Cell(2,6,'',0,0,'C');
                    $pdf->Cell(45,6,'Pembiayaan BMA 2',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['potonganPembiayaanBma2'], 0, '.', ','),0,1, 'R');

                    
                    $pdf->Cell(45,6,'Supervisi',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['incomeSupervisi'], 0, '.', ','),0,0, 'R');
                    $pdf->Cell(2,6,'',0,0,'C');
                    $pdf->Cell(45,6,'BPJS Kesehatan',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['potonganBpjsKesehatan'], 0, '.', ','),0,1, 'R');
                    
                    $pdf->Cell(45,6,'Tambahan Jam Mengajar',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['incomeTambahanJamMengajar'], 0, '.', ','),0,0, 'R');
                    $pdf->Cell(2,6,'',0,0,'C');
                    $pdf->Cell(45,6,'BPJS Ketenagakerjaan',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['potonganBpjsKetenagakerjaan'], 0, '.', ','),0,1, 'R');
                    
                    $pdf->Cell(45,6,'Tambahan Extracurriculer',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['incomeTambahanExtracurricular'], 0, '.', ','),0,0, 'R');
                    $pdf->Cell(2,6,'',0,0,'C');
                    $pdf->Cell(45,6,'Arisan Qurban',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['potonganArisanQurban'], 0, '.', ','),0,1, 'R');

                    $pdf->SetFont('Arial','B',10);
                    $pdf->Cell(90,6,'Fasilitas',0,0, 'L');
                    $pdf->SetFont('Arial','',10);
                    $pdf->Cell(2,6,'',0,0,'C');
                    $pdf->Cell(45,6,'Potongan Lainnya',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['potonganLainnya'], 0, '.', ','),0,1, 'R');

                //FASILITAS
                    $pdf->Cell(45,6,'Tempat Tinggal',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['fasilitasTempatTinggal'], 0, '.', ','),0,0, 'R');
                    $pdf->Cell(92,6,'',0,1, 'R');

                    $pdf->Cell(45,6,'Air',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['fasilitasAir'], 0, '.', ','),0,0, 'R');
                    $pdf->Cell(92,6,'',0,1, 'R');

                    $pdf->Cell(45,6,'Listrik',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['fasilitasListrik'], 0, '.', ','),0,0, 'R');
                    $pdf->Cell(92,6,'',0,1, 'R');

                    $pdf->Cell(45,6,'Maintanance Rumah',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['fasilitasMaintenanceRumah'], 0, '.', ','),0,0, 'R');
                    $pdf->Cell(92,6,'',0,1, 'R');

                    $pdf->Cell(45,6,'Konsumsi Bulanan',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['fasilitasKonsumsiBulanan'], 0, '.', ','),0,0, 'R');
                    $pdf->Cell(92,6,'',0,1, 'R');

                    $pdf->Cell(45,6,'Sembako',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['fasilitasSembako'], 0, '.', ','),0,0, 'R');
                    $pdf->Cell(92,6,'',0,1, 'R');

                    $pdf->Cell(45,6,'Biaya Sekolah',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['fasilitasBiayaSekolah'], 0, '.', ','),0,0, 'R');
                    $pdf->Cell(92,6,'',0,1, 'R');

                    $pdf->Cell(45,6,'SPP Sekolah',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['fasilitasSppSekolah'], 0, '.', ','),0,0, 'R');
                    $pdf->Cell(92,6,'',0,1, 'R');

                    $pdf->Cell(45,6,'Kesehatan',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['fasilitasKesehatan'], 0, '.', ','),0,0, 'R');
                    $pdf->Cell(92,6,'',0,1, 'R');

                    $pdf->Cell(45,6,'BPJS Kesehatan',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['fasilitasBpjsKesehatan'], 0, '.', ','),0,0, 'R');
                    $pdf->Cell(92,6,'',0,1, 'R');

                    $pdf->Cell(45,6,'BPJS Ketenagakerjaan',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['fasilitasBpjsKetenagakerjaan'], 0, '.', ','),0,0, 'R');
                    $pdf->Cell(92,6,'',0,1, 'R');

                    $pdf->Cell(45,6,'Lainnya',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['fasilitasLainnya'], 0, '.', ','),0,0, 'R');
                    $pdf->Cell(92,6,'',0,1, 'R');

                //TOTAL
                    $pdf->Cell(200,1,'',0,1,'L');

                    $pdf->Cell(45,6,'Total Honor & Tunjangan',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['incomeTotal'], 0, '.', ','),0,0, 'R');
                    $pdf->Cell(2,6,'',0,0,'C');
                    $pdf->SetTextColor(194,8,8);
                    $pdf->Cell(45,6,'Total Potongan',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['potonganTotal'], 0, '.', ','),0,1, 'R');

                    
                    $pdf->SetTextColor(0,0,0);
                    $pdf->Cell(45,6,'Total Fasilitas',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['fasilitasTotal'], 0, '.', ','),0,0, 'R');
                    $pdf->Cell(92,6,'',0,1, 'R');

                    $pdf->Cell(45,6,'Total Income (Gross)',0,0, 'L');
                    $pdf->Cell(5,6,': Rp',0,0, 'C');
                    $pdf->Cell(40,6,number_format($row['grossTotal'], 0, '.', ','),0,0, 'R');
                    $pdf->Cell(92,6,'',0,1, 'R');

                    //$pdf->Cell(200,6,'',0,1,'L');
                    $pdf->SetFont('Arial','B',11);
                    $pdf->Cell(45,8,'Total Yang Dibayarkan',0,0, 'L');
                    $pdf->Cell(5,8,': Rp',0,0, 'C');
                    $pdf->Cell(40,8,number_format($row['thpTotal'], 0, '.', ','),0,0, 'R');
                    $pdf->Cell(92,6,'',0,1, 'R');

                //TANDA TANGAN
                    $pdf->Cell(200,5,'',0,1,'L');

                    $pdf->SetFont('Arial','',12);
                    $pdf->Cell(90,6,'',0,0, 'C');
                    $pdf->Cell(2,6,'',0,0,'C');
                    $pdf->Cell(90,6,'Lubuklinggau, '.$now,0,1, 'C');

                    $pdf->SetFont('Arial','',12);
                    $pdf->Cell(90,6,'Disetujui oleh,',0,0, 'C');
                    $pdf->Cell(2,6,'',0,0,'C');
                    $pdf->Cell(90,6,'Diterima oleh,',0,1, 'C');

                    $pdf->Cell(200,8,'',0,1,'L');
                    $pdf->Cell(90,6,'Muchoyarotumillah',0,0, 'C');
                    $pdf->Cell(2,6,'',0,0,'C');
                    $pdf->Cell(90,6,$row['Nama'],0,1, 'C');

                    $pdf->Cell(90,6,'Manajer Keuangan',0,0, 'C');
                    $pdf->Cell(2,6,'',0,0,'C');
                    $pdf->Cell(90,6,'',0,1, 'C');
                //SAVE FILE
                    $filename = "SlipGaji-".$row['NIP']."-".$row['Periode'].".pdf";
                    $dir =$this->paymentSlipsDir.$filename;
                    $pdf->Output($dir, 'F');
                    //$pdf->Output();
                    $subject = "Slip Gaji ".$year." ".$month;
                    $message = 
                    "
                    Assalamualaikum wr. Wb 
                    <br>Dear<b> " 
                    .$row['Nama']
                    ."</b>, <br><br>Berikut ini kami lampirkan rincian income Saudara/i
                    pada bulan <b>".$month." ".$year."</b> yang dapat anda terima, 
                    <br> semoga menjadi berkah dan segala urusan kita Allah ridhoi. 
                    <br><br>Note:<br>Untuk informasi lebih lanjut silahkan hubungi kepala sekolah/kepala unit masing-masing
                    <br><br>
                    Demikian disampaikan dan terima kasih.";
                    //echo $row['Email'];
                    $this->sendMail($row['Email'], $dir, $subject, $message);
                    $this->EditKaryawanIsSent($row['NIP'], $row['Periode'], 1);
                    unlink($dir);
            }
        }
    }

    public function sendPayrollSlipPerPeriod()
    {
        ini_set('max_execution_time',0);
        $periode = $this->input-> post('selectPeriode');
        $data = $this->getAllFinanceByPeriode($periode);
        //print_r($data);
        $this->payrollSlipCreatePDF($data);
        //redirect('Payroll?modul=financePayroll&act=Tambah');
    }

    public function sendPayrollSlipPerEmployee($periode, $NIP)
    {
        $data = $this->getAllFinanceByPeriodeNIP($periode, $NIP);
        //print_r($data);
        $this->payrollSlipCreatePDF($data);
        //redirect('Payroll?modul=financePayroll&act=Tambah');
    }
    
    public function templatePDF()
    {
        error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
                $pdf = new FPDF('P', 'mm','A4');
                $pdf->AddPage();
                $pdf->SetFont('Arial','B',14);
                $pdf->Cell(0,6,'PESANTREN MODERN ARRISALAH',0,1,'C');
                $pdf->SetFont('Arial','B',12);
                $pdf->Cell(0,6,'SLIP GAJI KARYAWAN',0,1,'C');
                $pdf->Cell(10,6,'',0,1);

                //IDENTITAS KARYAWAN
                $pdf->SetFont('Arial','',10);

                $pdf->Cell(45,6,'No Transaksi',0,0, 'L');
                $pdf->Cell(5,6,':',0,0, 'C');
                $pdf->Cell(40,6,"row['noTransaksi']",0,0, 'R');
                $pdf->Cell(2,6,'',0,0,'C');
                $pdf->Cell(45,6,'Nama Karyawan',0,0, 'L');
                $pdf->Cell(5,6,':',0,0, 'C');
                $pdf->Cell(40,6,"row['Nama']",0,1, 'R');

                $pdf->Cell(45,6,'Periode',0,0, 'L');
                $pdf->Cell(5,6,':',0,0, 'C');
                $pdf->Cell(40,6,$periode,0,0, 'R');
                $pdf->Cell(2,6,'',0,0,'C');
                $pdf->Cell(45,6,'Jabatan/Tugas',0,0, 'L');
                $pdf->Cell(5,6,':',0,0, 'C');
                $pdf->Cell(40,6,"row['jabatanTugas']",0,1, 'R');

                $pdf->Cell(92,6,'',0,0,'C');
                $pdf->Cell(45,6,'Unit',0,0, 'L');
                $pdf->Cell(5,6,':',0,0, 'C');
                $pdf->Cell(40,6,"row['Unit']",0,1, 'R');

                $pdf->Cell(92,6,'',0,0,'C');
                $pdf->Cell(45,6,'Status Karyawan',0,0, 'L');
                $pdf->Cell(5,6,':',0,0, 'C');
                $pdf->Cell(40,6,"row['statusKepegawaian']",0,1, 'R');

                //LINE
                $pdf->Line(10,54,195,54);//header
                $pdf->Line(10,55,195,55);//header
                
                $pdf->Line(101,59,101,212);//garis tengah
                
                $pdf->Line(10,215,195,215);//garis bawah

                $pdf->Line(10,234,100,234);//garis total

                $pdf->Cell(200,6,'',0,1,'L');

                //HONOR TUNJANGAN & POTONGAN
                $pdf->SetFont('Arial','B',10);
                $pdf->Cell(45,6,'INCOME',0,0,'L');
                $pdf->Cell(5,6,'',0,0,'C');
                $pdf->Cell(40,6,'',0,0,'R');
                $pdf->Cell(2,6,'',0,0,'C');
                $pdf->Cell(45,6,'DEDUCTION',0,0,'L');
                $pdf->Cell(5,6,'',0,0,'C');
                $pdf->Cell(40,6,'',0,1,'R');

                $pdf->Cell(45,6,'Honor & Tunjangan',0,0,'L');
                $pdf->Cell(5,6,'',0,0,'C');
                $pdf->Cell(40,6,'',0,0,'R');
                $pdf->Cell(2,6,'',0,0,'C');
                $pdf->Cell(45,6,'Potongan',0,0,'L');
                $pdf->Cell(5,6,'',0,0,'C');
                $pdf->Cell(40,6,'',0,1,'R');

                $pdf->SetFont('Arial','',10);
                $pdf->Cell(45,6,'Gaji Pokok',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"",0,0, 'R');
                $pdf->Cell(2,6,'',0,0,'C');
                $pdf->Cell(25,6,'Ketidakhadiran',0,0, 'L');
                $pdf->SetTextColor(194,8,8);
                $pdf->SetFont('Arial','B',10);
                $pdf->Cell(20,6,' (11 Hari)',0,0, 'L');
                $pdf->SetFont('Arial','',10);
                $pdf->SetTextColor(0,0,0);
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"",0,1, 'R');
                
                $pdf->Cell(45,6,'Tunjangan Harian',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"",0,0, 'R');
                $pdf->Cell(2,6,'',0,0,'C');
                $pdf->Cell(45,6,'Keterlambatan',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"",0,1, 'R');

                $pdf->Cell(45,6,'Tunjangan Jabatan 1',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"",0,0, 'R');
                $pdf->Cell(2,6,'',0,0,'C');
                $pdf->Cell(45,6,'Arisan Pondok',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"",0,1, 'R');

                
                $pdf->Cell(45,6,'Tunjangan Jabatan 2',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"",0,0, 'R');
                $pdf->Cell(2,6,'',0,0,'C');
                $pdf->Cell(45,6,'Dana Pensiun',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"",0,1, 'R');
                
                $pdf->Cell(45,6,'Tunjangan Anak',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"",0,0, 'R');
                $pdf->Cell(2,6,'',0,0,'C');
                $pdf->Cell(45,6,'Tabungan',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"",0,1, 'R');

                
                $pdf->Cell(45,6,'Tunjangan Istri',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"",0,0, 'R');
                $pdf->Cell(2,6,'',0,0,'C');
                $pdf->Cell(45,6,'Pinjaman',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"",0,1, 'R');

                
                $pdf->Cell(45,6,'Reward Kehadiran',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"0",0,0, 'R');
                $pdf->Cell(2,6,'',0,0,'C');
                $pdf->Cell(45,6,'Pembiayaan BMA 1',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"0",0,1, 'R');
                
                $pdf->Cell(45,6,'Kepanitiaan',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"0",0,0, 'R');
                $pdf->Cell(2,6,'',0,0,'C');
                $pdf->Cell(45,6,'Pembiayaan BMA 2',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"0",0,1, 'R');

                
                $pdf->Cell(45,6,'Supervisi',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"0",0,0, 'R');
                $pdf->Cell(2,6,'',0,0,'C');
                $pdf->Cell(45,6,'BPJS Kesehatan',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"0",0,1, 'R');
                
                $pdf->Cell(45,6,'Tambahan Jam Mengajar',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"0",0,0, 'R');
                $pdf->Cell(2,6,'',0,0,'C');
                $pdf->Cell(45,6,'BPJS Ketenagakerjaan',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"0",0,1, 'R');
                
                $pdf->Cell(45,6,'Tambahan Extracurriculer',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"0",0,0, 'R');
                $pdf->Cell(2,6,'',0,0,'C');
                $pdf->Cell(45,6,'Arisan Qurban',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"0",0,1, 'R');

                $pdf->SetFont('Arial','B',10);
                $pdf->Cell(90,6,'Fasilitas',0,0, 'L');
                $pdf->SetFont('Arial','',10);
                $pdf->Cell(2,6,'',0,0,'C');
                $pdf->Cell(45,6,'Potongan Lainnya',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"0",0,1, 'R');

                //FASILITAS
                $pdf->Cell(45,6,'Tempat Tinggal',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"0",0,0, 'R');
                $pdf->Cell(92,6,'',0,1, 'R');

                $pdf->Cell(45,6,'Air',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"0",0,0, 'R');
                $pdf->Cell(92,6,'',0,1, 'R');

                $pdf->Cell(45,6,'Listrik',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"0",0,0, 'R');
                $pdf->Cell(92,6,'',0,1, 'R');

                $pdf->Cell(45,6,'Maintanance Rumah',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"0",0,0, 'R');
                $pdf->Cell(92,6,'',0,1, 'R');

                $pdf->Cell(45,6,'Konsumsi Bulanan',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"0",0,0, 'R');
                $pdf->Cell(92,6,'',0,1, 'R');

                $pdf->Cell(45,6,'Sembako',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"0",0,0, 'R');
                $pdf->Cell(92,6,'',0,1, 'R');

                $pdf->Cell(45,6,'Biaya Sekolah',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"0",0,0, 'R');
                $pdf->Cell(92,6,'',0,1, 'R');

                $pdf->Cell(45,6,'SPP Sekolah',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"0",0,0, 'R');
                $pdf->Cell(92,6,'',0,1, 'R');

                $pdf->Cell(45,6,'Kesehatan',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"0",0,0, 'R');
                $pdf->Cell(92,6,'',0,1, 'R');

                $pdf->Cell(45,6,'BPJS Kesehatan',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"0",0,0, 'R');
                $pdf->Cell(92,6,'',0,1, 'R');

                $pdf->Cell(45,6,'BPJS Ketenagakerjaan',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"0",0,0, 'R');
                $pdf->Cell(92,6,'',0,1, 'R');

                $pdf->Cell(45,6,'Lainnya',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"0",0,0, 'R');
                $pdf->Cell(92,6,'',0,1, 'R');

                //TOTAL
                $pdf->Cell(200,1,'',0,1,'L');

                $pdf->Cell(45,6,'Total Honor & Tunjangan',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"0",0,0, 'R');
                $pdf->Cell(2,6,'',0,0,'C');
                $pdf->SetTextColor(194,8,8);
                $pdf->Cell(45,6,'Total Potongan',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"0",0,1, 'R');

                
                $pdf->SetTextColor(0,0,0);
                $pdf->Cell(45,6,'Total Fasilitas',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"0",0,0, 'R');
                $pdf->Cell(92,6,'',0,1, 'R');

                $pdf->Cell(45,6,'Total Income (Gross)',0,0, 'L');
                $pdf->Cell(5,6,': Rp',0,0, 'C');
                $pdf->Cell(40,6,"0",0,0, 'R');
                $pdf->Cell(92,6,'',0,1, 'R');

                //$pdf->Cell(200,6,'',0,1,'L');
                $pdf->SetFont('Arial','B',11);
                $pdf->Cell(45,8,'Total Yang Dibayarkan',0,0, 'L');
                $pdf->Cell(5,8,': Rp',0,0, 'C');
                $pdf->Cell(40,8,"0",0,0, 'R');
                $pdf->Cell(92,6,'',0,1, 'R');

                //TANDA TANGAN
                $pdf->Cell(200,5,'',0,1,'L');

                $pdf->SetFont('Arial','',12);
                $pdf->Cell(90,6,'',0,0, 'C');
                $pdf->Cell(2,6,'',0,0,'C');
                $pdf->Cell(90,6,'Lubuklinggau, 10 Maret 2022',0,1, 'C');

                $pdf->SetFont('Arial','',12);
                $pdf->Cell(90,6,'Disetujui oleh,',0,0, 'C');
                $pdf->Cell(2,6,'',0,0,'C');
                $pdf->Cell(90,6,'Diterima oleh,',0,1, 'C');

                $pdf->Cell(200,8,'',0,1,'L');
                $pdf->Cell(90,6,'Muchoyarotumillah',0,0, 'C');
                $pdf->Cell(2,6,'',0,0,'C');
                $pdf->Cell(90,6,'Amrina Rosyada',0,1, 'C');

                $pdf->Cell(90,6,'Direktur Bagian Keuangan',0,0, 'C');
                $pdf->Cell(2,6,'',0,0,'C');
                $pdf->Cell(90,6,'',0,1, 'C');
                $pdf->Output();
    }
}
