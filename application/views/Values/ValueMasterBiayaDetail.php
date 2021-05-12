<?php
    //FIELD
    $Id         = "";
    $biaya_id   = "";
    $jenjang    = "";
    $gelombang  = "";
    $nominal    = "";
    $ketentuan  = "";
    $startdate  = "0000-00-00";
    $enddate    = "";
    $CreatedBy  = "";
    $CreatedDate= "";

    //OTHERS
    $act = "";
    IF($_GET['act'])
    {
        $act = $_GET['act'].'BiayaDetail';
    }
    $idDataTable ="#dgMasterBiayaDetail";

    IF(($_GET['act']=='Edit'))
    {
        $Id   = $editBiayaDetail[0]['Biaya_Detail_ID'];
        $biaya_id  = $editBiayaDetail[0]['Biaya_ID'];
        //ok
        $jenjang    = $editBiayaDetail[0]['Jenjang'];
        //ok
        $gelombang    = $editBiayaDetail[0]['Gelombang']; 
        $nominal    = $editBiayaDetail[0]['Nominal']; 
        
        $ketentuan  = $editBiayaDetail[0]['Ketentuan'];

        $startdate  = $editBiayaDetail[0]['StartDate'];
        $enddate  = $editBiayaDetail[0]['EndDate'];
        
        $CreatedBy  = $editBiayaDetail[0]['CreatedBy'];
        $CreatedDate= $editBiayaDetail[0]['CreatedDate'];
    }
?>