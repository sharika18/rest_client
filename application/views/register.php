<?php
    include "Values/ListofValue.php";  
    include "Library/head_library.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/dist/css/adminlte.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/plugins/daterangepicker/daterangepicker.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/plugins/bs-stepper/css/bs-stepper.min.css">
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header" style="text-align: center;  background-color: #007bff; color: #ffffff;">
    <div class="container-fluid">
      <div class="row mb-2" >
        <div class="col-sm-12">
          <h4>
            Formulir Pendaftaran Santri Baru <p> 
            Pesantren Modern Ar-Risalah Lubuklinggau Tahun Pelajaran 
            <?php
              echo date("Y") ."/";
              echo date("Y")+1 . "<br>";
            ?>
          </h4>
        </div>
      </div>
    </div>
  </section>
  <!-- ./content Header (Page header) -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <br>
      <div class="row">
        <div class="col-md-12">
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title" style="font-size:15px">
                <b>Formulir akan diproses jika sudah melakukan pembayaran uang pendaftaran sebesar Rp 225.000,-</b> ke rekening Pesantren Modern Ar Risalah Bank BNI Syariah An. Yayasan Pesantren Modern Ar Risalah Lubuklinggau No. Rek 1511111169.
                Jumlah Uang Pangkal yang harus dibayar sebesar Rp 8.000.000,- jika pembayaran dilakukan di Bulan April.
                Jumlah Uang Pangkal yang harus dibayar sebesar Rp  9.000.000,- jika pembayaran dilakukan setelah bulan April.
                Info Lebih Lanjut Hubungi Panitia PSB di 0812-7875-8019.
              </h3>
            </div>
            <div class="card-body p-0">
              <div class="bs-stepper">
                <div class="bs-stepper-header" role="tablist">
                  <!-- your steps here -->
                  <div class="step" data-target="#biodata-santri">
                    <button type="button" class="step-trigger" role="tab" aria-controls="biodata-santri" id="biodata-santri-trigger">
                      <span class="bs-stepper-circle">1</span>
                      <span class="bs-stepper-label">Biodata Santri</span>
                    </button>
                  </div>
                  <div class="line"></div>
                  <div class="step" data-target="#biodata-ayah">
                    <button type="button" class="step-trigger" role="tab" aria-controls="biodata-ayah" id="biodata-ayah-trigger">
                      <span class="bs-stepper-circle">2</span>
                      <span class="bs-stepper-label">Biodata Ayah</span>
                    </button>
                  </div>
                  <div class="line"></div>
                  <div class="step" data-target="#biodata-ibu">
                    <button type="button" class="step-trigger" role="tab" aria-controls="biodata-ibu" id="biodata-ibu-trigger">
                      <span class="bs-stepper-circle">3</span>
                      <span class="bs-stepper-label">Biodata Ibu</span>
                    </button>
                  </div>
                  <div class="line"></div>
                  <div class="step" data-target="#biodata-wali">
                    <button type="button" class="step-trigger" role="tab" aria-controls="biodata-wali" id="biodata-wali-trigger">
                      <span class="bs-stepper-circle">4</span>
                      <span class="bs-stepper-label">Biodata Wali</span>
                    </button>
                  </div>
                </div>
                <div class="bs-stepper-content">
                  <div id="biodata-santri" class="content" role="tabpanel" aria-labelledby="biodata-santri-trigger">
                    <form id="formBiodataSantri">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label for="exampleInputFile">Bukti Pembayaran(File berbentuk Gambar/Photo/PDF)</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="exampleInputFile">
                                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                  <span class="input-group-text">Upload</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php 
                          include "Pages/Register/FormSantri.php";
                        ?>
                      </div>
                      <button class="btn btn-primary float-right"  id="btnNextSantri">Next</button>
                    </form>
                    
                    <br>
                  </div>

                  <div id="biodata-ayah" class="content" role="tabpanel" aria-labelledby="biodata-ayah-trigger">
                    <form id="formBiodataAyah">
                      <?php include "Pages/Register/FormAyah.php";?>
                    </form>
                    <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                    <button class="btn btn-primary float-right">Next</button>
                  </div>

                  <div id="biodata-ibu" class="content" role="tabpanel" aria-labelledby="biodata-ibu-trigger">
                    <form id="formBiodataIbu">
                      <?php
                        include "Pages/Register/FormIbu.php";
                      ?>
                    </form>
                    <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                    <button class="btn btn-primary float-right">Next</button>
                  </div>

                  <div id="biodata-wali" class="content" role="tabpanel" aria-labelledby="biodata-wali-trigger">
                    <form id="formBiodataWali">
                      <?php
                        include "Pages/Register/FormWali.php";
                      ?>
                    </form>
                    <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                  </div>
                  
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              Visit <a href="http://arrisalahlubuklinggau.com/" target="_blank">Pesantren Modern Arrisalah Website</a> for more information.
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div>
  </section>
</div>
<!-- /.register-box -->


<?php
  include "Library/script_library.php";
  include "Library/script_custom.php";
  include "Script/FormSantriScript.php";
  include "Script/FormAyahScript.php";
  include "Script/FormIbuScript.php";
  include "Script/FormWaliScript.php";
?>
</body>
</html>
