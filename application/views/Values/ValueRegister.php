<?php
    include dirname(__DIR__)."/Library/php_script.php";
    $deskripsi ="";
    $nominalPendaftaran ="";
    $gelombang ="";
    $nominal ="";
    $startDate ="";
    $endDate ="";
    $detailUangPangkal = "";
    $summary = "";
    
    //OTHERS
    $act = "Tambah";
    IF($_GET['act'])
    {
        $act = $_GET['act'].'Registrasi';
    }

    //HEADER
    if($biayaDetail)
    {
        $ct = count($biayaDetail);
        for ($i=0; $i< count($biayaDetail); $i++)
        { 
            $deskripsi = $biayaDetail[$i]['Deskripsi'];
            $gelombang = $biayaDetail[$i]['Gelombang'];
            $nominal = number_format($biayaDetail[$i]['Nominal']);
            $startDate = date_format(date_create($biayaDetail[$i]['StartDate']),"F"); 
            $endDate =date_format(date_create($biayaDetail[$i]['EndDate']),"F");

            $nominalPendaftaran ="";
            if($deskripsi == "Uang Pendaftaran")
            {
                $nominalPendaftaran = number_format($biayaDetail[$i]['Nominal']);
            }
            
            if($deskripsi == "Uang Pangkal")
            {
                $detailUangPangkal = "Jumlah Uang Pangkal yang harus dibayar untuk ".$gelombang." sebesar Rp".$nominal.
                ",- jika pembayaran dilakukan di Bulan ".bulanIndonesia($startDate)."-".bulanIndonesia($endDate)."<br>";
                $summary .= $detailUangPangkal;
            }
            
        }
    }   
?>