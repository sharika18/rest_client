<?php
    $idDataTable ="#dgMasterKaryawan";
    $deleteAlertMessage = "Apakah kamu yakin ingin menghapus karyawan berikut:";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | DataTables</title>

    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
      
  </head>
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
                                    class="form-control" placeholder="NIP Karyawan" required>
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
                                    <label>Jenis Kelamin*</label>
                                    <div class="form-group clearfix">
                                        <div class="row">
                                        <div class="col-sm-6">
                                            <div class="icheck-success d-inline">
                                            <input type="radio" id="radioLakilaki" name="radioJenisKelaminKaryawan" value="L" checked>
                                            <label for="radioLakilaki">Laki-laki </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="icheck-success d-inline">
                                            <input type="radio" id="radioPerempuan" value="P" name="radioJenisKelaminKaryawan" required>
                                            <label for="radioPerempuan">Perempuan</label>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <!-- text input -->
                                <div class="form-group">
                                <label>Tempat Lahir*</label>
                                <input type="text" id="inputTempatLahirKaryawan" name="inputTempatLahirKaryawan"
                                    class="form-control" placeholder="tempat lahir Karyawan" required pattern="[^']+">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                <label>Tanggal Lahir :</label>
                                <div class="input-group date" data-target-input="nearest">
                                    <input type="text" id="dateTanggalLahirKaryawan" name="dateTanggalLahirKaryawan"
                                        class="form-control datetimepicker-input" data-target="#dateTanggalLahirKaryawan"  required/>
                                    <div class="input-group-append" data-target="#dateTanggalLahirKaryawan" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
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
                                  <label>Status Kepegawaian</label>
                                  <select class="custom-select" id="selectStatus" name="selectStatus" required> 
                                  </select>
                                </div>
                            </div>
                          </div>
                          <div class="row">  
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>Status Mukim</label>
                                <select class="custom-select" id="selectStatusMukim" name="selectStatusMukim" required> 
                                  <option value="">-- Pilih Status Mukim</option>
                                  <option value="1">Mukim</option>
                                  <option value="0">Tidak Mukim</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <h5 class="mt-4 mb-2">Jabatan Karyawan</h5>
                          <div class="row">  
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>Unit 1</label>
                                <select class="custom-select" id="selectUnit" name="selectUnit" required> 
                                  
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label>Jabatan 1</label>
                                <select class="custom-select" id="selectJabatanTugas" name="selectJabatanTugas" required> 
                                  
                                </select>
                                </div>
                            </div>
                          </div>
                          <div class="row">  
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>Unit 2</label>
                                <select class="custom-select" id="selectUnit2" name="selectUnit2"> 
                                  
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label>Jabatan 2</label>
                                <select class="custom-select" id="selectJabatanTugas2" name="selectJabatanTugas2"> 
                                  
                                </select>
                                </div>
                            </div>
                          </div>
                          <input type="hidden" class="form-control" id="inputID" name="inputID"/>
                          <input type="hidden" class="form-control" id="inputKaryawanJabatan" name="inputKaryawanJabatan"/>
                          <input type="hidden" class="form-control" id="inputKaryawanJabatan2" name="inputKaryawanJabatan2"/>
                          
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
                        <table id="dgMasterKaryawan"  class="display nowrap table table-bordered table-striped" style="width:100%">
                          <thead>
                            <tr>
                              <th></th>
                              <th class="all">NIP</th>
                              <th class="all">Nama Lengkap</th>
                              <th class="none">Tanggal Mulai Tugas</th>
                              <th class="none">Jenis Kelamin</th>
                              <th class="none">Tempat Lahir</th>
                              <th class="none">Tanggal Lahir</th>
                              <th class="all">Email</th>
                              <th class="none">Pendidikan</th>
                              <th class="all">Status</th>
                              <th class="all">Jabatan/Tugas 1</th>
                              <th class="all">Unit 1</th>
                              <th class="none">Jabatan/Tugas 2</th>
                              <th class="none">Unit 2</th>
                              <th class="none">Status Mukim</th>
                              <th class="all">Action</th>
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
        include dirname(__DIR__)."/../Common/AlertBoxSubmitData.php";
      ?>
    </div>
  </body>
</html>




