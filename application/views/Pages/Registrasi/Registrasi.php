<?php
    include dirname(__DIR__)."/../Values/ListofValue.php"; 
    include dirname(__DIR__)."/../Values/ListOfFolder.php"; 
    include dirname(__DIR__)."/../Values/ValueRegister.php"; 
    include dirname(__DIR__)."/../Library/head_library.php";
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
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid" style="max-width: 80%;">
      <br>
      <div class="row">
        <div class="col-md-12">
          <div class="callout callout-warning">
            <h5><i class="fas fa-info"></i> Note:</h5>
            <b>Formulir akan diproses jika sudah melakukan pembayaran uang pendaftaran sebesar Rp <?=$nominalPendaftaran;?>,-</b> 
                ke rekening Pesantren Modern Ar Risalah Bank BNI Syariah An. Yayasan Pesantren Modern Ar Risalah Lubuklinggau No. Rek 1511111169.
                <hr>
                <?=$summary?>
                Info Lebih Lanjut Hubungi Panitia PSB di 0812-7875-8019.
          </div>

          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">
                Formulir Pendaftaran <b><?=$this->uri->segment(3)?></b>
                Pesantren Modern Ar-Risalah Lubuklinggau - Tahun Pelajaran 
                <?php
                  echo date("Y") ."/";
                  echo date("Y")+1 . "<br>";
                ?>
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
                <!-- <form action="<?php echo base_url()?>registrasi/<?php echo $act?>" method="post" id="formSubmit"> -->
                <?php echo form_open_multipart('Registrasi/'.$act, 'id="formSubmit"');?>

                  <input type="hidden" class="form-control" id="txtJenjang" name="txtJenjang" value="<?=$this->uri->segment(3)?>"/>
                  <input type="hidden" class="form-control" id="txtDeskripsiBiaya" name="txtDeskripsiBiaya" value="Uang Pendaftaran - <?=$this->uri->segment(3)?>"/>
                  
                  <div id="biodata-santri" class="content" role="tabpanel" aria-labelledby="biodata-santri-trigger">                    
                      <div class="card-body">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label for="exampleInputFile">Bukti Pembayaran(File berbentuk Gambar/Photo/PDF)</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="fileBuktiPembayaran" name="fileBuktiPembayaran" required> 
                                  <label class="custom-file-label" for="fileBuktiPembayaran">Choose file</label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php 
                          include "FormSantri.php";
                        ?>
                      </div>
                      <button class="btnNext btn btn-success float-right" id="btnSubmitSantri" >Next</button>
                    <br>
                  </div>

                  <div id="biodata-ayah" class="content" role="tabpanel" aria-labelledby="biodata-ayah-trigger">
                    <div class="card-body">
                      <?php
                          include "FormAyah.php";
                        ?>
                    </div>
                    <button class="btnNext btn btn-success float-right" id="btnSubmitSantri" >Next</button>
                    <button class="btn btn-success" onclick="stepper.previous()">Previous</button>
                  </div>

                  <div id="biodata-ibu" class="content" role="tabpanel" aria-labelledby="biodata-ibu-trigger">
                    <div class="card-body">
                      <?php
                          include "FormIbu.php";
                        ?>
                    </div>
                    <button class="btnNext btn btn-success float-right">Next</button>
                    <button class="btn btn-success" onclick="stepper.previous()">Previous</button>
                  </div>

                  <div id="biodata-wali" class="content" role="tabpanel" aria-labelledby="biodata-wali-trigger">
                    <div class="card-body">
                      <?php
                          include "FormWali.php";
                        ?>
                    </div>
                    <button type="submit" class="btnSubmit btn btn-success float-right" data-toggle="modal">
                      <?php 
                        $alertBoxSubmitMessage = "Apakah data formulir tersebut sudah benar?";
                        echo $_GET['act'] 
                      ?>
                    </button>
                    <button class="btn btn-success" onclick="stepper.previous()">Previous</button>
                  </div>
                <!-- </form> -->
                <?php form_close();?>
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
