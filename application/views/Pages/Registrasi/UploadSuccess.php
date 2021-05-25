<?php
    include dirname(__DIR__)."/../Values/ListofValue.php"; 
    include dirname(__DIR__)."/../Values/ListOfFolder.php"; 
    include dirname(__DIR__)."/../Library/head_library.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Arrisalah Lubuklinggau| Registration Page</title>
</head>
<body class="hold-transition register-page">
  <div class="register-box">
  <div class="callout callout-success">
    <h5><i class="fas fa-check-circle text-success"></i> Formulir Berhasil Disubmit!.</h5>

    <p>Apabila bukti pembayaran sudah terkonfirmasi, kami akan mengirimkan blablabla.
    </p>
    <hr>
    <a href="https://arrisalahlubuklinggau.com/" target="_blank"><i class="fas fa-laptop-house"></i>Home</a>
  </div>
  </div>
<!-- /.register-box -->


<?php
  include dirname(__DIR__)."/../Library/script_library.php";
  include dirname(__DIR__)."/../Common/AlertBoxDelete.php";
  include dirname(__DIR__)."/../Common/AlertBoxSubmit.php"; 
  $this->load->view('common/alert');
?>
</body>
</html>
