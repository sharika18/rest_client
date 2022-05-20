<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PaymentSlips extends CI_Controller {
    function __construct(){
        parent::__construct();
        include dirname(__DIR__)."../construct.php";
        $this->load->library('Pdf'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI
    }

	function index()
	{
        error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
        $pdf = new FPDF('L', 'mm','Letter');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,7,'DAFTAR PEGAWAI AYONGODING.COM',0,1,'C');
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(90,6,'Nama Pegawai',1,0,'C');
        $pdf->Cell(120,6,'Alamat',1,0,'C');
        $pdf->Cell(40,6,'Telp',1,1,'C');
        $pdf->SetFont('Arial','',10);
        /*$pegawai = $this->db->get('pegawai')->result();
        $no=0;
        foreach ($pegawai as $data){
            $no++;
            $pdf->Cell(10,6,$no,1,0, 'C');
            $pdf->Cell(90,6,$data->nama,1,0);
            $pdf->Cell(120,6,$data->alamat,1,0);
            $pdf->Cell(40,6,$data->telp,1,1);
        }*/
        $filename = "TestPDF.pdf";
        $dir ="./assets/PaymentSlips/".$filename;
        $pdf->Output($dir, 'F');
	}
}