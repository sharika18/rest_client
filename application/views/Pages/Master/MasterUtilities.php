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
                  <h1>Master Utilities</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?modul=home">Home</a></li>
                    <li class="breadcrumb-item active">Master Utilities</li>
                  </ol>
                  
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>
        <!-- CONTENT HEADER -->

        <!-- MAIN CONTENT -->
          <section class="content">
            <div class="container-fluid">

              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="fas fa-edit"></i>
                    Manage Utilities Parameter
                  </h3>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-5 col-sm-3">
                      <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="vert-tabs-jabatan-tab" data-toggle="pill" href="#vert-tabs-jabatan" role="tab" aria-controls="vert-tabs-jabatan" aria-selected="false">Jabatan</a>
                        <a class="nav-link" id="vert-tabs-unit-tab" data-toggle="pill" href="#vert-tabs-unit" role="tab" aria-controls="vert-tabs-unit" aria-selected="false">Unit</a>
                        <a class="nav-link" id="vert-tabs-pendidikan-tab" data-toggle="pill" href="#vert-tabs-pendidikan" role="tab" aria-controls="vert-tabs-pendidikan" aria-selected="false">Pendidikan</a>
                        <a class="nav-link" id="vert-tabs-statusKepegawian-tab" data-toggle="pill" href="#vert-tabs-statusKepegawian" role="tab" aria-controls="vert-tabs-statusKepegawian" aria-selected="false">Status Kepegawaian</a>
                      </div>
                    </div>
                    <div class="col-7 col-sm-9">
                      <div class="tab-content" id="vert-tabs-tabContent">
                        <div class="tab-pane text-left fade show active" id="vert-tabs-jabatan" role="tabpanel" aria-labelledby="vert-tabs-jabatan-tab">
                          <?php
                            include dirname(__DIR__).("/Utilities/FormJabatan.php");
                          ?>
                        </div>
                        <div class="tab-pane fade active" id="vert-tabs-unit" role="tabpanel" aria-labelledby="vert-tabs-unit-tab">
                          <?php
                            include dirname(__DIR__).("/Utilities/FormUnit.php");
                          ?>
                        </div>
                        <div class="tab-pane fade active" id="vert-tabs-pendidikan" role="tabpanel" aria-labelledby="vert-tabs-pendidikan-tab">
                          <?php
                            include dirname(__DIR__).("/Utilities/FormPendidikan.php");
                          ?>
                        </div>
                        <div class="tab-pane fade active" id="vert-tabs-statusKepegawian" role="tabpanel" aria-labelledby="vert-tabs-statusKepegawian-tab">
                          <?php
                            include dirname(__DIR__).("/Utilities/FormStatusKepegawaian.php");
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card -->
              </div>
              <!-- MAIN ROW -->
            </div>
          </section>
        <!-- MAIN CONTENT -->
      <?php 
        include dirname(__DIR__)."/../Common/AlertBoxDeleteFromDatatable.php";
        include dirname(__DIR__)."/../Script/ScriptMasterUtilities.php";  
        include dirname(__DIR__)."/../Common/AlertBoxSubmitData.php";
      ?>
    </div>
  </body>
</html>




