<?php

    //DATA
    $dataPreviewDisplay = "none";
    $dataFinanceDisplay ="true";
    $previewIsNotNull = false;
    $hidden = "";
    $newFileName = "";
    if(isset($fileName))
    {
        $newFileName = $fileName;
    }
    if(isset($preview))
    {
        $previewIsNotNull = true;
        $dataPreviewDisplay = "true";
        $dataFinanceDisplay ="none";
    }


    //OTHERS
    $act = "";
    IF($_GET['act'])
    {
        $act = $_GET['act'].'Biaya';
    }
    $sendEmailControllerPath = base_url()."PayrollSlip/sendPayrollSlipPerEmployee/";
    $deleteControllerPath = base_url()."Payroll/deletePayrollByPeriode/";
    $deleteHrefParam = "?modul=".$_GET['modul']."&act=HapusBiaya";
    $idDataTable ="#dgDataFinance";

    //VARIABLES
    $payrollIsNotNull = false;
    $periodeIsNotNull = false;

    //CHECK IF DATA IS NULL OR EMPTY
    if(isset($periode)){
        $periodeIsNotNull = true;
    }
    if(isset($payroll)){
        $payrollIsNotNull = true;
    } 
?>
