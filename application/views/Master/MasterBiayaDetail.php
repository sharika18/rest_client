<?php
      include dirname(__DIR__)."/Values/ValueMasterBiayaDetail.php"; 
      include dirname(__DIR__)."/Values/ListofValue.php";       
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
            <h1>Master Biaya Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="?modul=home">Home</a></li>
              <li class="breadcrumb-item active">Master Biaya Detail</li>
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
            <!-- insert biaya forms -->
            <div class="card card-primary">

              <div class="card-header">
                <h3 class="card-title"><?php echo $_GET['act'] ?> Data Biaya Detail</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form action="<?php echo base_url()?>biayadetail/<?php echo $act?>" method="post">
                <div class="card-body">
                
                <input type="hidden" class="form-control" id="txtID" name="txtID" value="<?=$Id?>"/>
                <input type="hidden" class="form-control" id="txtID" name="CreatedBy" value="<?=$CreatedBy?>"/>
                <input type="hidden" class="form-control" id="txtID" name="CreatedDate" value="<?=$CreatedDate?>"/>
                <div class="row">
                <div class="col-md-6">                                                    
                  <div class="form-group">
                    
                      <label>Biaya :</label>
                      <select class="custom-select" id="txtBiaya" name="txtBiaya">
                      <option value="">Pilih Biaya</option>
                      <?php
                        for ($i=0; $i< count($biaya); $i++)
                        {
                          // $value = $biaya[$i]['Deskripsi']." - ".$biaya[$i]['Jenjang'];
                          $value = $biaya[$i]['Deskripsi'];
                          $selected = "";
                          if($value == "")
                          {
                            $selected = 'selected = "selected"';
                          }
                          echo '
                          
                            <option value="'.$biaya[$i]['Biaya_ID'].'" '.$selected.'>'.$value.'</option>
                          ';
                        }
                      ?>
                      </select>
                    
                  </div>

                  <div class="form-group">
                  <label>Jenjang :</label>
                  <select class="custom-select" id="txtJenjang" name="txtJenjang">
                  <option value="">Pilih Jenjang</option>
                  <?php
                    foreach($jenjangList as $listJenjang)
                    {
                      $selected = "";
                      if($jenjang == $listJenjang)
                      {
                        $selected = 'selected = "selected"';
                      }
                      echo '
                      
                        <option value="'.$listJenjang. '"' .$selected. '>' .$listJenjang. '</option>
                      ';
                    }
                  ?>
                  </select>    
                  </div>

                  <div class="form-group">
                  <label>Gelombang :</label>
                  <select class="custom-select" id="txtGelombang" name="txtGelombang">
                  <option value="">Pilih Gelombang</option>
                  <?php
                    foreach($gelombangList as $listGelombang)
                    {
                      $selected = "";
                      if($geombang == $listGelombang)
                      {
                        $selected = 'selected = "selected"';
                      }
                      echo '
                      
                        <option value="' .$listGelombang. '"' .$selected. '>' .$listGelombang. '</option>
                      ';
                    }
                  ?>
                  </select>    
                  </div>
                </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nominal :</label>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" id="txtNominal" name="txtNominal" placeholder="Isi nominal biaya...">
                        <div class="input-group-append" >
                          <span class="input-group-text">.00</span>
                        </div>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label>Start Date :</label>
                      <div class="input-group date" data-target-input="nearest" id="divStartDate">
                          <input type="text" class="form-control datetimepicker-input" data-target="#txtStartDate" id="txtStartDate" name="txtStartDate"/>
                          <div class="input-group-append" data-target="#txtStartDate" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                    </div>             
                    
                    <div class="form-group">
                      <label>End Date :</label>
                      <div class="input-group date" data-target-input="nearest" id="divEndDate">
                          <input type="text" class="form-control datetimepicker-input" data-target="#txtEndDate" id="txtEndDate" name="txtEndDate"/>
                          <div class="input-group-append" data-target="#txtEndDate" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
                                  
                  <div class="form-group">
                    <label>Ketentuan :</label>
                    <textarea type="text" class="form-control" id="txtKetentuan" name="txtKetentuan" rows="3" placeholder="Ketentuan" value="<?=$Ketentuan?>"></textarea>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"><?php echo $_GET['act'] ?></button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Manage Biaya Detail</h3>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body" >
                <table id="dgMasterBiayaDetail" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <!-- <th>Biaya Deatail ID</th>
                    <th>Biaya ID</th> -->
                    <th>Deskripsi</th>
                    <th>Gelombang</th>
                    <th>Nominal</th>
                    <th>Ketentuan</th>
                    <th>StartDate</th>
                    <th>EndDateDate</th>
                    <th>Aksi</th>
                    <!-- <th>CreatedBy</th>
                    <th>CreatedDate</th> -->
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $rowNumber = 0;
                      for ($i=0; $i< count($biayaDetail); $i++)
                      { 
                        $rowNumber++;
                    ?>
                      <tr>
                        <td><?=$rowNumber;?></td>
                        <!-- <td><?=$biayaDetail[$i]['Biaya_Detail_ID'];?></td>
                        <td><?=$biayaDetail[$i]['Biaya_ID'];?></td> -->
                        <td><?=$biayaDetail[$i]['Deskripsi'];?> - <?=$biayaDetail[$i]['Jenjang'];?></td>
                        <td><?=$biayaDetail[$i]['Gelombang'];?></td>
                        <td><?=$biayaDetail[$i]['Nominal'];?></td>
                        <td><?=$biayaDetail[$i]['Ketentuan'];?></td>
                        <td><?=$biayaDetail[$i]['StartDate'];?></td>
                        <td><?=$biayaDetail[$i]['EndDate'];?></td>
                        <td>
                        <a href="<?php echo base_url()?>Biaya/GetID/<?php echo$biayaDetail[$i]['Biaya_Detail_ID']; ?>?modul=masterBiaya&act=Edit" class="nav-link">Edit</a>
                        <a href="<?php echo base_url()?>BiayaDetail/Hapus/<?php echo$biayaDetail[$i]['Biaya_Detail_ID']; ?>?modul=masterBiayaDetail&act=Hapus" class="nav-link"
                        onclick="return confirm('Yakin mau hapus data <?php echo strtoupper($biayaDetail[$i]['Deskripsi']); ?> - <?=$biayaDetail[$i]['Jenjang'];?>? ntar nyesel loh wkwkwk')">Delete</a>
                        </td>
                        <!-- <td><?// =$biayaDetail[$i]['CreatedBy'];?></td>
                        <td><?//=$biayaDetail[$i]['CreatedDate'];?></td> -->
                      </tr>
                    <?php
                      }
                    ?>
                  </tbody>
                  <!-- <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Biaya Deatail ID</th>
                      <th>Biaya ID</th>
                      <th>Deskripsi</th>
                      <th>Nominal</th>
                      <th>Ketentuan</th>
                      <th>StartDate</th>
                      <th>EndDateDate</th>
                      <th>CreatedBy</th>
                      <th>CreatedDate</th>
                    </tr>
                  </tfoot> -->
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

</div>
<!-- ./wrapper -->

</body>
</html>

