<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once (dirname(__FILE__) . "/Biaya.php");

class Register extends Biaya {
	public function index()
	{
		$data['biayaDetail'] = $this->GetBiayaDetail();
		//print_r($data);
		$this->load->view('register', $data);
	}
}
