<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Biaya extends CI_Controller{
 
  public function __construct()
  {
    include "construct.php";
  }
  
  function function_alert($msg)
    {
        echo "<script type='text/javascript'>alert('$msg', '', function(){
            location.href = 'http://localhost/rest_client/biaya?modul=masterBiaya&act=Tambah';
        });</script>";
    }

  public function GetBiaya()
  {
    $get_apiManageBiaya = json_decode($this -> curl -> simple_get ($this->API.'/biaya/', array('AR-KEY'=>$this->key)),true);
    $data['biaya'] = $get_apiManageBiaya['data'];
    return $data['biaya'];
  }

  function GetBiayaDetail()
  {
    $get_apiManageBiayaDetail = json_decode($this -> curl -> simple_get ($this->API.'/vw_biaya_detail/', array('AR-KEY'=>$this->key)),true);
    $data['biayaDetail'] = $get_apiManageBiayaDetail['data'];
    return $data['biayaDetail'];
  }

  function index()
  {
    // $get_apiManageBiaya = json_decode($this -> curl -> simple_get ($this->API.'/biaya/', array('AR-KEY'=>$this->key)),true);
    // $get_apiManageBiayaDetail = json_decode($this -> curl -> simple_get ($this->API.'/vw_biaya_detail/', array('AR-KEY'=>$this->key)),true);
    // $data['biaya'] = $get_apiManageBiaya['data'];
    // //$data['biaya'] = $get_apiManageBiaya['query'];
    // $data['biayaDetail'] = $get_apiManageBiayaDetail['data'];
    // print_r($data);
    // yang di load view media, lalu parameter modul
    //print_r($data);
    //print_r($this->key);
    $data['biaya'] = $this->GetBiaya();
    $data['biayaDetail'] = $this->GetBiayaDetail();
    $this->load->view('media', $data);
  }
  
  function GetID($Biaya_ID = '')
  {
    $get_apiEditBiaya = json_decode($this -> curl -> simple_get ($this->API.'/biaya/', array('AR-KEY'=>$this->key, 'id'=>$Biaya_ID) ),true);
    $data['editBiaya'] = $get_apiEditBiaya['data'];
    // print_r($data);
    $data['biaya'] = $this->GetBiaya();
    $data['biayaDetail'] = $this->GetBiayaDetail();
    $this->load->view('media', $data);
  }
  
  function Edit()
  {
    $now = date('Y-m-d H:i:s');
    $data = array(
        # alt + Shift + bawah > untuk copy data ke baris bawah
        # alt + bawah/atas > untuk memindahkan data baris atas ke bawah
        # contoh harcode param...
        # 'Deskripsi'     => "contoh harcode param", 
        'AR-KEY'        => $this->key,
        'id'            => $this->input-> post ('txtID'),
        'Deskripsi'     => $this->input-> post ('txtDeskripsi'),
        // 'Jenjang'       => $this->input-> post ('txtJenjang'),
        'CreatedBy'     => $this->input-> post ('CreatedBy'),
        'CreatedDate'   => $this->input-> post ('CreatedDate'),
        'ModifiedBy'    => "DEPRA",
        'ModifiedDate'  => $now
    );
    $update = $this->curl->simple_put($this->API.'/biaya/', $data, array(CURLOPT_BUFFERSIZE => 10)); 
    if($update)
    {
        $this->session->set_flashdata('hasil','Update Data Berhasil');
    }else
    {
       $this->session->set_flashdata('hasil','Update Data Gagal');
    }
    redirect('biaya?modul=masterBiaya&act=Tambah');
  }

  // insert data kontak
  function Tambah()
  {
    $now = date('Y-m-d H:i:s');
    $data = [
        # alt + Shift + bawah > untuk copy data ke baris bawah
        # alt + bawah/atas > untuk memindahkan data baris atas ke bawah
        # contoh harcode param...
        # 'Deskripsi'     => "contoh harcode param", 
        'Deskripsi'     => $this->input-> post ('txtDeskripsi'),
        //'Jenjang'       => $this->input-> post ('txtJenjang'),
        'CreatedBy'     => "DEPRA", //$this->input-> post ('CreatedBy'),
        'CreatedDate'   => $now,
        'ModifiedBy'    => $this->input-> post ('ModifiedBy'), //belum diset
        'ModifiedDate'  => $now,
        'AR-KEY'        => $this->key,
    ];
    # contoh ditulis dengan array...
    // array(
    //     'AR-KEY'        => $this->key,
    //     'Deskripsi'     => $this->input-> post ('txtDeskripsi'),
    //     'Jenjang'       => $this->input-> post ('txtJenjang'),
    //     'CreatedBy'     => $this->input-> post ('CreatedBy'),
    //     'CreatedDate'   => $this->input-> post ('CreatedDate'),
    //     'ModifiedBy'    => $this->input-> post ('ModifiedBy'),
    //     'ModifiedDate'  => $this->input-> post ('ModifiedDate')
    // );
    $insert = $this->curl->simple_post($this->API.'/biaya/', $data, array(CURLOPT_BUFFERSIZE => 10)); 
    if($insert)
    {
        $this->session->set_flashdata('hasil','Insert Data Berhasil');
    }else
    {
        $this->session->set_flashdata('hasil','Insert Data Gagal');
    }
    redirect('biaya?modul=masterBiaya&act=Tambah');
    }
  
    // function updateBiaya(){
    //     $data = array(
    //         # alt + Shift + bawah > untuk copy data ke baris bawah
    //         # alt + bawah/atas > untuk memindahkan data baris atas ke bawah
    //         # contoh harcode param...
    //         # 'Deskripsi'     => "contoh harcode param", 
    //         'AR-KEY'        => $this->key,
    //         'id'            => $this->input-> post ('txtID'),
    //         'Deskripsi'     => $this->input-> post ('txtDeskripsi'),
    //         'Jenjang'       => $this->input-> post ('txtJenjang'),
    //         'CreatedBy'     => $this->input-> post ('CreatedBy'),
    //         'CreatedDate'   => $this->input-> post ('CreatedDate'),
    //         'ModifiedBy'    => $this->input-> post ('ModifiedBy'),
    //         'ModifiedDate'  => $this->input-> post ('ModifiedDate')
    //     );
    //     print_r($data);
    //     $update = $this->curl->simple_put($this->API.'/biaya/', $data, array(CURLOPT_BUFFERSIZE => 10)); 
    //     if($update)
    //     {
    //         $this->session->set_flashdata('hasil','Update Data Berhasil');
    //     }else
    //     {
    //        $this->session->set_flashdata('hasil','Update Data Gagal');
    //     }
    //     redirect('biaya?modul=masterBiaya');
    // }

    // function GetID($Biaya_ID = '')
    // {
    //     $get_apiEditBiaya = json_decode($this -> curl -> simple_get 
    // ($this->API.'/biaya/', array('AR-KEY'=>$this->key, 'id'=>$Biaya_ID) ),true);
    //     $data['editBiaya'] = $get_apiEditBiaya['data'];
    //     // print_r($data);
    //     $data['biaya'] = $this->GetBiaya();
    //     $data['biayaDetail'] = $this->GetBiayaDetail();
    //     $this->load->view('media', $data);
    // }

    function Hapus($Biaya_ID)
    {
        $alertMessage = "Data tidak terhapus";
        $delete =  $this->curl->simple_delete
        ($this->API.'/biaya/', array('AR-KEY'=>$this->key, 'id'=>$Biaya_ID));
          
        if(!$delete)
        {
            $this-> function_alert($alertMessage);
        }
        else
        {
            redirect('biaya?modul=masterBiaya&act=Tambah');
        }
    }
}

