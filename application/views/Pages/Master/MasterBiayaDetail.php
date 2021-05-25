<?php
      include dirname(__DIR__)."/../Values/ValueMasterBiayaDetail.php"; 
      include dirname(__DIR__)."/../Values/ListofValue.php";       
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

              <form action="<?php echo base_url()?>biayadetail/<?php echo $act?>" method="post" id="formSubmit">
                <div class="card-body">
                
                  <input type="hidden" class="form-control" id="txtID" name="txtID" value="<?=$Id?>"/>
                  <input type="hidden" class="form-control" id="CreatedBy" name="CreatedBy" value="<?=$CreatedBy?>"/>
                  <input type="hidden" class="form-control" id="CreatedDate" name="CreatedDate" value="<?=$CreatedDate?>"/>
                  <div class="row">
                    <div class="col-md-6">                                                    
                      <div class="form-group">
                          <label>Biaya :</label>
                          <select class="custom-select" id="txtBiaya" name="txtBiaya">
                          <option value="">Pilih Biaya</option>
                          <?php
                            for ($i=0; $i< count($biaya); $i++)
                            {
                              $value = $biaya[$i]['Deskripsi'];
                              $selected = "";
                              if($biaya_id == $biaya[$i]['Biaya_ID'])
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
                            if($gelombang == $listGelombang)
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
                          <input type="text" class="form-control" id="txtNominal" name="txtNominal" placeholder="Isi nominal biaya..."
                          value="<?=$nominal?>">
                          <div class="input-group-append" >
                            <span class="input-group-text">.00</span>
                          </div>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label>Start Date :</label>
                        <div class="input-group date" data-target-input="nearest" id="divStartDate">
                            <input type="text" class="form-control datetimepicker-input" data-target="#txtStartDate" id="txtStartDate" name="txtStartDate" value="<?=$startdate?>"/>
                            <div class="input-group-append" data-target="#txtStartDate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                      </div>             
                      
                      <div class="form-group">
                        <label>End Date :</label>
                        <div class="input-group date" data-target-input="nearest" id="divEndDate">
                            <input type="text" class="form-control datetimepicker-input" data-target="#txtEndDate" id="txtEndDate" name="txtEndDate" value="<?=$enddate?>"/>
                            <div class="input-group-append" data-target="#txtEndDate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Ketentuan :</label>
                    <textarea type="text" class="form-control" id="txtKetentuan" name="txtKetentuan" rows="3" placeholder="Ketentuan"><?=$ketentuan?></textarea>
                  </div>

                </div>
                <!-- /.card-body -->
              </form>
              <div class="card-footer">
                <button type="submit" class="btnSubmit btn btn-primary float-right" data-toggle="modal">
                      <?php echo $_GET['act'] ?>
                </button>
              </div>
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
                    <th>ID</th>
                    <th>No</th>
                    <th>Deskripsi</th>
                    <th>Gelombang</th>
                    <th>Nominal</th>
                    <th>Ketentuan</th>
                    <th>StartDate</th>
                    <th>EndDateDate</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    if($biayaDetailIsNotNull)
                    {
                      $rowNumber = 0;
                      for ($i=0; $i< count($biayaDetail); $i++)
                      { 
                        $rowNumber++;
                        $id = $biayaDetail[$i]['Biaya_Detail_ID'];
                    ?>
                      <tr>
                        <td><?=$biayaDetail[$i]['Biaya_Detail_ID'];?></td>
                        <td><?=$rowNumber;?></td>
                        <td class="tdDeskripsi"><?=$biayaDetail[$i]['Deskripsi'];?> - <?=$biayaDetail[$i]['Jenjang'];?></td>
                        <td><?=$biayaDetail[$i]['Gelombang'];?></td>
                        <td style="text-align:right"><?=number_format($biayaDetail[$i]['Nominal']);?></td>
                        <td><?=$biayaDetail[$i]['Ketentuan'];?></td>
                        <td><?=$biayaDetail[$i]['StartDate'];?></td>
                        <td><?=$biayaDetail[$i]['EndDate'];?></td>
                        <td>
                          <div class="btn-group">
                            <a  href="<?php echo base_url()?>BiayaDetail/GetID/<?=$id?>?modul=masterBiayaDetail&act=Edit" 
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

