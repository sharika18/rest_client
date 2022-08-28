<!-- FORM DATA -->
<div class="card card-info" id="divForm">    
    <div class="card-header">
        <h3 class="card-title">Jabatan</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="" method="post" id="formSubmitJabatan">
        <div class="card-body">
        <div class="row">  
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Nama Jabatan</label>
                    <input type="text" id="inputJabatan" name="inputJabatan"
                        class="form-control inputDeskripsiJabatan" placeholder="Nama Jabatan" required>
                </div>
            </div>
        </div>
        <input type="text" class="form-control" id="inputIDJabatan" name="inputIDJabatan"/>
        
        </div>
        <!-- /.card-body -->

    </form>
        <div class="card-footer">
        <button type="button" class="btn btn-default" id="btnCancelJabatan">Cancel</button>
        <button type="submit" class="btnSubmit btn btn-info float-right" data-toggle="modal" id="btnSubmitJabatan">
            <?php 
                $alertBoxSubmitMessage = "Apakah kamu yakin ingin menyimpan data berikut?";
            ?>
            Simpan
        </button>
        </div>
    </div>
<!-- FORM DATA -->
<!-- TABLE DATA -->
    <div class="card card-primary card-outline" id="divTableJabatan">
        <div class="card-header">
        <h3 class="card-title">Data Jabatan</h3>
        </div>
        
        <!-- /.card-header -->
        <div class="card-body">
        <table id="dgMasterJabatan" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Jabatan</th>
                <th>Action</th>
            </tr>
            </thead>
        </table>
        </div>
        <!-- /.card-body -->
    </div>
<!-- TABLE DATA -->