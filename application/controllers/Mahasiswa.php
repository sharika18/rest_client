<?php

Class Mahasiswa extends CI_Controller{


    var $API ="";

    function __construct() 
    {
        include "construct.php"; 
    }

    // menampilkan data kontak
    function index()
    {
        $id = null;
        $nama1 = "ian";
        $nama2 = "y";
        $AR_KEY = "arrisalah123";
        //$url_api = 'http://localhost/rest_ci2/mahasiswa';
        
        # dengan parameter...
        //$get_api = json_decode($this -> curl -> simple_get ($this->API.'/mahasiswa/', array('id'=>$id, 'nama'=>$nama)),true);
        $get_api = json_decode($this -> curl -> simple_get ($this->API.'/mahasiswa/', array('AR-KEY'=>$this->key, 'nama' => $nama1)),true);
        
        # get data dengan parameter berbeda
        $get_api2 = json_decode($this -> curl -> simple_get ($this->API.'/mahasiswa/', array('AR-KEY'=>$this->key, 'nama' => $nama2)),true);

        $get_api3 = json_decode($this -> curl -> simple_get ($this->API.'/biaya/', array('AR-KEY'=>$this->key)),true);

        # contoh bisa ambil status...
        //$data['mahasiswa'] = $get_api['status'];
        
        $data['mahasiswa1'] = $get_api['data'];
        $data['mahasiswa2'] = $get_api2['data'];
        $data['biaya'] = $get_api3['data'];
        // $data['query'] = $get_api['query'];

        // print_r($data);
        // print_r($data1);
        // print_r($data2);

        $this->load->view('media', $data);

        // $data['datamahasiswa'] = json_decode($this->curl->simple_get($this->API.'/mahasiswa'));
        // $this->load->view('mahasiswa/list',$data);
    }

    // var $API ="";

    // function __construct() {
    //     parent::__construct();
    //     $this->API="http://localhost/rest_ci/index.php";
    //     $this->load->library('session');
    //     $this->load->library('curl');
    //     $this->load->helper('form');
    //     $this->load->helper('url');
    // }

    // // menampilkan data kontak
    // function index(){
    //     $data['datakontak'] = json_decode($this->curl->simple_get($this->API.'/kontak'));
    //     $this->load->view('kontak/list',$data);
    // }


}