<?php
    if ($_GET['modul']=='home'){
        include "home.php"; 
    }
    elseif ($_GET['modul']=='masterBiaya'){
        include "Master/MasterBiaya.php"; 
    }
    elseif ($_GET['modul']=='masterBiayaDetail'){
        include "Master/MasterBiayaDetail.php"; 
    }
    // elseif ($_GET['modul']=='mahasiswa'){
    //     include "mahasiswa.php"; 
    // }
    // elseif ($_GET['modul']=='t_update'){
    //     include "t_update.php"; 
    // }
?>