/*
<?php
Class Kontak extends CI_Controller{
    
    var $API ="";
    
    function __construct() {
        parent::__construct();
        $this->API="http://localhost/rest_ci/index.php";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }
    
    // menampilkan data kontak
    function index(){
        $data['datakontak'] = json_decode($this->curl->simple_get($this->API.'/kontak'));
        $this->load->view('kontak/list',$data);
    }
    
    // insert data kontak
    function create(){
        if(isset($_POST['submit'])){
            $data = array(
                'id'       =>  $this->input->post('id'),
                'nama'      =>  $this->input->post('nama'),
                'nomor'=>  $this->input->post('nomor'));
            $insert =  $this->curl->simple_post($this->API.'/kontak', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('kontak');
        }else{
            $this->load->view('kontak/create');
        }
    }
    
    // edit data kontak
    function edit(){
        if(isset($_POST['submit'])){
            $data = array(
                'id'       =>  $this->input->post('id'),
                'nama'      =>  $this->input->post('nama'),
                'nomor'=>  $this->input->post('nomor'));
            $update =  $this->curl->simple_put($this->API.'/kontak', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('kontak');
        }else{
            $params = array('id'=>  $this->uri->segment(3));
            $data['datakontak'] = json_decode($this->curl->simple_get($this->API.'/kontak',$params));
            $this->load->view('kontak/edit',$data);
        }
    }
    
    // delete data kontak
    function delete($id){
        if(empty($id)){
            redirect('kontak');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/kontak', array('id'=>$id), array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('kontak');
        }
    }
}
*/