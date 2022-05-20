<?php
    //FIELD
    $Id                 = "";
    $TMT                = "";
    $NIP                = "";
    $NamaLengkap        = "";
    $Email              = "";
    $jabatanTugas       = "";
    $status             = "";
    $unit               = "";
    $CreatedBy          = "";
    $CreatedDate        = "";
    
    //OTHERS
    $act = "";
    // IF($_GET['act'])
    // {
    //     $act = $_GET['act'].'Karyawan';
    // }

    $sendEmailControllerPath = base_url()."PayrollSlip/sendPayrollSlipPerEmployee/";
    $deleteHrefParam = "?modul=".$_GET['modul']."&act=HapusKaryawan";
    $idDataTable ="#dgDataFinance";

    //VARIABLES
    $payrollIsNotNull = false;

    //CHECK IF DATA IS NULL OR EMPTY
    if(isset($payroll)){
        $payrollIsNotNull = true;
    } 


    If($karyawanDetail)
    {
        $Id             = $karyawanDetail[0]['karyawanID'];
        $TMT            = $karyawanDetail[0]['TanggalMulaiTugas'];
        $NIP            = $karyawanDetail[0]['NIP'];
        $NamaLengkap    = $karyawanDetail[0]['NamaLengkap'];
        $Email          = $karyawanDetail[0]['Email'];
        $jabatanTugas   = $karyawanDetail[0]['jabatanTugas'];
        $status         = $karyawanDetail[0]['status'];
        $unit           = $karyawanDetail[0]['unit'];
    }
?>
