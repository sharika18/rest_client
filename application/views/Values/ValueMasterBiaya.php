<?php
    //FIELD
    $Id   = "";
    $deskripsi  = "";
    $CreatedBy  = "";
    $CreatedDate= "";
    //OTHERS
    $act = "";
    IF($_GET['act'])
    {
        $act = $_GET['act'].'Biaya';
    }
    $deleteControllerPath = base_url()."Biaya/HapusBiaya/";
    $deleteHrefParam = "?modul=".$_GET['modul']."&act=HapusBiaya";
    $idDataTable ="#dgMasterBiaya";

    $biayaIsNotNull = false;
    if($biaya)
    {
        $biayaIsNotNull = true;
    }   

    IF(($_GET['act']=='Edit'))
    {
        $Id   = $editBiaya[0]['Biaya_ID'];
        $deskripsi  = $editBiaya[0]['Deskripsi'];
        $CreatedBy  = $editBiaya[0]['CreatedBy'];
        $CreatedDate= $editBiaya[0]['CreatedDate'];
    }
?>