<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Media extends CI_Controller{
 
  public function __construct()
  {
    include "construct.php"; 
  }
 
  function index()
  {
    // $get_apiManageBiaya = json_decode($this -> curl -> simple_get ($this->API.'/biaya/', array('AR-KEY'=>$this->key)),true);
    // $data['biaya'] = $get_apiManageBiaya['data'];
    
    // print_r($data);

    $get_apiManageBiaya = json_decode($this -> curl -> simple_get ($this->API.'/biaya/', array('AR-KEY'=>$this->key)),true);
    $get_apiManageBiayaDetail = json_decode($this -> curl -> simple_get ($this->API.'/vw_biaya_detail/', array('AR-KEY'=>$this->key)),true);
    $data['biaya'] = $get_apiManageBiaya['data'];
    $data['biayaDetail'] = $get_apiManageBiayaDetail['data'];

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