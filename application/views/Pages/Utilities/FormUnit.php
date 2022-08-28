<!-- FORM DATA -->
<div class="card card-info" id="divForm">    
    <div class="card-header">
        <h3 class="card-title">Unit</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="" method="post" id="formSubmitUnit">
        <div class="card-body">
        <div class="row">  
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Nama Unit</label>
                    <input type="text" id="inputUnit" name="inputUnit"
                        class="form-control inputDeskripsiUnit" placeholder="Nama Unit" required>
                </div>
            </div>
        </div>
        <input type="text" class="form-control" id="inputIDUnit" name="inputID"/>
        
        </div>
        <!-- /.card-body -->

    </form>
        <div class="card-footer">
        <button type="button" class="btn btn-default" id="btnCancelUnit">Cancel</button>
        <button type="submit" class="btnSubmit btn btn-info float-right" data-toggle="modal" id="btnSubmitUnit">
            <?php 
                $alertBoxSubmitMessage = "Apakah kamu yakin ingin menyimpan data berikut?";
            ?>
            Simpan
        </button>
        </div>
    </div>
<!-- FORM DATA -->
<!-- TABLE DATA -->
    <div class="card" id="divTableUnit">
        <div class="card-header">
        <h3 class="card-title">Data Karyawan</h3>
        </div>
        
        <!-- /.card-header -->
        <div class="card-body">
        <table id="dgMasterUnit" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Unit</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Unit</td>
                    <td>Action</td>
                </tr>
                <tr>
                    <td>Unit</td>
                    <td>Action</td>
                </tr>
                <tr>
                    <td>Unit</td>
                    <td>Action</td>
                </tr>
                <tr>
                    <td>Unit</td>
                    <td>Action</td>
                </tr>
                <tr>
                    <td>Unit</td>
                    <td>Action</td>
                </tr>
            </tbody>
        </table>
        </div>
        <!-- /.card-body -->
    </div>
<!-- TABLE DATA -->