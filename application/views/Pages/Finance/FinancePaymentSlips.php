<?php                                                         
      include dirname(__DIR__)."/../Values/ValueFinancePaymentSlips.php"; 
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

  <style>
    .alnright { text-align: right; }
    .alncenter { text-align: center; vertical-align: top; }
  </style>
  
		
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Payroll</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=$dashboardAdminUrl?>">Home</a></li>
              <li class="breadcrumb-item active">Payroll</li>
            </ol>
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- FORM IMPORT -->
          <div class="col-6">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Import Data</h3>
              </div>
              <!-- form start -->
              <form action="<?php echo base_url()?>Payroll/previewExcel?modul=financePayroll&act=Tambah" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <p class="error"><?php echo $this->session->flashdata('GagalDeleteBiaya');?></p>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="fileExcel">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btnSendEmail btn btn-warning float-right">Preview</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.col -->

          <!-- FORM SEND PAYMENT SLIPS -->
          <div class="col-6">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Payroll Slip</h3>
              </div>
              <!-- form start -->
              <form action="<?php echo base_url()?>PayrollSlip/sendPayrollSlipPerPeriod" method="post" id="formSendEmail" enctype="multipart/form-data">
                <div class="card-body">
                  <p class="error"><?php echo $this->session->flashdata('GagalDeleteBiaya');?></p>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <select class="custom-select" id="selectPeriode" name="selectPeriode" required>
                        <option value="">-- Pilih Periode --</option>
                      <?php 
                      if($periodeIsNotNull)
                      {
                        $rowNumber = 0;
                        $ct = count($periode);
                        for ($i=0; $i< count($periode); $i++)
                        { 
                      ?>
                        <option value="<?=$periode[$i]['Periode'];?>"><?=$periode[$i]['Periode'];?></option>
                      <?php
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="button" class="btnDeleteSlip btn btn-danger" 
                    data-toggle="modal">
                      <?php 
                      $alertBoxDeleteSlip = "Apakah kamu yakin ingin <b>menghapus</b> periode :";
                      ?>
                      Delete
                  </button>
                  <button type="button" class="btnSendEmail btn btn-success float-right" 
                    data-toggle="modal">
                      <?php 
                      $alertBoxSendEmail = "Apakah kamu yakin ingin mengirimkan slip gaji periode berikut :";
                      ?>
                      Send
                  </button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.col -->

          <div class="col-12">

            <!-- PREVIEW DATA FINANCE -->
            <div id="previewDataFinance" class="card" style="display: <?=$dataPreviewDisplay;?>;">
              <div class="card-header">
                <h3 class="card-title">Preview Data Finance</h3>
                <div class="card-tools">
                  <a href="<?php echo base_url()?>Payroll?modul=financePayroll&act=Tambah" class="btnRemove btn btn-tool"  role="button"><i class="fas fa-times"></i></a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dgPreviewDataFinance" class="display nowrap table table-bordered table-striped" style="width:100%">
                  <thead>
                    <tr>
                      <th></th>
                      <th class="all">Periode</th>
                      <th class="all">NIP</th>
                      <th class="all">Nama</th>
                      <th class="none">Email</th>
                      <th class="none">Jabatan/Tugas</th>
                      <th class="none">Unit</th>
                      <th class="none">Status</th>
                      <th class="all">Total Income</th>
                      <th class="all">Total Fasilitas</th>
                      <th class="all">Total Potongan</th>

                      <th class="none"> Income  Gaji Pokok</th>
                      <th class="none"> Income  Tunjangan Harian</th>
                      <th class="none"> Income  Tunjangan Jabatan 1</th>
                      <th class="none"> Income  Tunjangan Jabatan2</th>
                      <th class="none"> Income  Tunjangan Anak</th>
                      <th class="none"> Income  Tunjangan Istri</th>
                      <th class="none"> Income  Reward Kehadiran</th>
                      <th class="none"> Income  Kepanitiaan</th>
                      <th class="none"> Income  Supervisi</th>
                      <th class="none"> Income  Tambahan Jam Mengajar</th>
                      <th class="none"> Income  Tambahan Extracurricular</th>

                      <th class="none"> Fasilitas TempatTinggal</th>
                      <th class="none"> Fasilitas Air</th>
                      <th class="none"> Fasilitas Listrik</th>
                      <th class="none"> Fasilitas Maintenance Rumah</th>
                      <th class="none"> Fasilitas Konsumsi Bulanan</th>
                      <th class="none"> Fasilitas Sembako</th>
                      <th class="none"> Fasilitas Biaya Sekolah</th>
                      <th class="none"> Fasilitas SPP Sekolah</th>
                      <th class="none"> Fasilitas Kesehatan</th>
                      <th class="none"> Fasilitas BPJS Kesehatan</th>
                      <th class="none"> Fasilitas BPJS Ketenagakerjaan</th>
                      <th class="none"> Fasilitas Lainnya</th>

                      <th class="none">Hari Ketidakhadiran</th>
                      <th class="none">Potongan Ketidakhadiran</th>
                      <th class="none">Potongan Keterlambatan</th>
                      <th class="none">Potongan Arisan Pondok</th>
                      <th class="none">Potongan Pinjaman</th>
                      <th class="none">Potongan Dana Pensiun</th>
                      <th class="none">Potongan Tabungan</th>
                      <th class="none">Potongan Pembiayaan BMA 1</th>
                      <th class="none">Potongan Pembiayaan BMA 2</th>
                      <th class="none">Potongan BPJS Kesehatan</th>
                      <th class="none">Potongan BPJS Ketenagakerjaan</th>
                      <th class="none">Potongan Arisan Qurban</th>
                      <th class="none">Potongan Lainnya</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      if($previewIsNotNull)
                      {
                        $rowNumber = 0;
                        $ct = count($preview);
                        for ($i=0; $i< count($preview); $i++)
                        { 
                          $rowNumber++;
                          $id = $preview[$i]['Periode'];
                      ?>
                        
                        <tr>
                          <td></td>
                          <td><?=$preview[$i]['Periode'];?></td>
                          <td><?=$preview[$i]['NIP'];?></td>
                          <td class="tdDeskripsi"><?=$preview[$i]['Nama'];?></td>
                          <td><?=$preview[$i]['Email'];?></td>
                          <td><?=$preview[$i]['jabatanTugas'];?></td>
                          <td><?=$preview[$i]['Unit'];?></td>
                          <td><?=$preview[$i]['statusKepegawaian'];?></td>
                          <td class='alnright'><?=number_format($preview[$i]['incomeTotal'], 0, '.', ',');?></td>
                          <td class='alnright'><?=number_format($preview[$i]['fasilitasTotal'], 0, '.', ',');?></td>
                          <td class='alnright'><?=number_format($preview[$i]['potonganTotal'], 0, '.', ',');?></td>

                          <td><?=number_format($preview[$i]['incomeGajiPokok'], 0, '.', ',');?></td>
                          <td><?=number_format($preview[$i]['incomeTunjanganHarian'], 0, '.', ',');?></td>
                          <td><?=number_format($preview[$i]['incomeTunjanganJabatan1'], 0, '.', ',');?></td>
                          <td><?=number_format($preview[$i]['incomeTunjanganJabatan2'], 0, '.', ',');?></td>
                          <td><?=number_format($preview[$i]['incomeTunjanganAnak'], 0, '.', ',');?></td>
                          <td><?=number_format($preview[$i]['incomeTunjanganIstri'], 0, '.', ',');?></td>
                          <td><?=number_format($preview[$i]['incomeRewardKehadiran'], 0, '.', ',');?></td>
                          <td><?=number_format($preview[$i]['incomeKepanitiaan'], 0, '.', ',');?></td>
                          <td><?=number_format($preview[$i]['incomeSupervisi'], 0, '.', ',');?></td>
                          <td><?=number_format($preview[$i]['incomeTambahanJamMengajar'], 0, '.', ',');?></td>
                          <td><?=number_format($preview[$i]['incomeTambahanExtracurricular'], 0, '.', ',');?></td>

                          <td><?=number_format($preview[$i]['fasilitasTempatTinggal'], 0, '.', ',');?></td>
                          <td><?=number_format($preview[$i]['fasilitasAir'], 0, '.', ',');?></td>
                          <td><?=number_format($preview[$i]['fasilitasListrik'], 0, '.', ',');?></td>
                          <td><?=number_format($preview[$i]['fasilitasMaintenanceRumah'], 0, '.', ',');?></td>
                          <td><?=number_format($preview[$i]['fasilitasKonsumsiBulanan'], 0, '.', ',');?></td>
                          <td><?=number_format($preview[$i]['fasilitasSembako'], 0, '.', ',');?></td>
                          <td><?=number_format($preview[$i]['fasilitasBiayaSekolah'], 0, '.', ',');?></td>
                          <td><?=number_format($preview[$i]['fasilitasSppSekolah'], 0, '.', ',');?></td>
                          <td><?=number_format($preview[$i]['fasilitasKesehatan'], 0, '.', ',');?></td>
                          <td><?=number_format($preview[$i]['fasilitasBpjsKesehatan'], 0, '.', ',');?></td>
                          <td><?=number_format($preview[$i]['fasilitasBpjsKetenagakerjaan'], 0, '.', ',');?></td>
                          <td><?=number_format($preview[$i]['fasilitasLainnya'], 0, '.', ',');?></td>

                          <td><?=$preview[$i]['hariKetidakhadiran']." Hari";?></td>
                          <td><?=number_format($preview[$i]['potonganKetidakhadiran'], 0, '.', ',');?></td>
                          <td><?=number_format($preview[$i]['potonganKeterlambatan'], 0, '.', ',');?></td>
                          <td><?=number_format($preview[$i]['potonganArisanPondok'], 0, '.', ',');?></td>
                          <td><?=number_format($preview[$i]['potonganPinjaman'], 0, '.', ',');?></td>
                          <td><?=number_format($preview[$i]['potonganDanaPensiun'], 0, '.', ',');?></td>
                          <td><?=number_format($preview[$i]['potonganTabungan'], 0, '.', ',');?></td>
                          <td><?=number_format($preview[$i]['potonganPembiayaanBma1'], 0, '.', ',');?></td>
                          <td><?=number_format($preview[$i]['potonganPembiayaanBma2'], 0, '.', ',');?></td>
                          <td><?=number_format($preview[$i]['potonganBpjsKesehatan'], 0, '.', ',');?></td>
                          <td><?=number_format($preview[$i]['potonganBpjsKetenagakerjaan'], 0, '.', ',');?></td>
                          <td><?=number_format($preview[$i]['potonganArisanQurban'], 0, '.', ',');?></td>
                          <td><?=number_format($preview[$i]['potonganLainnya'], 0, '.', ',');?></td>

                        </tr>
                      <?php
                        }
                      }
                      ?>
                  </tbody>
                </table>
              </div>
              <div class="card-footer">
                <form action="<?php echo base_url()?>Payroll/importExcel" method="post" id="formSubmit" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" id="txtFileName" name="txtFileName" value="<?=$newFileName?>"/>
                </form>
                <button type="submit" class="btnSubmit btn btn-primary float-right" data-toggle="modal">
                    <?php 
                      $alertBoxSubmitMessage = "Apakah kamu yakin ingin mengimport data berikut?";
                    ?>
                    Import
                </button>
              </div>
              <!-- /.card-body -->
            </div>

            <!-- DATA FINANCE -->
            <div class="card" style="display: <?=$dataFinanceDisplay;?>;">
              <div class="card-header">
                <h3 class="card-title">Data Finance</h3>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
              <table id="dgDataFinance" class="display nowrap table table-bordered table-striped" style="width:100%">
                  <thead>
                    <tr>
                      <th rowspan="2"></th>
                      <th class="all alncenter" colspan="3">Keterangan</th>
                      <th class="all alncenter" colspan="4">Total</th>
                      <th></th>
                    </tr>
                    <tr>
                      <th class="all">Periode</th>
                      <th class="all">NIP</th>
                      <th class="all">Nama</th>
                      <th class="none">Email</th>
                      <th class="none">Jabatan/Tugas</th>
                      <th class="none">Unit</th>
                      <th class="none">Status</th>
                      <th class="all">Income</th>
                      <th class="all">Fasilitas</th>
                      <th class="all">Potongan</th>
                      <th class="all">THP</th>
                      <th class="all"></th>

                      <th class="none"> Income  Gaji Pokok</th>
                      <th class="none"> Income  Tunjangan Harian</th>
                      <th class="none"> Income  Tunjangan Jabatan 1</th>
                      <th class="none"> Income  Tunjangan Jabatan2</th>
                      <th class="none"> Income  Tunjangan Anak</th>
                      <th class="none"> Income  Tunjangan Istri</th>
                      <th class="none"> Income  Reward Kehadiran</th>
                      <th class="none"> Income  Kepanitiaan</th>
                      <th class="none"> Income  Supervisi</th>
                      <th class="none"> Income  Tambahan Jam Mengajar</th>
                      <th class="none"> Income  Tambahan Extracurricular</th>

                      <th class="none"> Fasilitas TempatTinggal</th>
                      <th class="none"> Fasilitas Air</th>
                      <th class="none"> Fasilitas Listrik</th>
                      <th class="none"> Fasilitas Maintenance Rumah</th>
                      <th class="none"> Fasilitas Konsumsi Bulanan</th>
                      <th class="none"> Fasilitas Sembako</th>
                      <th class="none"> Fasilitas Biaya Sekolah</th>
                      <th class="none"> Fasilitas SPP Sekolah</th>
                      <th class="none"> Fasilitas Kesehatan</th>
                      <th class="none"> Fasilitas BPJS Kesehatan</th>
                      <th class="none"> Fasilitas BPJS Ketenagakerjaan</th>
                      <th class="none"> Fasilitas Lainnya</th>

                      <th class="none">Hari Ketidakhadiran</th>
                      <th class="none">Potongan Ketidakhadiran</th>
                      <th class="none">Potongan Keterlambatan</th>
                      <th class="none">Potongan Arisan Pondok</th>
                      <th class="none">Potongan Pinjaman</th>
                      <th class="none">Potongan Dana Pensiun</th>
                      <th class="none">Potongan Tabungan</th>
                      <th class="none">Potongan Pembiayaan BMA 1</th>
                      <th class="none">Potongan Pembiayaan BMA 2</th>
                      <th class="none">Potongan BPJS Kesehatan</th>
                      <th class="none">Potongan BPJS Ketenagakerjaan</th>
                      <th class="none">Potongan Arisan Qurban</th>
                      <th class="none">Potongan Lainnya</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      if($payrollIsNotNull)
                      {
                        $rowNumber = 0;
                        $ct = count($payroll);
                        for ($i=0; $i< count($payroll); $i++)
                        { 
                          $rowNumber++;
                          $NIP = $payroll[$i]['NIP'];
                          if(trim($payroll[$i]['Email']) == ''){
                            $hidden = 'hidden';    
                          }else{
                            $hidden = '';
                          }
                      ?>
                        
                        <tr>
                          <td></td>
                          <td class="tdPeriode"><?=$payroll[$i]['Periode'];?></td>
                          <td class="tdNIP"><?=$payroll[$i]['NIP'];?></td>
                          <td class="tdDeskripsi"><?=$payroll[$i]['Nama'];?></td>
                          <td>
                            <?=$payroll[$i]['Email'];?>
                            <a  href="<?php echo base_url()?>Karyawan/getKaryawanByNIP/<?=$payroll[$i]['NIP'];?>?modul=masterKaryawan&act=Edit" 
                                class="btnEdit btn btn-warning btn-sm" title="edit email"><i class="fas fa-edit"></i></a>
                          </td>
                          <td><?=$payroll[$i]['jabatanTugas'];?></td>
                          <td><?=$payroll[$i]['Unit'];?></td>
                          <td><?=$payroll[$i]['statusKepegawaian'];?></td>
                          <td class='alnright'><?=number_format($payroll[$i]['incomeTotal'], 0, '.', ',');?></td>
                          <td class='alnright'><?=number_format($payroll[$i]['fasilitasTotal'], 0, '.', ',');?></td>
                          <td class='alnright'><?=number_format($payroll[$i]['potonganTotal'], 0, '.', ',');?></td>
                          <td class='alnright'><?=number_format($payroll[$i]['thpTotal'], 0, '.', ',');?></td>
                          
                          <td class='alnright'>
                            <div class="btn-group">
                              <a  href="<?php echo base_url()?>PaymentHistory/getPaymentDetail/<?=$NIP?>?modul=financePaymentHistory&act=Edit" 
                                  class="btnEdit btn btn-info btn-sm" title="payroll history"><i class="fas fa-eye"></i></a>
                              <button <?=$hidden?>  id="biayaId" class="btnSendEmailFromGrid btn btn-success btn-sm" 
                                  data-toggle="modal" 
                                  data-target="#modalSendEmailFromGrid" title="send payroll slip"><i class="far fa-envelope"></i></button>
                            </div>
                          </td>

                          <td><?=number_format($payroll[$i]['incomeGajiPokok'], 0, '.', ',');?></td>
                          <td><?=number_format($payroll[$i]['incomeTunjanganHarian'], 0, '.', ',');?></td>
                          <td><?=number_format($payroll[$i]['incomeTunjanganJabatan1'], 0, '.', ',');?></td>
                          <td><?=number_format($payroll[$i]['incomeTunjanganJabatan2'], 0, '.', ',');?></td>
                          <td><?=number_format($payroll[$i]['incomeTunjanganAnak'], 0, '.', ',');?></td>
                          <td><?=number_format($payroll[$i]['incomeTunjanganIstri'], 0, '.', ',');?></td>
                          <td><?=number_format($payroll[$i]['incomeRewardKehadiran'], 0, '.', ',');?></td>
                          <td><?=number_format($payroll[$i]['incomeKepanitiaan'], 0, '.', ',');?></td>
                          <td><?=number_format($payroll[$i]['incomeSupervisi'], 0, '.', ',');?></td>
                          <td><?=number_format($payroll[$i]['incomeTambahanJamMengajar'], 0, '.', ',');?></td>
                          <td><?=number_format($payroll[$i]['incomeTambahanExtracurricular'], 0, '.', ',');?></td>

                          <td><?=number_format($payroll[$i]['fasilitasTempatTinggal'], 0, '.', ',');?></td>
                          <td><?=number_format($payroll[$i]['fasilitasAir'], 0, '.', ',');?></td>
                          <td><?=number_format($payroll[$i]['fasilitasListrik'], 0, '.', ',');?></td>
                          <td><?=number_format($payroll[$i]['fasilitasMaintenanceRumah'], 0, '.', ',');?></td>
                          <td><?=number_format($payroll[$i]['fasilitasKonsumsiBulanan'], 0, '.', ',');?></td>
                          <td><?=number_format($payroll[$i]['fasilitasSembako'], 0, '.', ',');?></td>
                          <td><?=number_format($payroll[$i]['fasilitasBiayaSekolah'], 0, '.', ',');?></td>
                          <td><?=number_format($payroll[$i]['fasilitasSppSekolah'], 0, '.', ',');?></td>
                          <td><?=number_format($payroll[$i]['fasilitasKesehatan'], 0, '.', ',');?></td>
                          <td><?=number_format($payroll[$i]['fasilitasBpjsKesehatan'], 0, '.', ',');?></td>
                          <td><?=number_format($payroll[$i]['fasilitasBpjsKetenagakerjaan'], 0, '.', ',');?></td>
                          <td><?=number_format($payroll[$i]['fasilitasLainnya'], 0, '.', ',');?></td>

                          <td><?=$payroll[$i]['hariKetidakhadiran']." Hari";?></td>
                          <td><?=number_format($payroll[$i]['potonganKetidakhadiran'], 0, '.', ',');?></td>
                          <td><?=number_format($payroll[$i]['potonganKeterlambatan'], 0, '.', ',');?></td>
                          <td><?=number_format($payroll[$i]['potonganArisanPondok'], 0, '.', ',');?></td>
                          <td><?=number_format($payroll[$i]['potonganPinjaman'], 0, '.', ',');?></td>
                          <td><?=number_format($payroll[$i]['potonganDanaPensiun'], 0, '.', ',');?></td>
                          <td><?=number_format($payroll[$i]['potonganTabungan'], 0, '.', ',');?></td>
                          <td><?=number_format($payroll[$i]['potonganPembiayaanBma1'], 0, '.', ',');?></td>
                          <td><?=number_format($payroll[$i]['potonganPembiayaanBma2'], 0, '.', ',');?></td>
                          <td><?=number_format($payroll[$i]['potonganBpjsKesehatan'], 0, '.', ',');?></td>
                          <td><?=number_format($payroll[$i]['potonganBpjsKetenagakerjaan'], 0, '.', ',');?></td>
                          <td><?=number_format($payroll[$i]['potonganArisanQurban'], 0, '.', ',');?></td>
                          <td><?=number_format($payroll[$i]['potonganLainnya'], 0, '.', ',');?></td>
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
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  <!-- /.content-wrapper -->
  <?php 
    include dirname(__DIR__)."/../Common/AlertBoxSendEmailFromGrid.php";
    include dirname(__DIR__)."/../Common/AlertBoxSubmit.php"; 
    include dirname(__DIR__)."/../Common/AlertBoxSendEmail.php";
    include dirname(__DIR__)."/../Common/AlertBoxDeleteSlip.php"; 
    
    include dirname(__DIR__)."/../Script/FinancePaymentsSlipsScript.php";
    $this->load->view('Common/Alert');
  ?>
</div>
<!-- ./wrapper -->

<script>
    var tablePreview = $('#dgPreviewDataFinance').DataTable({
    responsive: {
        details: {
        type: 'column'
        }
    },
    columnDefs: [{
        className: 'control',
        orderable: false,
        targets: 0
    }],
    order: [1, 'asc']
    });

    var tableData = $('#dgDataFinance').DataTable({
    responsive: {
        details: {
        type: 'column'
        }
    },
    columnDefs: [{
        className: 'control',
        orderable: false,
        targets: 0
    }],
    order: [1, 'asc']
    });

    $('#btn-show-all-doc').on('click', expandCollapseAll);

    function expandCollapseAll() {
      tablePreview.rows('.parent').nodes().to$().find('td:first-child').trigger('click').length || 
      tablePreview.rows(':not(.parent)').nodes().to$().find('td:first-child').trigger('click')
    }
</script>
</body>
</html>




