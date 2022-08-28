<!-- FORM DATA -->
<div class="card card-info" id="divForm">    
    <div class="card-header">
        <h3 class="card-title">Status Kepegawaian</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="" method="post" id="formSubmitStatusKepegawaian">
        <div class="card-body">
        <div class="row">  
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Status Kepegawaian</label>
                    <input type="text" id="inputStatusKepegawaian" name="inputStatusKepegawaian"
                        class="form-control inputDeskripsiStatusKepegawaian" placeholder="Status Kepegawaian" required>
                </div>
            </div>
        </div>
        <input type="text" class="form-control" id="inputIDStatusKepegawaian" name="inputIDStatusKepegawaian"/>
        
        </div>
        <!-- /.card-body -->

    </form>
        <div class="card-footer">
        <button type="button" class="btn btn-default" id="btnCancelStatusKepegawaian">Cancel</button>
        <button type="submit" class="btnSubmitStatusKepegawian btn btn-info float-right" data-toggle="modal" id="btnSubmitStatusKepegawaian">
            <?php 
                $alertBoxSubmitMessage = "Apakah kamu yakin ingin menyimpan data berikut?";
            ?>
            Simpan
        </button>
        </div>
    </div>
<!-- FORM DATA -->
<!-- TABLE DATA -->
    <div class="card" id="divTableStatusKepegawaian">
        <div class="card-header">
        <h3 class="card-title">Data Status Kepegawaian</h3>
        </div>
        
        <!-- /.card-header -->
        <div class="card-body">
        <table id="dgMasterStatusKepegawaian" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Status Kepegawaian</th>
                <th>Action</th>
            </tr>
            </thead>
        </table>
        </div>
        <!-- /.card-body -->
    </div>
<!-- TABLE DATA -->