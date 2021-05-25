<?php                                                         
      include dirname(__DIR__)."/../Values/ValueMasterBiaya.php"; 
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
              <form action="<?php echo base_url()?>biaya/<?php echo $act?>" method="post" id="formSubmit">
                <div class="card-body">
                  <input type="hidden" class="form-control" id="txtID" name="txtID" value="<?=$Id?>"/>
                  <input type="hidden" class="form-control" id="txtID" name="CreatedBy" value="<?=$CreatedBy?>"/>
                  <input type="hidden" class="form-control" id="txtID" name="CreatedDate" value="<?=$CreatedDate?>"/>
                  <p class="error"><?php echo $this->session->flashdata('GagalDeleteBiaya');?></p>
                    <div class="form-group">
                      <label>Nama Biaya</label>
                      <input type="text" class="form-control" id="txtDeskripsi" name="txtDeskripsi" placeholder="Nama Biaya"
                        value="<?=$deskripsi?>"/>
                    </div>
                </div>
                <!-- /.card-body -->

              </form>
                <div class="card-footer">
                  <button type="submit" class="btnSubmit btn btn-primary float-right" data-toggle="modal">
                      <?php 
                      $alertBoxSubmitMessage = "Apakah kamu yakin ingin menambahkan data berikut?";
                      echo $_GET['act'] 
                      ?>
                  </button>
                </div>
            </div>
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Biaya</h3>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dgMasterBiaya" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    
                    <th>ID</th>
                    <th>No</th>
                    <th>Nama Biaya</th>
                    <th>Created By</th>
                    <th>Created Date</th>
                    <th>Modified By</th>
                    <th>Modified Date</th>
                    <th>Act</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    if($biayaIsNotNull)
                    {
                      $rowNumber = 0;
                      $ct = count($biaya);
                      for ($i=0; $i< count($biaya); $i++)
                      { 
                        $rowNumber++;
                        $id = $biaya[$i]['Biaya_ID'];
                    ?>
                      
                      <tr>
                        <td><?=$biaya[$i]['Biaya_ID'];?></td>
                        <td><?=$rowNumber;?></td>
                        <td class="tdDeskripsi"><?=$biaya[$i]['Deskripsi'];?></td>
                        <td><?=$biaya[$i]['CreatedBy'];?></td>
                        <td><?=$biaya[$i]['CreatedDate'];?></td>
                        <td><?=$biaya[$i]['ModifiedBy'];?></td>
                        <td><?=$biaya[$i]['ModifiedDate'];?></td>
                        <td>
                          <div class="btn-group">
                            <a  href="<?php echo base_url()?>Biaya/GetID/<?=$id?>?modul=masterBiaya&act=Edit" 
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
  <?php 
    include dirname(__DIR__)."/../Common/AlertBoxDelete.php";
    include dirname(__DIR__)."/../Common/AlertBoxSubmit.php"; 
    $this->load->view('common/alert');
  ?>
</div>
<!-- ./wrapper -->
</body>
</html>




