<?php                                                         
      include dirname(__DIR__)."/../Values/ValueDashboardAdmin.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=$title?></title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2"> 
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <?php
            $colors = array("bg-danger", "bg-warning", "bg-success", "bg-info");
            for ($i=1; $i< count($jumlahKaryawan); $i++)
            { 

          ?>
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <span class="info-box-icon <?=$colors[$i-1]?> elevation-1"><i class="fas fa-users"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Karyawan <?=$jumlahKaryawan[$i]['status'];?></span>
                    <span class="info-box-number">
                      <?=$jumlahKaryawan[$i]['jumlah'];?>
                      <small>orang</small>
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
          <?php
            }
          ?>    

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

        </div>
        
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Payroll</h3>
                </div>
              </div>
              <div class="card-body">
                <div class="position-relative mb-4">
                  <canvas id="payroll-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> Gaji
                  </span>

                  <span class="mr-2">
                    <i class="fas fa-square text-gray"></i> Reward
                  </span>

                  <span class="mr-2">
                    <i class="fas fa-square text-warning"></i> Fasilitas
                  </span>

                  <span>
                    <i class="fas fa-square text-danger"></i> Potongan
                  </span>
                </div>
              </div>
            </div> 
            <!-- /.card -->
            <!-- TABLE: LATEST EMPLOYEE -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">15 Karyawan Baru</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>NIP</th>
                      <th>TMT</th>
                      <th>Nama</th>
                      <th>Status</th>
                      <th>Unit</th>
                      <th>Jabatan</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    if($vwKaryawanDetailIsNotNull)
                    {
                      $rowNumber = 0;
                      //$ct = count($biaya);
                      for ($i=0; $i< 10; $i++)
                      { 
                        $badgeColor = "";
                        if($vwKaryawanDetail[$i]['status'] == 'Magang')
                        {
                          $badgeColor = "badge-danger";
                        }else if($vwKaryawanDetail[$i]['status'] == 'Percobaan')
                        {
                          $badgeColor = "badge-warning";
                        }else if($vwKaryawanDetail[$i]['status'] == 'Kontrak')
                        {
                          $badgeColor = "badge-success";
                        }else if($vwKaryawanDetail[$i]['status'] == 'Tetap')
                        {
                          $badgeColor = "badge-info";
                        }

                        $rowNumber++;
                        $NIP = $vwKaryawanDetail[$i]['NIP'];
                        $tanggalMulaiTugas = date_create($vwKaryawanDetail[$i]['TanggalMulaiTugas']);
                    ?>
                      <tr>
                        <td>
                          <a href="<?php echo base_url()?>Karyawan/getKaryawanByNIP/<?=$NIP?>?modul=masterKaryawan&act=Edit">
                            <?=$vwKaryawanDetail[$i]['NIP'];?>
                          </a>
                        </td>
                        <td><?=date_format($tanggalMulaiTugas, "Y-M-d");?></td>
                        <td><?=$vwKaryawanDetail[$i]['NamaLengkap'];?></td>
                        <td><span class="badge <?=$badgeColor?>"><?=$vwKaryawanDetail[$i]['status'];?></span></td>
                        <td><?=$vwKaryawanDetail[$i]['unit'];?></td>
                        <td><?=$vwKaryawanDetail[$i]['jabatanTugas'];?></td>
                      </tr>
                    <?php
                      }
                    }
                    ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="<?php echo base_url()?>Karyawan?modul=masterKaryawan&act=Tambah" class="btn btn-sm btn-info float-left">Tambah Karyawan Baru</a>
                <a href="<?php echo base_url()?>Karyawan?modul=masterKaryawan&act=Tambah" class="btn btn-sm btn-secondary float-right">Lihat Semua</a>
              </div>
              <!-- /.card-footer -->
            </div>
          </section>
          <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
  <!-- /.content-wrapper -->
  
</div>
<!-- ./wrapper -->
<?php  
  $htmlString= 'testing';
  $s_to_json=json_encode((array)$sumPeriode);
  //echo $s_to_json;
?>

<script>
  /* global Chart:false */

  $(function () {
    //alert((123345678).toLocaleString());
    'use strict'
    
    var countSumPeriode = <?=count($sumPeriode)?>;
    var fromPHP=<?=$s_to_json ?>;

    const chartLabels = [];
    const chartDataIncome = [];
    const chartDataReward = [];
    const chartDataFasilitas = [];
    const chartDataPotongan = [];


    for (let i = 0; i < fromPHP.length; i++) {
         
      chartLabels.push(fromPHP[i]['Periode']);
      chartDataIncome.push(fromPHP[i]['incomeTotal']);
      chartDataReward.push(fromPHP[i]['rewardTotal']);
      chartDataFasilitas.push(fromPHP[i]['fasilitasTotal']);
      chartDataPotongan.push(fromPHP[i]['potonganTotal']);
    }
    

    var ticksStyle = {
      fontColor: '#495057',
      fontStyle: 'bold'
    }
  
    var mode = 'index'
    var intersect = true
  
    var $payrollChart = $('#payroll-chart')
    // eslint-disable-next-line no-unused-vars
    var payrollChart = new Chart($payrollChart, {
      type: 'bar',
      data: {
        labels: chartLabels,
        datasets: [
          {
            backgroundColor: '#007bff',
            borderColor: '#007bff',
            data: chartDataIncome
          },
          {
            backgroundColor: '#ced4da',
            borderColor: '#ced4da',
            data: chartDataReward
          },
          {
            backgroundColor: '#ffc107',
            borderColor: '#ffc107',
            data: chartDataFasilitas
          },
          {
            backgroundColor: '#dc3545',
            borderColor: '#dc3545',
            data: chartDataPotongan
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          callbacks: {
            // this callback is used to create the tooltip label
            label: function(tooltipItem, data) {
              // get the data label and data value to display
              // convert the data value to local string so it uses a comma seperated number
              var dataLabel = "Rp ";//data.labels[tooltipItem.index];
              // add the currency symbol $ to the label
              var value = (data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index]);
              value = value.toString();
              value = value.split(/(?=(?:...)*$)/);
              // Convert the array to a string and format the output
              value = value.join('.');
              // make sure this isn't a multi-line label (e.g. [["label 1 - line 1, "line 2, ], [etc...]])
              if (Chart.helpers.isArray(dataLabel)) {
                // show value on first line of multiline label
                // need to clone because we are changing the value
                dataLabel = dataLabel.slice();
                dataLabel[0] += value;
              } else {
                dataLabel += value;
              }
              // return the text to display on the tooltip
              return dataLabel;
            }
          }
      },
        hover: {
          mode: mode,
          intersect: intersect
        },
        legend: {
          display: false
        },
        scales: {
          yAxes: [{
            // display: false,
            gridLines: {
              display: true,
              lineWidth: '4px',
              color: 'rgba(0, 0, 0, .2)',
              zeroLineColor: 'transparent'
            },
            ticks: $.extend({
              beginAtZero: true,
  
              // Include a dollar sign in the ticks
              callback: function (value) {
                if (value >= 1000) {
                  value /= 1000
                  value += 'k'
                }
  
                return 'Rp' + value
              }
            }, ticksStyle)
          }],
          xAxes: [{
            display: true,
            gridLines: {
              display: false
            },
            ticks: ticksStyle
          }]
        }
      }
    })
  })
  
</script>
</body>
</html>
