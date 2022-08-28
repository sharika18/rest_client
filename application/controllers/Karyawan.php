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

  public function getAllPendidikan($type = '')
  {
    $getAllPendidikan_get = json_decode($this -> curl -> simple_get ($this->API.'/Pendidikan/getAllPendidikan/', array('AR-KEY'=>$this->key)),true);
    $data['pendidikan'] = null;
    if($getAllPendidikan_get)
    {
      $data['pendidikan'] = $getAllPendidikan_get['data'];

      if($type == 'dataOption')
      { 
        echo json_encode($getAllPendidikan_get['data']);
      }else
      { 
        echo json_encode($getAllPendidikan_get);
      }
    }
    return $data['pendidikan'];
  }

  public function getAllJabatanTugas($type = '')
  {
    $getAllJabatanTugas_get = json_decode($this -> curl -> simple_get ($this->API.'/JabatanTugas/getAllJabatanTugas/', array('AR-KEY'=>$this->key)),true);
    $data['jabatanTugas'] = null;
    if($getAllJabatanTugas_get)
    {
      $data['jabatanTugas'] = $getAllJabatanTugas_get['data'];
      if($type == 'dataOption')
      { 
        echo json_encode($getAllJabatanTugas_get['data']);
      }else
      { echo json_encode($getAllJabatanTugas_get);}
    }
    //echo($data);
    return $data['jabatanTugas'];
  }

  public function getAllUnit($type = '')
  {
    $getAllUnit_get = json_decode($this -> curl -> simple_get ($this->API.'/Unit/getAllUnit/', array('AR-KEY'=>$this->key)),true);
    $data['unit'] = null;
    if($getAllUnit_get)
    {
      $data['unit'] = $getAllUnit_get['data'];
      if($type == 'dataOption')
      { 
        echo json_encode($getAllUnit_get['data']);
      }else
      { echo json_encode($getAllUnit_get);}
    }
    return $data['unit'];
  }

  public function getAllStatusKaryawan($type = '')
  {
    $getAllStatusKaryawan_get = json_decode($this -> curl -> simple_get ($this->API.'/StatusKaryawan/getAllStatusKaryawan/', array('AR-KEY'=>$this->key)),true);
    $data['statusKaryawan'] = null;
    if($getAllStatusKaryawan_get)
    {
      $data['statusKaryawan'] = $getAllStatusKaryawan_get['data'];

      if($type == 'dataOption')
      { 
        echo json_encode($getAllStatusKaryawan_get['data']);
      }else
      { echo json_encode($getAllStatusKaryawan_get);}
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
        'NIP'               => $this->input-> post ('inputNIP'),
        'TanggalMulaiTugas' => $this->input-> post ('dateTMT'),
        'NamaLengkap'       => $this->input-> post ('inputNamaLengkap'),
        'Email'             => $this->input-> post ('emailEmail'),
        'JenisKelamin'      => $this->input-> post ('radioJenisKelaminKaryawan'),
        'TempatLahir'       => $this->input-> post ('inputTempatLahirKaryawan'),
        'TanggaLahir'       => $this->input-> post ('dateTanggalLahirKaryawan'),
        'StatusMukim'       => $this->input-> post ('selectStatusMukim'),
        'statusID'          => $this->input-> post ('selectStatus'),
        'pendidikanID'      => $this->input-> post ('selectPendidikan'),
        'jabatanTugasID_1'  => $this->input-> post ('selectJabatanTugas'),
        'unitID_1'          => $this->input-> post ('selectUnit'),
        'jabatanTugasID_2'  => $this->input-> post ('selectJabatanTugas2'),
        'unitID_2'          => $this->input-> post ('selectUnit2'),
        'CreatedBy'         => $this->session->userdata('loggedIn')['userName'], //$this->input-> post ('CreatedBy'),
        'CreatedDate'       => $now,
        'AR-KEY'            => $this->key,
    ];
    $CRUD = $this->curl->simple_post($this->API.'/Karyawan/uspInsertKaryawan/', $data, array(CURLOPT_BUFFERSIZE => 10)); 

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

    $data = [
      'KaryawanID'          => $this->input-> post ('inputID'),
      'KaryawanJabatanID_1' => $this->input-> post ('inputKaryawanJabatan'),
      'KaryawanJabatanID_2' => $this->input-> post ('inputKaryawanJabatan2'),
      'NIP'                 => $this->input-> post ('inputNIP'),
      'TanggalMulaiTugas'   => $this->input-> post ('dateTMT'),
      'NamaLengkap'         => $this->input-> post ('inputNamaLengkap'),
      'Email'               => $this->input-> post ('emailEmail'),
      'JenisKelamin'        => $this->input-> post ('radioJenisKelaminKaryawan'),
      'TempatLahir'         => $this->input-> post ('inputTempatLahirKaryawan'),
      'TanggaLahir'         => $this->input-> post ('dateTanggalLahirKaryawan'),
      'StatusMukim'         => $this->input-> post ('selectStatusMukim'),
      'statusID'            => $this->input-> post ('selectStatus'),
      'pendidikanID'        => $this->input-> post ('selectPendidikan'),
      'jabatanTugasID_1'    => $this->input-> post ('selectJabatanTugas'),
      'unitID_1'            => $this->input-> post ('selectUnit'),
      'jabatanTugasID_2'    => $this->input-> post ('selectJabatanTugas2'),
      'unitID_2'            => $this->input-> post ('selectUnit2'),
      'ModifiedBy'          => $this->session->userdata('loggedIn')['userName'], //$this->input-> post ('CreatedBy'),
      'ModifiedDate'        => $now,
      'AR-KEY'              => $this->key,
    ];
  
    // $data = array(
    //     'AR-KEY'          => $this->key,
    //     'id'              => $this->input-> post ('inputID'),
    //     'NIP'             => $this->input-> post ('inputNIP'),
    //     'NamaLengkap'     => $this->input-> post ('inputNamaLengkap'),
    //     'Email'           => $this->input-> post ('emailEmail'),
    //     'pendidikanID'    => $this->input-> post ('selectPendidikan'),
    //     'jabatanTugasID'  => $this->input-> post ('selectJabatanTugas'),
    //     'unitID'          => $this->input-> post ('selectUnit'),
    //     'statusID'        => $this->input-> post ('selectStatus'),
    //     'ModifiedBy'      => "DEPRA",
    //     'ModifiedDate'    => $now
    // );
    
    $CRUD = $this->curl->simple_post($this->API.'/Karyawan/uspUpadateKaryawan/', $data, array(CURLOPT_BUFFERSIZE => 10)); 
    
    if($CRUD)
    {
      $status = 'sukses';
    }
    echo($status);
  }

  function HapusKaryawan($NIP)
  {
      $status = 'gagal';
      
      $CRUD =  $this->curl->simple_delete       
                  ($this->API.'/Karyawan/uspDeleteKaryawan/', array('AR-KEY'=>$this->key, 'id'=>$NIP));
      
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

  function TambahJabatanTugas()
  {
    $now = date('Y-m-d H:i:s');
    $status = 'gagal';

    $data = [
        'jabatanTugas'      => $this->input-> post ('inputJabatan'),
        'CreatedBy'         => $this->session->userdata('loggedIn')['userName'],
        'CreatedDate'       => $now,
        'AR-KEY'            => $this->key,
    ];
    $CRUD = $this->curl->simple_post($this->API.'/JabatanTugas/createJabatanTugas/', $data, array(CURLOPT_BUFFERSIZE => 10)); 

    if($CRUD)
    {
      $status = 'sukses';
    }
    echo($status);
  }

  function HapusJabatanTugas($ID)
  {
    $now = date('Y-m-d H:i:s');
    $status = 'gagal';

    $data = [
        'jabatanTugasID'    => $ID,
        'AR-KEY'            => $this->key,
    ];
    $CRUD = $this->curl->simple_delete($this->API.'/JabatanTugas/deleteJabatanTugas/', $data, array(CURLOPT_BUFFERSIZE => 10)); 

    if($CRUD)
    {
      $status = 'sukses';
    }
    echo($status);
  }

  function HapusUnit($ID)
  {
    $now = date('Y-m-d H:i:s');
    $status = 'gagal';

    $data = [
        'unitID'    => $ID,
        'AR-KEY'    => $this->key,
    ];
    $CRUD = $this->curl->simple_delete($this->API.'/Unit/deleteUnit/', $data, array(CURLOPT_BUFFERSIZE => 10)); 

    if($CRUD)
    {
      $status = 'sukses';
    }
    echo($status);
  }

  function HapusPendidikan($ID)
  {
    $now = date('Y-m-d H:i:s');
    $status = 'gagal';

    $data = [
        'pendidikanID'      => $ID,
        'AR-KEY'            => $this->key,
    ];
    $CRUD = $this->curl->simple_delete($this->API.'/Pendidikan/deletePendidikan/', $data, array(CURLOPT_BUFFERSIZE => 10)); 

    if($CRUD)
    {
      $status = 'sukses';
    }
    echo($status);
  }

  function HapusStatusKaryawan($ID)
  {
    $now = date('Y-m-d H:i:s');
    $status = 'gagal';

    $data = [
        'statusID'    => $ID,
        'AR-KEY'            => $this->key,
    ];
    $CRUD = $this->curl->simple_delete($this->API.'/StatusKaryawan/deleteStatusKaryawan/', $data, array(CURLOPT_BUFFERSIZE => 10)); 

    if($CRUD)
    {
      $status = 'sukses';
    }
    echo($status);
  }
}
