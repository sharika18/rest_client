<?php
    if ($_GET['modul']=='home'){
        include "home.php"; 
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
?>