<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Media extends CI_Controller{
 
  public function __construct()
  {
    include "construct.php"; 
    if(!$this->session->userdata('loggedIn'))
    {
      redirect('Welcome'); 
    }
  }
 
  public function getCountKaryawanByStatus()
  {
    $getCountKaryawanByStatus_get = json_decode(
      $this -> curl -> simple_get 
      (
        $this->API.'/Karyawan/getCountKaryawanByStatus/', 
        array('AR-KEY'=>$this->key)
      ),
      true);
    $data['jumlahKaryawan'] = null;
    if($getCountKaryawanByStatus_get)
    {
      $data['jumlahKaryawan'] = $getCountKaryawanByStatus_get['data'];
    }
    return $data['jumlahKaryawan'];
  }

  public function getVwKaryawanDetail()
  {
    $getVwKaryawanDetail_get = json_decode($this -> curl -> simple_get ($this->API.'/Karyawan/getVwKaryawanDetail/', array('AR-KEY'=>$this->key)),true);
    $data['vwKaryawanDetail'] = null;
    if($getVwKaryawanDetail_get)
    {
      $data['vwKaryawanDetail'] = $getVwKaryawanDetail_get['data'];
    }
    return $data['vwKaryawanDetail'];
  }

  public function getVwSumPerPeriode()
  {
    $getVwSumPerPeriode_get = json_decode(
    $this -> curl -> simple_get 
    (
    $this->API.'/Payroll/getVwSumPerPeriode/', 
    array('AR-KEY'=>$this->key)
    ),
    true);
    $data['sumPeriode'] = null;
    if($getVwSumPerPeriode_get)
    {
      $data['sumPeriode'] = $getVwSumPerPeriode_get['data'];
    }
    return $data['sumPeriode'];
  }

  function getData()
  {
    $data['vwKaryawanDetail'] = $this->getVwKaryawanDetail();
    $data['jumlahKaryawan']   = $this->getCountKaryawanByStatus();
    $data['sumPeriode']       = $this->getVwSumPerPeriode();

    return $data;
  }

  function index()
  {
    $data = $this->getData();
    //        print_r($data);
    $this->load->view('media', $data);
  }

  function create(){
    if(isset($_POST['submit'])){
        
        $data = 
              [
                  # alt + Shift + bawah > untuk copy data ke baris bawah
                  # alt + bawah/atas > untuk memindahkan data baris atas ke bawah
                  'AR-KEY'        => $this->key,
                  'Deskripsi'     => $this->input-> post ('Deskripsi'),
                  'Jenjang'       => $this->input-> post ('Jenjang'),
                  'CreatedBy'     => $this->input-> post ('CreatedBy'),
                  'CreatedDate'   => $this->input-> post ('CreatedDate'),
                  'ModifiedBy'    => $this->input-> post ('ModifiedBy'),
                  'ModifiedDate'  => $this->input-> post ('ModifiedDate')
                  
              ];
        $insert = $this->curl->simple_post($this->API.'/biaya/', $data, array(CURLOPT_BUFFERSIZE => 10)); 
        print_r($data);
        if($insert)
          {
              $this->session->set_flashdata('hasil','Insert Data Berhasil');
          }else
          {
             $this->session->set_flashdata('hasil','Insert Data Gagal');
          }
          redirect('media?modul=masterBiaya');
    }else{
        $this->load->view('media?modul=masterBiaya');
    }
}

}
