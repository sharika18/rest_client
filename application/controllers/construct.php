<?php
    parent::__construct();
    $this->API  ="http://localhost/rest_ci2";
    $this->key  = "arrisalah123"; # variable key
    $this->load->library('session');
    $this->load->library('curl');
    $this->load->helper('form');
    $this->load->helper('url');
    date_default_timezone_set('Asia/Jakarta');
    $this->uploadPath = "./assets/uploads/";

    //ALERT MESSAGE
    $this->success = "Data Berhasil";
    $this->error = "Data Berhasil";