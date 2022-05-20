<?php                                                         
      include dirname(__DIR__)."/../Values/ValueFinancePaymentHistory.php"; 
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
            <h1>Payroll History</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=$dashboardAdminUrl?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>Payroll?modul=financePayroll&act=Tambah">Payroll</a></li>
              <li class="breadcrumb-item active">Payroll History</li>
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
                <h3 class="card-title">Employee Detail</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start --> 
                <div class="card-body">
                  <div class="row">  
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>NIP</label>
                        <input type="text" id="inputNIP" name="inputNIP"
                            class="form-control" placeholder="NIP Karyawan" value="<?=$NIP?>"  readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">  
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Tanggal Mulai Tugas (TMT)</label>
                          <div class="datepicker input-group date" data-target-input="nearest" id="divDateTMT">
                              <input type="text" class="form-control datetimepicker-input" data-target="#dateTMT" id="dateTMT" name="dateTMT" required value="<?=$TMT?>" readonly/>
                              <div class="input-group-append" data-target="#dateTMT" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                        </div>  
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Nama Lengkap*</label>
                          <input type="text" id="inputNamaLengkap" name="inputNamaLengkap" required
                              class="form-control" placeholder="Nama Lengkap Karyawan" value="<?=$NamaLengkap?>" readonly>
                        </div>
                    </div>
                  </div>
                  <div class="row">  
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" id="emailEmail" name="emailEmail" required
                              class="form-control" placeholder="Email Karyawan (Gmail)" value="<?=$Email?>" readonly>
                        </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Unit*</label>
                        <input type="text" id="inputUnit" name="inputUnit" required
                            class="form-control" placeholder="Nama Lengkap Karyawan" value="<?=$unit?>" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">  
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Jabatan Tugas</label>
                        <input type="text" id="inputJabatanTugas" name="inputJabatanTugas" required
                            class="form-control" placeholder="Nama Lengkap Karyawan" value="<?=$jabatanTugas?>" readonly>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Status Kepegawaian</label>
                        <input type="text" id="inputStatus" name="inputStatus" required
                            class="form-control" placeholder="Nama Lengkap Karyawan" value="<?=$status?>" readonly>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" class="form-control" id="txtID" name="txtID" value="<?=$Id?>" readonly/>
                  <p class="error"><?php echo $this->session->flashdata('GagalDeleteBiaya');?></p>
                  
                </div>
                <div class="card-footer">
                  <a href="<?php echo base_url()?>Karyawan/getKaryawanByNIP/<?=$NIP?>?modul=masterKaryawan&act=Edit" 
                    class="btn btn-primary float-right">Edit</a>
                </div>
            </div>

            <!-- DATA FINANCE -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Payroll History</h3>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
              <table id="dgDataFinance" class="display nowrap table table-bordered table-striped" style="width:100%">
                  <thead>
                    <tr>
                      <th rowspan="2"></th>
                      <th class="all alncenter">Keterangan</th>
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
                          if($payroll[$i]['Email'] == ''){
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
                          <td><?=$payroll[$i]['Email'];?></td>
                          <td><?=$payroll[$i]['jabatanTugas'];?></td>
                          <td><?=$payroll[$i]['Unit'];?></td>
                          <td><?=$payroll[$i]['statusKepegawaian'];?></td>
                          <td class='alnright'><?=number_format($payroll[$i]['incomeTotal'], 0, '.', ',');?></td>
                          <td class='alnright'><?=number_format($payroll[$i]['fasilitasTotal'], 0, '.', ',');?></td>
                          <td class='alnright'><?=number_format($payroll[$i]['potonganTotal'], 0, '.', ',');?></td>
                          <td class='alnright'><?=number_format($payroll[$i]['thpTotal'], 0, '.', ',');?></td>
                          
                          <td class='alnright'>
                            <div class="btn-group">
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
    
    include dirname(__DIR__)."/../Script/ScriptMasterKaryawan.php";  
    $this->load->view('Common/Alert');
  ?>
</div>
<!-- ./wrapper -->
<script>
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




