<?php
    parent::__construct();
    $this->API  = "http://localhost/ArrisalahWebApp/rest_ci2/"; //"http://api.arrisalahlubuklinggau.com/";
    $this->key  = "arrisalah123"; # variable key
    $this->load->library('session');
    $this->load->library('curl');
    $this->load->helper('form');
    $this->load->helper('url');
    date_default_timezone_set('Asia/Jakarta');
    

    //ALERT MESSAGE
    $this->successPost = "Data Berhasil Disimpan";
    $this->errorPost = "Data Tidak Berhasil Disimpan";

    $this->successPut = "Data Berhasil Diubah";
    $this->errorPut = "Data Tidak Berhasil Diubah";

    $this->successDelete = "Data Berhasil Dihapus";
    $this->errorDelete = "Data Tidak Berhasil Dihapus";
    
    $this->successImport = "Data Berhasil Diimport ";
    //PATH
    $this->uploadPath = "./assets/uploads/";
    $this->paymentSlipsDir = "./assets/PaymentSlips/";
    $this->tmpPaymentExcelDir = "./assets/tmpPaymentExcel/";
    $this->folderBuktiPembayaran = 'BuktiPembayaran';
    $this->folderUangpangkal = 'folder2';

    //SMTP