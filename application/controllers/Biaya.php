<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Biaya extends CI_Controller{

  public $success = "Data Berhasil";
  public $error = "Data Gagal";
  public function __construct()
  {
    include "construct.php";
  }
  
  public function GetBiaya()
  {
    $get_apiManageBiaya = json_decode($this -> curl -> simple_get ($this->API.'/biaya/', array('AR-KEY'=>$this->key)),true);
    $data['biaya'] = $get_apiManageBiaya['data'];
    return $data['biaya'];
  }

  public function GetBiayaById($Biaya_ID = '')
  {
    $get_apiManageBiaya = json_decode($this -> curl -> simple_get ($this->API.'/biaya/', array('AR-KEY'=>$this->key, 'id'=>$Biaya_ID) ),true);
    $data['biayaById'] = $get_apiManageBiaya['data'];
    return $data['biayaById'];
  }

  function GetBiayaDetail()
  {
    $get_apiManageBiayaDetail = json_decode($this -> curl -> simple_get ($this->API.'/vw_biaya_detail/', array('AR-KEY'=>$this->key)),true);
    $data['biayaDetail'] = $get_apiManageBiayaDetail['data'];
    return $data['biayaDetail'];
  }

  function index()
  {
    $data['biaya'] = $this->GetBiaya();
    $data['biayaDetail'] = $this->GetBiayaDetail();
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
        $this->session->set_flashdata('success',$this->success.' Disimpan');
    }else
    {
        $this->session->set_flashdata('error',$this->error.' Disimpan');
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
        $this->session->set_flashdata('success',$this->success.' Diubah');
    }else
    {
        $this->session->set_flashdata('error',$this->error.' Diubah');
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
          $this->session->set_flashdata('success',$this->success.' Dihapus');
      }else
      {
          $this->session->set_flashdata('error',$this->error.' Dihapus');
      }
      redirect('biaya?modul=masterBiaya&act=Tambah');
  }
}