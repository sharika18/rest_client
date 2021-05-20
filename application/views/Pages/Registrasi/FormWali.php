
<div class="card card-default">
    <div class="card-header">
    <h3 class="card-title">Pilih Data Wali</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group clearfix">
                    <div class="icheck-primary d-inline">
                        <input type="radio" id="ckBioDataAyah" name="ckBiodataWali" value="1">
                        <label for="ckBioDataAyah">
                            <small><em>wali adalah Ayah</em></small>
                        </label>
                    </div>
                    &nbsp;
                    <div class="icheck-primary d-inline">
                        <input type="radio" id="ckBioDataIbu" name="ckBiodataWali" value="2">
                        <label for="ckBioDataIbu">
                            <small><em>wali adalah Ibu</em></small>
                        </label>
                    </div>
                    &nbsp;
                    <div class="icheck-success d-inline">
                        <input type="radio" id="ckBioDataWali" name="ckBiodataWali" value="3" checked>
                        <label for="ckBioDataWali">
                            <small><em>wali selain Ayah/Ibu</em></small>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="divBiodataWali">
<div class="row">  
    <div class="col-sm-6">
        <div class="form-group">
        <label>Nama Lengkap*</label>
        <input type="text" id="inputNamaLengkapWali" name="inputNamaLengkapWali" required
            class="form-control" placeholder="nama lengkap Wali">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
        <label>Nomor Induk Kependudukan (NIK)*</label>
        <input type="number" onKeyPress="if(this.value.length==16) return false;" id="inputNIKWali" name="inputNIKWali"
            class="form-control" placeholder="NIK Wali" required>
        </div>
    </div>
</div>
<div class="row">  
    <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
        <label>Tempat Lahir*</label>
        <input type="text" id="inputTempatLahirWali" name="inputTempatLahirWali"
            class="form-control" placeholder="tempat lahir Wali" required>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
        <label>Tanggal Lahir*</label>
        <div class="input-group date" data-target-input="nearest">
            <input type="text" id="dateTanggalLahirWali" name="dateTanggalLahirWali"
                class="form-control datetimepicker-input" data-target="#dateTanggalLahirWali" required/>
            <div class="input-group-append" data-target="#dateTanggalLahirWali" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
        </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
        <label>Pendidikan Terakhir Wali</label>
        <select class="custom-select" id="selectPendidikanWali" name="selectPendidikanWali" required>
            <option value="">--Pilih Pendidikan Terakhir--</option>
            <?php
            foreach($pendidikanTerakhirList as $listPendidikanTerakhir)
            {
                $selected = "";
                if("" == $listPendidikanTerakhir)
                {
                $selected = 'selected = "selected"';
                }
                echo '
                
                <option value="'.$listPendidikanTerakhir. '"' .$selected. '>' .$listPendidikanTerakhir. '</option>
                ';
            }
            ?>
        </select>
        </div>
    </div>  
    <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
        <label>Pekerjaan Wali</label>
        <select class="custom-select" id="selectPekerjaanWali" name="selectPekerjaanWali" required>
            <option value="">--Pilih Pekerjaan--</option>
            <?php
            foreach($pekerjaanList as $listPekerjaan)
            {
                $selected = "";
                if("" == $listPekerjaan)
                {
                $selected = 'selected = "selected"';
                }
                echo '
                
                <option value="'.$listPekerjaan. '"' .$selected. '>' .$listPekerjaan. '</option>
                ';
            }
            ?>
        </select>
        </div>
    </div>  
</div>
<div class="row">
    <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
        <label>Jumlah Penghasilan Wali per Bulan*</label>
        <select class="custom-select" id="selectPenghasilanWali" name="selectPenghasilanWali" required>
            <option value="">--Pilih Jumlah Penghasilan--</option>
            <?php
            foreach($penghasilanList as $listPenghasilan)
            {
                $selected = "";
                if("" == $listPenghasilan)
                {
                $selected = 'selected = "selected"';
                }
                echo '
                
                <option value="'.$listPenghasilan. '"' .$selected. '>' .$listPenghasilan. '</option>
                ';
            }
            ?>
        </select>
        </div>
    </div>  
    <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
        <label>Nomor Handphone</label>
        <input type="text" id="inputNomorHPWali" name="inputNomorHPWali"
            class="form-control" placeholder="nomor handphone Wali" required>
        </div>
    </div>  
</div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
        <label>
            Alamat &nbsp;
        </label>
        <div class="icheck-primary d-inline">
            <input type="checkbox" id="ckAlamatWali" name="ckAlamatWali" required>
            <label for="ckAlamatWali">  <small>checklist jika <em>sama dengan alamat calon santri</em></small>
            </label>
        </div>
        <textarea type="text" class="form-control" rows="2" placeholder="alamat wali" id="inputAlamatWali" name="inputAlamatWali"></textarea>
        </div>
    </div>
</div>