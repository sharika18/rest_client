<div class="row">  
    <div class="col-sm-6">
        <div class="form-group">
        <label>Nama Lengkap*</label>
        <input type="text" id="inputNamaLengkapIbu" name="inputNamaLengkapIbu"
            class="form-control" placeholder="nama lengkap Ibu">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
        <label>Nomor Induk Kependudukan (NIK)*</label>
        <input type="number" onKeyPress="if(this.value.length==16) return false;" id="inputNIKIbu" name="inputNIKIbu"
            class="form-control" placeholder="NIK Ibu">
        </div>
    </div>
</div>
<div class="row">  
    <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
        <label>Tempat Lahir*</label>
        <input type="text" id="inputTempatLahirIbu" name="inputTempatLahirIbu"
            class="form-control" placeholder="tempat lahir Ibu">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
        <label>Tanggal Lahir*</label>
        <div class="input-group date" id="dateTanggalLahirIbu" data-target-input="nearest">
            <input type="text" class="form-control datetimepicker-input" data-target="#dateTanggalLahirIbu"/>
            <div class="input-group-append" data-target="#dateTanggalLahirIbu" data-toggle="datetimepicker">
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
        <label>Pendidikan Terakhir Ibu</label>
        <select class="custom-select" id="selectPendidikanIbu" name="selectPendidikanIbu">
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
        <label>Pekerjaan Ibu</label>
        <select class="custom-select" id="selectPekerjaanIbu" name="selectPekerjaanIbu">
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
        <label>Jumlah Penghasilan Ibu per Bulan*</label>
        <select class="custom-select" id="selectPenghasilanIbu" name="selectPenghasilanIbu">
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
        <input type="text" id="inputNomorHPIbu" name="inputNomorHPIbu"
            class="form-control" placeholder="nomor handphone Ibu">
        </div>
    </div>  
</div>