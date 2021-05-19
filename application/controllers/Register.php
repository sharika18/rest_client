<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once (dirname(__FILE__) . "/Biaya.php");

class Register extends Biaya {
	function RegistrasiGetBiayaDetail($jenjang='', $status='')
	{
		$status = '1';
		$Api_GetBiayaDetailByJenjang = json_decode($this -> curl -> simple_get ($this->API.'/vw_biaya_detail/', array('AR-KEY'=>$this->key, 'jenjang'=>$jenjang, 'status'=>$status) ),true);
		$data['biayaDetail'] = null;
		if($Api_GetBiayaDetailByJenjang)
		{
			$data['biayaDetail'] = $Api_GetBiayaDetailByJenjang['data'];
			//print_r($data);
		}
		$this->load->view('register', $data);
	}

	public function index()
	{
		// $data['biayaDetail'] = $this->GetBiayaDetail();
		// print_r($data);
		// $this->load->view('register', $data);
	}
}
