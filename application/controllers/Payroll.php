<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once (dirname(__FILE__) . "/PayrollSlip.php");
class Payroll extends PayrollSlip{

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
  
  public function getFinancePeriode()
  {
    $getFinancePeriode_get = json_decode($this -> curl -> simple_get ($this->API.'/Payroll/getFinancePeriode/', array('AR-KEY'=>$this->key)),true);
    $data['periode'] = null;
    if($getFinancePeriode_get)
    {
      $data['periode'] = $getFinancePeriode_get['data'];
    }
    return $data['periode'];
  }

  public function getAllPayroll()
  {
    $getAllPayroll_get = json_decode($this -> curl -> simple_get ($this->API.'/Payroll/getAllPayroll/', array('AR-KEY'=>$this->key)),true);
    $data['payroll'] = null;
    if($getAllPayroll_get)
    {
      $data['payroll'] = $getAllPayroll_get['data'];
    }
    return $data['payroll'];
  }
  
  public function getData()
  {
    $data['payroll'] = $this->getAllPayroll();
    $data['periode'] = $this->getFinancePeriode();
    return $data;
  }

  public function importExcel()
  {
    $newFilename = $this->input-> post ('txtFileName');
    $this->import($newFilename);
    redirect('Payroll?modul=financePayroll&act=Tambah');
  }

  public function previewExcel()
  {
    $data = $this->getData();
    $dateNow = date('YmdHis'); 
    $newFilename = 'payment' . $dateNow . '.xlsx';

    $data['fileName']     = $newFilename;
    $data['preview']      = $this->extractExcel($newFilename);
   
    //$data['periode']      = $this->getFinancePeriode();
    //print_r($data);
    //$this->load->view('media', $data);
  }

  function deletePayrollByPeriode($periode)
  {
      $delete =  $this->curl->simple_delete       
                  ($this->API.'/Payroll/deletePayrollByPeriode/', array('AR-KEY'=>$this->key, 'periode'=>$periode));
        
      if($delete)
      {
          $this->session->set_flashdata('success',$this->successDelete);
      }else
      {
          $this->session->set_flashdata('error',$this->errorDelete);
      }
      redirect('Payroll?modul=financePayroll&act=Tambah');
  }

  function index()
  {
    $data = $this->getData();
    //print_r($data);
    $this->load->view('media', $data);
  }
}
