<?php                                                         
      include dirname(__DIR__)."/../Values/ValueMasterKaryawan.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>

  
		
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!-- FORM TAMBAH DATA -->
            <div class="card card-primary">
            
              <div class="card-header">
                <h3 class="card-title"><?php echo $_GET['act'] ?> Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo base_url()?>Karyawan/<?php echo $act?>" method="post" id="formSubmit">
                <div class="card-body">
                  <div class="row">  
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>NIP</label>
                        <input type="text" id="inputNIP" name="inputNIP"
                            class="form-control" placeholder="NIP Karyawan" value="<?=$NIP?>"  readonly>
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Tanggal Mulai Tugas (TMT)</label>
                          <div class="datepicker input-group date" data-target-input="nearest" id="divDateTMT">
                              <input type="text" class="form-control datetimepicker-input" data-target="#dateTMT" id="dateTMT" name="dateTMT" required value="<?=$TMT?>"/>
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
                            class="form-control" placeholder="Nama Lengkap Karyawan" value="<?=$NamaLengkap?>" >
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" id="emailEmail" name="emailEmail"
                              class="form-control" placeholder="Email Karyawan (Gmail)" value="<?=$Email?>">
                        </div>
                    </div>
                  </div>
                  <div class="row">  
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Pendidikan</label>
                        <select class="custom-select" id="selectPendidikan" name="selectPendidikan" required> 
                          <option value="0">-- Pilih Pendidikan --</option>
                          <?php
                            if($pendidikanIsNotNull)
                            {
                              for ($i=0; $i< count($pendidikan); $i++)
                              {
                                $selected = "";
                                if($pendidikanID == $pendidikan[$i]['pendidikanID'])
                                {
                                  $selected = 'selected = "selected"';
                                }
                                echo '
                                
                                <option value="'.$pendidikan[$i]['pendidikanID']. '"' .$selected. '>' .$pendidikan[$i]['Pendidikan']. '</option>
                                ';
                              } 
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                        <label>Jabatan</label>
                        <select class="custom-select" id="selectJabatanTugas" name="selectJabatanTugas" required> 
                          <option value="0">-- Pilih Jabatan / Tugas --</option>
                          <?php
                            if($jabatanTugasIsNotNull)
                            {
                              for ($i=0; $i< count($jabatanTugas); $i++)
                              {
                                $selected = "";
                                if($jabatanTugasID == $jabatanTugas[$i]['jabatanTugasID'])
                                {
                                  $selected = 'selected = "selected"';
                                }
                                echo '
                                
                                <option value="'.$jabatanTugas[$i]['jabatanTugasID']. '"' .$selected. '>' .$jabatanTugas[$i]['jabatanTugas']. '</option>
                                ';
                              } 
                            }
                          ?>
                        </select>
                        </div>
                    </div>
                  </div>
                  <div class="row">  
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Unit</label>
                        <select class="custom-select" id="selectUnit" name="selectUnit" required> 
                          <option value="0">-- Pilih Unit --</option>
                          <?php
                            if($unitIsNotNull)
                            {
                              for ($i=0; $i< count($unit); $i++)
                              {
                                $selected = "";
                                if($unitID == $unit[$i]['unitID'])
                                {
                                  $selected = 'selected = "selected"';
                                }
                                echo '
                                
                                <option value="'.$unit[$i]['unitID']. '"' .$selected. '>' .$unit[$i]['unit']. '</option>
                                ';
                              } 
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Status Kepegawaian</label>
                          <select class="custom-select" id="selectStatus" name="selectStatus" required> 
                            <option value="0">-- Pilih Status --</option>
                            <?php
                            if($statusKaryawanIsNotNull)
                            {
                              for ($i=0; $i< count($statusKaryawan); $i++)
                              {
                                $selected = "";
                                if($statusID == $statusKaryawan[$i]['statusID'])
                                {
                                  $selected = 'selected = "selected"';
                                }
                                echo '
                                
                                <option value="'.$statusKaryawan[$i]['statusID']. '"' .$selected. '>' .$statusKaryawan[$i]['status']. '</option>
                                ';
                              } 
                            }
                          ?>
                          </select>
                        </div>
                    </div>
                  </div>
                  <input type="hidden" class="form-control" id="txtID" name="txtID" value="<?=$Id?>"/>
                  <input type="hidden" class="form-control" id="txtID" name="CreatedBy" value="<?=$CreatedBy?>"/>
                  <input type="hidden" class="form-control" id="txtID" name="CreatedDate" value="<?=$CreatedDate?>"/>
                  <p class="error"><?php echo $this->session->flashdata('GagalDeleteBiaya');?></p>
                  
                </div>
                <!-- /.card-body -->

              </form>
                <div class="card-footer">
                  <a href="<?php echo base_url()?>Karyawan?modul=masterKaryawan&act=Tambah" 
                    class="btn btn-default">Cancel</a>
                  <button type="submit" class="btnSubmit btn btn-primary float-right" data-toggle="modal">
                      <?php 
                      $alertBoxSubmitMessage = "Apakah kamu yakin ingin menambahkan data berikut?";
                      echo $_GET['act'] 
                      ?>
                  </button>
                </div>
            </div>

            <!-- FORM TABLE DATA -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Karyawan</h3>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dgMasterKaryawan" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    
                    <th>ID</th>
                    <th>NIP</th>
                    <th>Tanggal Mulai Tugas</th>
                    <th>Nama Biaya</th>
                    <th>Email</th>
                    <th>Jabatan/Tugas</th>
                    <th>Unit</th>
                    <th>Status</th>
                    <th>Act</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    if($vwKaryawanDetailIsNotNull)
                    {
                      $rowNumber = 0;
                      //$ct = count($biaya);
                      for ($i=0; $i< count($VwKaryawanDetail); $i++)
                      { 
                        $rowNumber++;
                        $NIP = $VwKaryawanDetail[$i]['NIP'];
                        $tanggalMulaiTugas = date_create($VwKaryawanDetail[$i]['TanggalMulaiTugas']);
                    ?>
                      
                      <tr>
                        <td><?=$VwKaryawanDetail[$i]['karyawanID'];?></td>
                        <td><?=$VwKaryawanDetail[$i]['NIP'];?></td>
                        <td><?=date_format($tanggalMulaiTugas, "Y-M-d");?></td>
                        <td class="tdDeskripsi"><?=$VwKaryawanDetail[$i]['NamaLengkap'];?></td>
                        <td><?=$VwKaryawanDetail[$i]['Email'];?></td>
                        <td><?=$VwKaryawanDetail[$i]['jabatanTugas'];?></td>
                        <td><?=$VwKaryawanDetail[$i]['unit'];?></td>
                        <td><?=$VwKaryawanDetail[$i]['status'];?></td>
                        <td>
                          <div class="btn-group">
                            <a  href="<?php echo base_url()?>Karyawan/getKaryawanByNIP/<?=$NIP?>?modul=masterKaryawan&act=Edit" 
                                class="btnEdit btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            <button  id="biayaId" class="btnDelete btn btn-danger btn-sm" 
                                data-toggle="modal" 
                                data-target="#modalDelete"><i class="far fa-trash-alt"></i></button>
                          </div>
                        </td>
                      </tr>
                    <?php
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  <!-- /.content-wrapper -->
  <?php 
    include dirname(__DIR__)."/../Common/AlertBoxDelete.php";
    include dirname(__DIR__)."/../Common/AlertBoxSubmit.php";
    include dirname(__DIR__)."/../Script/ScriptMasterKaryawan.php";  
    $this->load->view('Common/Alert');
  ?>
</div>
<!-- ./wrapper -->
</body>
</html>




