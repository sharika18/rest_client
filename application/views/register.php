<?php
    include "Values/ListofValue.php"; 
    include "Values/ValueRegister.php"; 
    include "Library/head_library.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Arrisalah Lubuklinggau| Registration Page</title>
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
              <b>Formulir akan diproses jika sudah melakukan pembayaran uang pendaftaran sebesar Rp <?=$nominalPendaftaran;?>,-</b> 
                ke rekening Pesantren Modern Ar Risalah Bank BNI Syariah An. Yayasan Pesantren Modern Ar Risalah Lubuklinggau No. Rek 1511111169.
                <br>
                <?=$summary?>
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
                <form id="formRegister">
                  <div id="biodata-santri" class="content" role="tabpanel" aria-labelledby="biodata-santri-trigger">                    
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
                    <br>
                  </div>

                  <div id="biodata-ayah" class="content" role="tabpanel" aria-labelledby="biodata-ayah-trigger">
                    <?php include "Pages/Register/FormAyah.php";?>
                      <button class="btn btn-primary float-right">Next</button>
                    <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                  </div>

                  <div id="biodata-ibu" class="content" role="tabpanel" aria-labelledby="biodata-ibu-trigger">
                      <?php
                        include "Pages/Register/FormIbu.php";
                      ?>
                    <button class="btn btn-primary float-right">Next</button>
                    <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                  </div>

                  <div id="biodata-wali" class="content" role="tabpanel" aria-labelledby="biodata-wali-trigger">
                    <?php
                        include "Pages/Register/FormWali.php";
                      ?>
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                    <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                  </div>
                </form>
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
  include "Script/FormRegistrasiScript.php";
  include "Script/FormRegisterValidationScript.php";
?>
</body>
</html>
