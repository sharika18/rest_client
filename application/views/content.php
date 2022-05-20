<?php
    if ($_GET['modul']=='home'){
        include "Pages/Dashboard/DashboardAdmin.php"; 
    }
    elseif ($_GET['modul']=='masterKaryawan'){
        include "Pages/Master/MasterKaryawan.php"; 
    }
    elseif ($_GET['modul']=='masterBiaya'){
        include "Pages/Master/MasterBiaya.php"; 
    }
    elseif ($_GET['modul']=='masterBiayaDetail'){
        include "Pages/Master/MasterBiayaDetail.php"; 
    }
    elseif ($_GET['modul']=='mahasiswa'){
        include "mahasiswa.php"; 
    }
    elseif ($_GET['modul']=='financePayroll'){
        include "Pages/Finance/FinancePaymentSlips.php"; 
    }
    elseif ($_GET['modul']=='financePaymentHistory'){
        include "Pages/Finance/FinancePaymentHistory.php"; 
    }
?>