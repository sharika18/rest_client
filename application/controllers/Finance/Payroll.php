<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Payroll extends CI_Controller{

  public $success = "Data Berhasil";
  public $error = "Data Gagal";
  public function __construct()
  {
    include dirname(__DIR__)."../construct.php";
  }
  
  public function getFinancePeriode()
  {
    $getFinancePeriode_get = json_decode($this -> curl -> simple_get ($this->API.'/Finance/getFinancePeriode/', array('AR-KEY'=>$this->key)),true);
    $data['periode'] = null;
    if($getFinancePeriode_get)
    {
      $data['periode'] = $getFinancePeriode_get['data'];
    }
    return $data['periode'];
  }

  public function getAllFinanceByPeriode($periode = '')
  {
    $getAllFinanceByPeriode_get = json_decode($this -> curl -> simple_get ($this->API.'/Finance/getAllFinanceByPeriode/', array('AR-KEY'=>$this->key, 'periode'=>$periode) ),true);
    $data['financeDataByPeriode'] = null;
    if($getAllFinanceByPeriode_get)
    {
      $data['financeDataByPeriode'] = $getAllFinanceByPeriode_get['data'];
    }
    return $data['financeDataByPeriode'];
  }

  public function GetBiaya()
  {
    $get_apiManageBiaya = json_decode($this -> curl -> simple_get ($this->API.'/biaya/', array('AR-KEY'=>$this->key)),true);
    $data['biaya'] = null;
    if($get_apiManageBiaya)
    {
      $data['biaya'] = $get_apiManageBiaya['data'];
    }
    return $data['biaya'];
  }

  public function GetBiayaById($Biaya_ID = '')
  {/
    $get_apiManageBiaya = json_decode($this -> curl -> simple_get ($this->API.'/biaya/', array('AR-KEY'=>$this->key, 'id'=>$Biaya_ID) ),true);
    $data['biayaById'] = null;
    if($get_apiManageBiaya)
    {
      $data['biayaById'] = $get_apiManageBiaya['data'];
    }
    return $data['biayaById'];
  }

  function GetBiayaDetail()
  {
    $get_apiManageBiayaDetail = json_decode($this -> curl -> simple_get ($this->API.'/vwbiayadetail/', array('AR-KEY'=>$this->key)),true);
    $data['biayaDetail'] = null;
    if($get_apiManageBiayaDetail)
    {
      $data['biayaDetail'] = $get_apiManageBiayaDetail['data'];
    }
    return $data['biayaDetail'];
  }

  function index()
  {
    $data['biaya'] = $this->GetBiaya();
    $data['biayaDetail'] = $this->GetBiayaDetail();
    $data['periode'] = $this->getFinancePeriode();
    //print_r($data);
    $this->load->view('media', $data);
  }
  
  function GetID($id = '')
  {
    $get_apiEditBiaya = json_decode($this -> curl -> simple_get ($this->API.'/biaya/', array('AR-KEY'=>$this->key, 'id'=>$id) ),true);
    $data['editBiaya'] = $get_apiEditBiaya['data'];
    // print_r($data);
    $data['biaya'] = $this->GetBiaya();
    $data['biayaDetail'] = $this->GetBiayaDetail();
    $this->load->view('media', $data);
  }
  
  function TambahBiaya()
  { 
    $now = date('Y-m-d H:i:s');
    $data = [
        'Deskripsi'     => $this->input-> post ('txtDeskripsi'),
        'CreatedBy'     => "DEPRA", //$this->input-> post ('CreatedBy'),
        'CreatedDate'   => $now,
        'ModifiedBy'    => $this->input-> post ('ModifiedBy'), //belum diset
        'ModifiedDate'  => $now,
        'AR-KEY'        => $this->key,
    ];
    $insert = $this->curl->simple_post($this->API.'/biaya/', $data, array(CURLOPT_BUFFERSIZE => 10)); 
    if($insert)
    {
        $this->session->set_flashdata('success',$this->successPost);
    }else
    {
        $this->session->set_flashdata('error',$this->errorPost);
    }
    redirect('biaya?modul=masterBiaya&act=Tambah');
  }

  function EditBiaya()
  {
    $now = date('Y-m-d H:i:s');
    $data = array(
        'AR-KEY'        => $this->key,
        'id'            => $this->input-> post ('txtID'),
        'Deskripsi'     => $this->input-> post ('txtDeskripsi'),
        'CreatedBy'     => $this->input-> post ('CreatedBy'),
        'CreatedDate'   => $this->input-> post ('CreatedDate'),
        'ModifiedBy'    => "DEPRA",
        'ModifiedDate'  => $now
    );
    $update = $this->curl->simple_put($this->API.'/biaya/', $data, array(CURLOPT_BUFFERSIZE => 10)); 
    if($update)
    {
        $this->session->set_flashdata('success',$this->successPut);
    }else
    {
        $this->session->set_flashdata('error',$this->errorPut);
    }
    redirect('biaya?modul=masterBiaya&act=Tambah');
  }

  function HapusBiaya($Biaya_ID)
  {
      $alertMessage = "Data tidak terhapus";
      $delete =  $this->curl->simple_delete       
                  ($this->API.'/biaya/', array('AR-KEY'=>$this->key, 'id'=>$Biaya_ID));
        
      if($delete)
      {
          $this->session->set_flashdata('success',$this->successDelete);
      }else
      {
          $this->session->set_flashdata('error',$this->errorDelete);
      }
      redirect('biaya?modul=masterBiaya&act=Tambah');
  }
}
