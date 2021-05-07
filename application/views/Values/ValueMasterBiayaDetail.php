<?php
    $Id   = "";
    $deskripsi  = "";
    $jenjang    = "";
    $CreatedBy  = "";
    $CreatedDate= "";
    $Ketentuan  = "";
    $act = "";

    IF(($_GET['act']=='Edit'))
    {
        $Id   = $editBiaya[0]['Biaya_ID'];
        $deskripsi  = $editBiaya[0]['Deskripsi'];
        $jenjang    = $editBiaya[0]['Jenjang'];
        $CreatedBy  = $editBiaya[0]['CreatedBy'];
        $CreatedDate= $editBiaya[0]['CreatedDate'];
    }

    IF(($_GET['act']=='Tambah'))
    {
        $act = $_GET['act'].'BiayaDetail';
    }
?>