<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Karyawan extends CI_Controller{

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
  
  public function getVwKaryawanDetail()
  {
    $getVwKaryawanDetail_get = json_decode($this -> curl -> simple_get ($this->API.'/Karyawan/getVwKaryawanDetail/', array('AR-KEY'=>$this->key)),true);
    $data['VwKaryawanDetail'] = null;
    if($getVwKaryawanDetail_get)
    {
      $data['VwKaryawanDetail'] = $getVwKaryawanDetail_get['data'];
      echo json_encode($getVwKaryawanDetail_get);
    }else{
      echo json_encode($this->emptyData);
    }
    return $data['VwKaryawanDetail'];
  }

  public function getAllPendidikan()
  {
    $getAllPendidikan_get = json_decode($this -> curl -> simple_get ($this->API.'/Pendidikan/getAllPendidikan/', array('AR-KEY'=>$this->key)),true);
    $data['pendidikan'] = null;
    if($getAllPendidikan_get)
    {
      $data['pendidikan'] = $getAllPendidikan_get['data'];
      echo json_encode($getAllPendidikan_get['data']);
    }
    return $data['pendidikan'];
  }

  public function getAllJabatanTugas()
  {
    $getAllJabatanTugas_get = json_decode($this -> curl -> simple_get ($this->API.'/JabatanTugas/getAllJabatanTugas/', array('AR-KEY'=>$this->key)),true);
    $data['jabatanTugas'] = null;
    if($getAllJabatanTugas_get)
    {
      $data['jabatanTugas'] = $getAllJabatanTugas_get['data'];
      echo json_encode($getAllJabatanTugas_get['data']);
    }
    return $data['jabatanTugas'];
  }

  public function getAllUnit()
  {
    $getAllUnit_get = json_decode($this -> curl -> simple_get ($this->API.'/Unit/getAllUnit/', array('AR-KEY'=>$this->key)),true);
    $data['unit'] = null;
    if($getAllUnit_get)
    {
      $data['unit'] = $getAllUnit_get['data'];
      echo json_encode($getAllUnit_get['data']);
    }
    return $data['unit'];
  }

  public function getAllStatusKaryawan()
  {
    $getAllStatusKaryawan_get = json_decode($this -> curl -> simple_get ($this->API.'/StatusKaryawan/getAllStatusKaryawan/', array('AR-KEY'=>$this->key)),true);
    $data['statusKaryawan'] = null;
    if($getAllStatusKaryawan_get)
    {
      $data['statusKaryawan'] = $getAllStatusKaryawan_get['data'];
      echo json_encode($getAllStatusKaryawan_get['data']);
    }
    return $data['statusKaryawan'];
  }

  function getKaryawanByNIP($NIP = '')
  {
    $data = array(
      'AR-KEY'  => $this->key,
      'NIP'   => $NIP
    );
    $getKaryawanByNIP_get = json_decode($this -> curl -> simple_get ($this->API.'/Karyawan/getKaryawanByNIP/', $data, array(CURLOPT_BUFFERSIZE => 10)),true); 
   
    if($getKaryawanByNIP_get)
    {
      $data['editKaryawan'] = $getKaryawanByNIP_get['data'];

      echo json_encode($getKaryawanByNIP_get['data']);
    }
  }

  function index()
  {
    $this->load->view('media');
  }
  
  function getNoUrutKaryawanByTMT($TMT = '')
  {
    $data = array(
      'AR-KEY'  => $this->key,
      'TMT'   => $TMT
    );
    $getNoUrutKaryawanByTMT_get = json_decode($this -> curl -> simple_get ($this->API.'/Karyawan/getNoUrutKaryawanByTMT/', $data, array(CURLOPT_BUFFERSIZE => 10)),true); 
   
    $data = $this->getData();
    $data['noUrut'] = $getNoUrutKaryawanByTMT_get['data'];
    return $data['noUrut'];
  }

  function TambahKaryawan()
  { 
    // $TMT = $this->input-> post ('dateTMT');
    // $data['noUrut'] = $this->getNoUrutKaryawanByTMT($TMT);
    
    // $dateTMT=date_create($TMT);
    // $TMT = date_format($dateTMT,"Ymd");
    // $NIP = $TMT.$data['noUrut'];
    //print_r($TMT.$data['noUrut']);
    $now = date('Y-m-d H:i:s');
    $status = 'gagal';

    $data = [
        'NIP'               => $this->input-> post ('inputNIP'), //$NIP,
        'TanggalMulaiTugas' => $this->input-> post ('dateTMT'),
        'NamaLengkap'       => $this->input-> post ('inputNamaLengkap'),
        'Email'             => $this->input-> post ('emailEmail'),
        'pendidikanID'      => $this->input-> post ('selectPendidikan'),
        'jabatanTugasID'    => $this->input-> post ('selectJabatanTugas'),
        'unitID'            => $this->input-> post ('selectUnit'),
        'statusID'          => $this->input-> post ('selectStatus'),
        'CreatedBy'         => $this->session->userdata('loggedIn')['userName'], //$this->input-> post ('CreatedBy'),
        'CreatedDate'       => $now,
        'ModifiedBy'        => $this->session->userdata('loggedIn')['userName'], //belum diset
        'ModifiedDate'      => $now,
        'AR-KEY'            => $this->key,
    ];
    $CRUD = $this->curl->simple_post($this->API.'/Karyawan/createKaryawan/', $data, array(CURLOPT_BUFFERSIZE => 10)); 

    if($CRUD)
    {
      $status = 'sukses';
    }
    echo($status);
  }

  function EditKaryawan()
  {
    $now = date('Y-m-d H:i:s');
    $status = 'gagal';

    $data = array(
        'AR-KEY'          => $this->key,
        'id'              => $this->input-> post ('inputID'),
        'NIP'             => $this->input-> post ('inputNIP'),
        'NamaLengkap'     => $this->input-> post ('inputNamaLengkap'),
        'Email'           => $this->input-> post ('emailEmail'),
        'pendidikanID'    => $this->input-> post ('selectPendidikan'),
        'jabatanTugasID'  => $this->input-> post ('selectJabatanTugas'),
        'unitID'          => $this->input-> post ('selectUnit'),
        'statusID'        => $this->input-> post ('selectStatus'),
        'ModifiedBy'      => "DEPRA",
        'ModifiedDate'    => $now
    );
    
    $CRUD = $this->curl->simple_put($this->API.'/Karyawan/updateKaryawan/', $data, array(CURLOPT_BUFFERSIZE => 10)); 
    
    if($CRUD)
    {
      $status = 'sukses';
    }
    echo($status);
  }

  function HapusKaryawan($karyawanID)
  {
      $status = 'gagal';
      
      $CRUD =  $this->curl->simple_delete       
                  ($this->API.'/Karyawan/deleteKaryawan/', array('AR-KEY'=>$this->key, 'id'=>$karyawanID));
      
      if($CRUD)
      {
        $status = 'sukses';
      }
      echo($status);
      // if($delete)
      // {
      //     $this->session->set_flashdata('success',$this->successDelete);
      // }else
      // {
      //     $this->session->set_flashdata('error',$this->errorDelete);
      // }
      // redirect('Karyawan?modul=masterKaryawan&act=Tambah');
  }
}
