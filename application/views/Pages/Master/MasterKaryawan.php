<?php
    $idDataTable ="#dgMasterKaryawan";
    $deleteAlertMessage = "Apakah kamu yakin ingin menghapus karyawan berikut:";
?>
<!DOCTYPE html>
<html lang="en">
  <body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- CONTENT HEADER -->
          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Master Karyawan</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?modul=home">Home</a></li>
                    <li class="breadcrumb-item active">Master Karyawan</li>
                  </ol>
                  
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>
        <!-- CONTENT HEADER -->

        <!-- MAIN CONTENT -->
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">

                  <!-- FORM DATA -->
                    <div class="card card-primary" id="divForm">
                    
                      <div class="card-header">
                        <h3 class="card-title" id="formTitle"></h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form action="" method="post" id="formSubmit">
                        <div class="card-body">
                          <div class="row">  
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>NIP</label>
                                <input type="text" id="inputNIP" name="inputNIP"
                                    class="form-control" placeholder="NIP Karyawan">
                              </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                  <label>Tanggal Mulai Tugas (TMT)</label>
                                  <div class="datepicker input-group date" data-target-input="nearest" id="divDateTMT">
                                      <input type="text" class="form-control datetimepicker-input" data-target="#dateTMT" id="dateTMT" name="dateTMT" required/>
                                      <div class="input-group-append" data-target="#dateTMT" data-toggle="datetimepicker">
                                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                                </div>  
                            </div>
                          </div>
                          <div class="row">  
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label>Nama Lengkap*</label>
                                <input type="text" id="inputNamaLengkap" name="inputNamaLengkap" required
                                    class="form-control inputDeskripsi" placeholder="Nama Lengkap Karyawan">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                  <label>Email</label>
                                  <input type="email" id="emailEmail" name="emailEmail"
                                      class="form-control" placeholder="Email Karyawan (Gmail)">
                                </div>
                            </div>
                          </div>
                          <div class="row">  
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>Pendidikan</label>
                                <select class="custom-select" id="selectPendidikan" name="selectPendidikan" required> 
                                  
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label>Jabatan</label>
                                <select class="custom-select" id="selectJabatanTugas" name="selectJabatanTugas" required> 
                                  
                                </select>
                                </div>
                            </div>
                          </div>
                          <div class="row">  
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>Unit</label>
                                <select class="custom-select" id="selectUnit" name="selectUnit" required> 
                                  
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                  <label>Status Kepegawaian</label>
                                  <select class="custom-select" id="selectStatus" name="selectStatus" required> 
                                  </select>
                                </div>
                            </div>
                          </div>
                          <input type="hidden" class="form-control" id="inputID" name="inputID"/>
                          
                        </div>
                        <!-- /.card-body -->

                      </form>
                        <div class="card-footer">
                          <button type="button" class="btn btn-default" id="btnCancel">Cancel</button>
                          <button type="submit" class="btnSubmit btn btn-primary float-right" data-toggle="modal">
                              <?php 
                                $alertBoxSubmitMessage = "Apakah kamu yakin ingin menyimpan data karyawan berikut?";
                              ?>
                              Simpan
                          </button>
                        </div>
                    </div>
                  <!-- FORM DATA -->

                  <!-- TABLE DATA -->
                    <div class="card" id="divTable">
                      <div class="card-header">
                        <h3 class="card-title">Data Karyawan</h3>
                      </div>
                      
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="dgMasterKaryawan" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>NIP</th>
                              <th>Nama Biaya</th>
                              <th>Email</th>
                              <th>Jabatan/Tugas</th>
                              <th>Unit</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                  <!-- TABLE DATA -->

                </div>
                <!-- MAIN COLUMN -->
              </div>
              <!-- MAIN ROW -->
            </div>
          </section>
        <!-- MAIN CONTENT -->
      <?php 
        include dirname(__DIR__)."/../Common/AlertBoxDeleteFromDatatable.php";
        include dirname(__DIR__)."/../Script/ScriptMasterKaryawan.php";  
        include dirname(__DIR__)."/../Common/AlertBoxSubmitSantri.php";
      ?>
    </div>
  </body>
</html>




