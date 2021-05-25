<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {
	
	//public $fileBuktiPembayaran = '';
	public function __construct()
	{
		include "construct.php";
	}
	
	public function UploadBiayaPendaftaran()
    {
        $this->load->view('Pages/Registrasi/CobaUpload', array('error' => ' ' ));
    }

	public function Upload($filePath='') 
    {
        $config['upload_path'] = $this->uploadPath.$filePath;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
		$new_name = time()."TEST RENAME";
		$config['file_name'] = $new_name;
 
        $this->load->library('upload', $config);
 
        if (!$this->upload->do_upload('cobaUpload')) 
        {
            $this->session->set_flashdata('error',$this->upload->display_errors());
        } 
        else 
        {
            $this->session->set_flashdata('success','File Berhasil DiUpload');
        }
		redirect('Registrasi/UploadBiayaPendaftaran');
    }

	function FormulirRegistrasi($jenjang='', $status='')
	{
		$status = '1';
		$Api_GetBiayaDetailByJenjang = json_decode($this -> curl -> simple_get ($this->API.'/vw_biaya_detail/', array('AR-KEY'=>$this->key, 'jenjang'=>$jenjang, 'status'=>$status) ),true);
		$data['biayaDetail'] = null;
		if($Api_GetBiayaDetailByJenjang)
		{
			$data['biayaDetail'] = $Api_GetBiayaDetailByJenjang['data'];
			//print_r($data);
		}
		$this->load->view('Pages/Registrasi/Registrasi', $data);
	}

	function TambahRegistrasi($fileFolder='')
	{ 
		$fileBuktiPembayaran = $_FILES['fileBuktiPembayaran'];
		$namaLengkap = $this->input-> post('inputNamaLengkapSantri');
		$config['upload_path'] = $this->uploadPath.$fileFolder;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
		$new_name = time()."Pendaftaran".$namaLengkap;
		$config['file_name'] = $new_name;
 
        $this->load->library('upload', $config);
 
        if (!$this->upload->do_upload('fileBuktiPembayaran')) 
        {
            //$this->session->set_flashdata('error',$this->upload->display_errors());
			$fileBuktiPembayaran ='Gagal Upload';
        } 
        else 
        {
            //$this->session->set_flashdata('success','File Berhasil DiUpload');
			$fileBuktiPembayaran = $this->upload->data('file_name');
        }

		$data = [
			'Biaya_Detail_ID' 	=> $this->input-> post('Biaya_Detail_ID'),
			'DeskripsiBiaya' 	=> $this->input-> post('DeskripsiBiaya'),
			'Jenjang' 			=> $this->input-> post('Jenjang'),
			'NamaLengkap' 		=> $this->input-> post('inputNamaLengkapSantri'),
			'NamaPanggilan' 	=> $this->input-> post('inputNamaPanggilan'),
			'TempatLahir' 		=> $this->input-> post('inputTempatLahirSantri'),
			'TanggalLahir' 		=> $this->input-> post('dateTanggalLahirSantri'),
			'NIK' 				=> $this->input-> post('inputNIKSantri'),
			'JenisKelamin' 		=> $this->input-> post('radioJenisKelaminSantri'),
	       	'AnakKe' 			=> $this->input-> post('inputAnakKe'),
			'DariBerapaSaudara' => $this->input-> post('inputDariBerapaSaudara'),
			'TinggiBadan' 		=> $this->input-> post('inputTinggiBadan'),
			'BeratBadan' 		=> $this->input-> post('inputBeratBadan'),
			'AlamatSantri' 		=> $this->input-> post('inputAlamatSantri'),
			'AsalSekolah' 		=> $this->input-> post('inputAsalSekolah'),
			'UkuranBaju' 		=> $this->input-> post('selectUkuranBaju'),
			'UkuranCelana' 		=> $this->input-> post('selectUkuranCelana'),
			'UkuranJilbab' 		=> $this->input-> post('selectUkuranJilbab'),
			'AyahNama' 			=> $this->input-> post('inputNamaLengkapAyah'),
			'AyahNIK' 			=> $this->input-> post('inputNIKAyah'),
			'AyahTempatLahir' 	=> $this->input-> post('inputTempatLahirAyah'),
			'AyahTanggalLahir' 	=> $this->input-> post('dateTanggalLahirAyah'),
			'AyahPendidikan' 	=> $this->input-> post('selectPendidikanAyah'),
			'AyahPekerjaan' 	=> $this->input-> post('selectPekerjaanAyah'),
			'AyahPenghasilan' 	=> $this->input-> post('selectPenghasilanAyah'),
			'AyahHP' 			=> $this->input-> post('inputNomorHPAyah'),
			'IbuNama' 			=> $this->input-> post('inputNamaLengkapIbu'),
			'IbuNIK' 			=> $this->input-> post('inputNIKIbu'),
			'IbuTempatLahir' 	=> $this->input-> post('inputTempatLahirIbu'),
			'IbuTanggalLahir' 	=> $this->input-> post('dateTanggalLahirIbu'),
			'IbuPendidikan' 	=> $this->input-> post('selectPendidikanIbu'),
			'IbuPekerjaan' 		=> $this->input-> post('selectPekerjaanIbu'),
			'IbuPenghasilan' 	=> $this->input-> post('selectPenghasilanIbu'),
			'IbuHP' 			=> $this->input-> post('inputNomorHPIbu'),
			'WaliNama' 			=> $this->input-> post('inputNamaLengkapWali'),
			'WaliNIK' 			=> $this->input-> post('inputNIKWali'),
			'WaliTempatLahir' 	=> $this->input-> post('inputTempatLahirWali'),
			'WaliTanggalLahir' 	=> $this->input-> post('dateTanggalLahirWali'),
			'WaliPendidikan' 	=> $this->input-> post('selectPendidikanWali'),
			'WaliPekerjaan' 	=> $this->input-> post('selectPekerjaanWali'),
			'WaliPenghasilan' 	=> $this->input-> post('selectPenghasilanWali'),
			'WaliHP' 			=> $this->input-> post('inputNomorHPWali'),
			'WaliAlamat' 		=> $this->input-> post('inputAlamatWali'),
			'Status' 			=> "",
			'Bukti_Pembayaran'	=> $fileBuktiPembayaran,
			'AR-KEY'        	=> $this->key,
		];
		$insert = $this->curl->simple_post($this->API.'/registrasi/', $data, array(CURLOPT_BUFFERSIZE => 10)); 
		if($insert)
		{
			$this->session->set_flashdata('success',$this->success.' Disimpan');
		}else
		{
			$this->session->set_flashdata('error',$this->error.' Disimpan');
		}
		//redirect('Pages/Registrasi/UploadSuccess');
		$this->load->view('Pages/Registrasi/UploadSuccess', $data);
	}

	function EditRegistrasi()
	{
		$now = date('Y-m-d H:i:s');
		$data = array(
			'id'            	=> $this->input-> post ('txtID'),
			'Biaya_Detail_ID' 	=> $this->input-> post('Biaya_Detail_ID'),
			'DeskripsiBiaya' 	=> $this->input-> post('DeskripsiBiaya'),
			'Jenjang' 			=> $this->input-> post('Jenjang'),
			'NamaLengkap' 		=> $this->input-> post('inputNamaLengkapSantri'),
			'NamaPanggilan' 	=> $this->input-> post('inputNamaPanggilan'),
			'TempatLahir' 		=> $this->input-> post('inputTempatLahirSantri'),
			'TanggalLahir' 		=> $this->input-> post('dateTanggalLahirSantri'),
			'NIK' 				=> $this->input-> post('inputNIKSantri'),
			//'JenisKelamin' 		=> $this->input-> post('JenisKelamin'),
	       	'AnakKe' 			=> $this->input-> post('inputAnakKe'),
			'DariBerapaSaudara' => $this->input-> post('inputDariBerapaSaudara'),
			'TinggiBadan' 		=> $this->input-> post('inputTinggiBadan'),
			'BeratBadan' 		=> $this->input-> post('inputBeratBadan'),
			'AlamatSantri' 		=> $this->input-> post('inputAlamatSantri'),
			'AsalSekolah' 		=> $this->input-> post('inputAsalSekolah'),
			'UkuranBaju' 		=> $this->input-> post('selectUkuranBaju'),
			'UkuranCelana' 		=> $this->input-> post('selectUkuranCelana'),
			'UkuranJilbab' 		=> $this->input-> post('selectUkuranJilbab'),
			'AyahNama' 			=> $this->input-> post('inputNamaLengkapAyah'),
			'AyahNIK' 			=> $this->input-> post('inputNIKAyah'),
			'AyahTempatLahir' 	=> $this->input-> post('inputTempatLahirAyah'),
			// 'AyahTanggalLahir' 	=> $this->input-> post('AyahTanggalLahir'),
			'AyahPendidikan' 	=> $this->input-> post('selectPendidikanAyah'),
			'AyahPekerjaan' 	=> $this->input-> post('selectPekerjaanAyah'),
			'AyahPenghasilan' 	=> $this->input-> post('selectPenghasilanAyah'),
			'AyahHP' 			=> $this->input-> post('inputNomorHPAyah'),
			'IbuNama' 			=> $this->input-> post('inputNamaLengkapIbu'),
			'IbuNIK' 			=> $this->input-> post('inputNIKIbu'),
			'IbuTempatLahir' 	=> $this->input-> post('inputTempatLahirIbu'),
			// 'IbuTanggalLahir' 	=> $this->input-> post('IbuTanggalLahir'),
			'IbuPendidikan' 	=> $this->input-> post('selectPendidikanIbu'),
			'IbuPekerjaan' 		=> $this->input-> post('selectPekerjaanIbu'),
			'IbuPenghasilan' 	=> $this->input-> post('selectPenghasilanIbu'),
			'IbuHP' 			=> $this->input-> post('inputNomorHPIbu'),
			'WaliNama' 			=> $this->input-> post('inputNamaLengkapWali'),
			'WaliNIK' 			=> $this->input-> post('inputNIKWali'),
			'WaliTempatLahir' 	=> $this->input-> post('inputTempatLahirWali'),
			// 'WaliTanggalLahir' 	=> $this->input-> post('WaliTanggalLahir'),
			'WaliPendidikan' 	=> $this->input-> post('selectPendidikanWali'),
			'WaliPekerjaan' 	=> $this->input-> post('selectPekerjaanWali'),
			'WaliPenghasilan' 	=> $this->input-> post('selectPenghasilanWali'),
			'WaliHP' 			=> $this->input-> post('inputNomorHPWali'),
			'WaliAlamat' 		=> $this->input-> post('inputAlamatWali'),
			'Status' 			=> "",
			'AR-KEY'        	=> $this->key,
		);
		$update = $this->curl->simple_put($this->API.'/registrasi/', $data, array(CURLOPT_BUFFERSIZE => 10)); 
		if($update)
		{
			$this->session->set_flashdata('success',$this->success.' Diubah');
		}else
		{
			$this->session->set_flashdata('error',$this->error.' Diubah');
		}
		redirect('#');
	}


	public function index()
	{
		// $data['biayaDetail'] = $this->GetBiayaDetail();
		// print_r($data);
		// $this->load->view('register', $data);
	}
}
