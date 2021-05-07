<?php
    $Id   = "";
    $deskripsi  = "";
    $CreatedBy  = "";
    $CreatedDate= "";

    IF(($_GET['act']=='Edit'))
    {
        $Id   = $editBiaya[0]['Biaya_ID'];
        $deskripsi  = $editBiaya[0]['Deskripsi'];
        $CreatedBy  = $editBiaya[0]['CreatedBy'];
        $CreatedDate= $editBiaya[0]['CreatedDate'];
    }
?>