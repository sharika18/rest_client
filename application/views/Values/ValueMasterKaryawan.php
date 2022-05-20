<?php
    //FIELD
    $Id                 = "";
    $TMT                = "";
    $NIP                = "";
    $NamaLengkap        = "";
    $Email              = "";
    $jabatanTugasID     = "";
    $statusID           = "";
    $unitID             = "";
    $pendidikanID       = "";
    $CreatedBy          = "";
    $CreatedDate        = "";
    
    //OTHERS
    $act = "";
    IF($_GET['act'])
    {
        $act = $_GET['act'].'Karyawan';
    }
    $deleteControllerPath = base_url()."Karyawan/HapusKaryawan/";
    $deleteHrefParam = "?modul=".$_GET['modul']."&act=HapusKaryawan";
    $idDataTable ="#dgMasterKaryawan";

    /*$biayaIsNotNull = false;
    if($biaya)
    {
        $biayaIsNotNull = true;
    }   */

    //VARIABLES
    $vwKaryawanDetailIsNotNull = false;
    $jabatanTugasIsNotNull = false;
    $statusKaryawanIsNotNull = false;
    $unitIsNotNull = false;
    $pendidikanIsNotNull = false;

    $aa = "apaan";

    //CHECK IF DATA IS NULL OR EMPTY
    if($VwKaryawanDetail){
        $vwKaryawanDetailIsNotNull = true;
        $aa = "apaan??";
    } 
    
    if($jabatanTugas){
        $jabatanTugasIsNotNull = true;
    } 

    if($statusKaryawan){
        $statusKaryawanIsNotNull = true;
    } 

    if($unit){
        $unitIsNotNull = true;
    } 

    if($pendidikan){
        $pendidikanIsNotNull = true;
    } 

    //CHECK IS IT EDIT OR NOT
    IF(($_GET['act']=='Edit') && $editKaryawan)
    {
        $Id   = $editKaryawan[0]['karyawanID'];
        $TMT   = $editKaryawan[0]['TanggalMulaiTugas'];
        $NIP   = $editKaryawan[0]['NIP'];
        $NamaLengkap   = $editKaryawan[0]['NamaLengkap'];
        $Email   = $editKaryawan[0]['Email'];
        $jabatanTugasID   = $editKaryawan[0]['jabatanTugasID'];
        $statusID   = $editKaryawan[0]['statusID'];
        $unitID   = $editKaryawan[0]['unitID'];
        $pendidikanID = $editKaryawan[0]['pendidikanID'];
        $CreatedBy  = $editKaryawan[0]['createdBy'];
        $CreatedDate= $editKaryawan[0]['createdDate'];
    }
?>
