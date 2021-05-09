<?php                                                         
      include "Values/ValueMasterBiaya.php"; 
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
            <h1>Master Biaya</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="?modul=home">Home</a></li>
              <li class="breadcrumb-item active">Master Biaya</li>
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
                <h3 class="card-title"><?php echo $_GET['act'] ?> Data Biaya</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo base_url()?>biaya/<?php echo $_GET['act'] ?>" method="post">
                <div class="card-body">
                
                <input type="hidden" class="form-control" id="txtID" name="txtID" value="<?=$Id?>"/>
                <input type="hidden" class="form-control" id="txtID" name="CreatedBy" value="<?=$CreatedBy?>"/>
                <input type="hidden" class="form-control" id="txtID" name="CreatedDate" value="<?=$CreatedDate?>"/>
                
                  <div class="form-group">
                    <label>Nama Biaya</label>
                    <input type="text" class="form-control" id="txtDeskripsi" name="txtDeskripsi" placeholder="Nama Biaya"
                      value="<?=$deskripsi?>"/>
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
                <h3 class="card-title">Manage Biaya</h3>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dgMasterBiaya" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Biaya</th>
                    <th>Created By</th>
                    <th>Created Date</th>
                    <th>Modified By</th>
                    <th>Modified Date</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $rowNumber = 0;
                      $ct = count($biaya);
                      for ($i=0; $i< count($biaya); $i++)
                      { 
                        $rowNumber++;
                    ?>
                      <tr>
                        <td><?=$rowNumber;?></td>
                        <td><?=$biaya[$i]['Deskripsi'];?></td>
                        <!-- <td>
                          <?
                          // =$biaya[$i]['Jenjang'];
                          ?>
                        </td> -->
                        <td><?=$biaya[$i]['CreatedBy'];?></td>
                        <td><?=$biaya[$i]['CreatedDate'];?></td>
                        <td><?=$biaya[$i]['ModifiedBy'];?></td>
                        <td><?=$biaya[$i]['ModifiedDate'];?></td>
                        <td> 
                        <a href="<?php echo base_url()?>Biaya/GetID/<?php echo$biaya[$i]['Biaya_ID']; ?>?modul=masterBiaya&act=Edit" class="nav-link">Edit</a>
                        <a href="<?php echo base_url()?>Biaya/Hapus/<?php echo$biaya[$i]['Biaya_ID']; ?>?modul=masterBiaya&act=Hapus" class="nav-link"
                        onclick="return confirm('Yakin mau hapus data <?php echo strtoupper($biaya[$i]['Deskripsi']); ?>? ntar nyesel loh wkwkwk')">Delete</a>
                        </td>
                      </tr>
                    <?php
                      }
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama Biaya</th>
                      <th>Created By</th>
                      <th>Created Date</th>
                      <th>Modified By</th>
                      <th>Modified Date</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

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

