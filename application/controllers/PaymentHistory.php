<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once (dirname(__FILE__) . "/PayrollSlip.php");
class PaymentHistory extends PayrollSlip{

  public $success = "Data Berhasil";
  public $error = "Data Gagal";
  public function __construct()
  {
    include "construct.php";
    if(!$this->session->userdata('loggedIn'))
    {
      redirect('Welcome'); 
    }
  }
  
  function getVwKaryawanDetailByNIP($NIP = '')
  {
    $data = array(
      'AR-KEY'  => $this->key,
      'NIP'   => $NIP
    );

    $data['karyawanDetail'] = null;
    $getVwKaryawanDetailByNIP_get = json_decode(
      $this -> curl -> simple_get 
      (
        $this->API.'/Karyawan/getVwKaryawanDetailByNIP/', 
        $data, 
        array(CURLOPT_BUFFERSIZE => 10)
      ),true
    ); 
   
    if($getVwKaryawanDetailByNIP_get)
    {
      $data['karyawanDetail'] = $getVwKaryawanDetailByNIP_get['data'];
    }

    return $data['karyawanDetail'];
  }

  public function getAllFinanceByNIP($NIP = '')
  {
      $data = array(
        'AR-KEY'  => $this->key,
        'NIP'   => $NIP
      );
      $getAllFinanceByNIP_get = json_decode(
        $this -> curl -> simple_get 
        (
          $this->API.'/Payroll/getAllFinanceByNIP/', 
          $data, 
          array(CURLOPT_BUFFERSIZE => 10) 
        ),true
      );
      $data['payroll'] = null;
      if($getAllFinanceByNIP_get)
      {
      $data['payroll'] = $getAllFinanceByNIP_get['data'];
      }
      return $data['payroll'];
  }

  function getPaymentDetail($NIP = '')
  {
    $data['karyawanDetail']   = $this->getVwKaryawanDetailByNIP($NIP);
    $data['payroll'] = $this->getAllFinanceByNIP($NIP);;
    $this->load->view('media', $data);
  }

  function getData()
  {
    $data['karyawanDetail'] = $this->getPaymentDetail('');

    return $data;
  }

  function index()
  {
    //$data = $this->getData();
    //print_r($data);
    $this->load->view('media', $data);
  }
}
