<?php
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
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Upload Bukti Pembayaran Pendaftaran<br>(Gambar/PDF)</p>

      <?php echo form_open_multipart('Registrasi/Upload/BuktiPembayaran');?>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="exampleInputFile" name="cobaUpload">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <button type="submit" class="btn btn-primary btn-block">Upload</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php form_close();?>
      <?php
        if ($this->session->flashdata('success'))
        {
      ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-check"></i> Success!</h5>
          Selanjutnya kamu akan memdapatkan sms blablabla
        </div>
      <?php
        }
      ?>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->


<?php
  include dirname(__DIR__)."/../Library/script_library.php";
  include dirname(__DIR__)."/../Library/script_custom.php";
  include dirname(__DIR__)."/../Script/FormRegistrasiScript.php";
  include dirname(__DIR__)."/../Script/formRegisterValidationScript.php";

  include dirname(__DIR__)."/../Common/AlertBoxDelete.php";
  include dirname(__DIR__)."/../Common/AlertBoxSubmit.php"; 
  $this->load->view('common/alert');
?>
</body>
</html>
