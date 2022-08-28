<!-- FORM DATA -->
<div class="card card-info" id="divForm">    
    <div class="card-header">
        <h3 class="card-title">Pendidikan</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="" method="post" id="formSubmitPendidikan">
        <div class="card-body">
        <div class="row">  
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Nama Pendidikan</label>
                    <input type="text" id="inputPendidikan" name="inputPendidikan"
                        class="form-control inputDeskripsiPendidikan" placeholder="Nama Pendidikan" required>
                </div>
            </div>
        </div>
        <input type="text" class="form-control" id="inputIDPendidikan" name="inputID"/>
        
        </div>
        <!-- /.card-body -->

    </form>
        <div class="card-footer">
        <button type="button" class="btn btn-default" id="btnCancelPendidikan">Cancel</button>
        <button type="submit" class="btnSubmit btn btn-info float-right" data-toggle="modal" id="btnSubmitPendidikan">
            <?php 
                $alertBoxSubmitMessage = "Apakah kamu yakin ingin menyimpan data berikut?";
            ?>
            Simpan
        </button>
        </div>
    </div>
<!-- FORM DATA -->
<!-- TABLE DATA -->
    <div class="card" id="divTablePendidikan">
        <div class="card-header">
        <h3 class="card-title">Data Karyawan</h3>
        </div>
        
        <!-- /.card-header -->
        <div class="card-body">
        <table id="dgMasterPendidikan" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Pendidikan</th>
                <th>Action</th>
            </tr>
            </thead>
        </table>
        </div>
        <!-- /.card-body -->
    </div>
<!-- TABLE DATA -->