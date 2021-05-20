<div class="row">  
    <div class="col-sm-6">
        <div class="form-group">
        <label>Nama Lengkap*</label>
        <input type="text" id="inputNamaLengkapAyah" name="inputNamaLengkapAyah" required
            class="form-control" placeholder="nama lengkap ayah">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
        <label>Nomor Induk Kependudukan (NIK)*</label>
        <input type="number" onKeyPress="if(this.value.length==16) return false;" id="inputNIKAyah" name="inputNIKAyah"
            class="form-control" placeholder="NIK ayah" required>
        </div>
    </div>
</div>
<div class="row">  
    <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
        <label>Tempat Lahir*</label>
        <input type="text" id="inputTempatLahirAyah" name="inputTempatLahirAyah"
            class="form-control" placeholder="tempat lahir ayah" required>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
        <label>Tanggal Lahir*</label>
        <div class="input-group date" data-target-input="nearest">
            <input type="text" id="dateTanggalLahirAyah" name="dateTanggalLahirAyah"
                class="form-control datetimepicker-input" data-target="#dateTanggalLahirAyah" required/>
            <div class="input-group-append" data-target="#dateTanggalLahirAyah" data-toggle="datetimepicker">
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
        <label>Pendidikan Terakhir Ayah</label>
        <select class="custom-select" id="selectPendidikanAyah" name="selectPendidikanAyah" required>
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
        <label>Pekerjaan Ayah</label>
        <select class="custom-select" id="selectPekerjaanAyah" name="selectPekerjaanAyah" required>
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
        <label>Jumlah Penghasilan Ayah per Bulan*</label>
        <select class="custom-select" id="selectPenghasilanAyah" name="selectPenghasilanAyah" required>
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
        <input type="text" id="inputNomorHPAyah" name="inputNomorHPAyah"
            class="form-control" placeholder="nomor handphone ayah" required>
        </div>
    </div>  
</div>