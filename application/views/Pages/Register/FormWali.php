<div class="row">  
    <div class="col-sm-6">
        <div class="form-group">
        <label>Nama Lengkap*</label>
        <input type="text" class="form-control" placeholder="nama lengkap wali">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
        <label>Nomor Induk Kependudukan (NIK)*</label>
        <input type="number"  onKeyPress="if(this.value.length==16) return false;" class="form-control" placeholder="NIK wali">
        </div>
    </div>
</div>
<div class="row">  
    <div class="col-sm-6">
        <div class="form-group">
        <label>Tempat Lahir*</label>
        <input type="text" class="form-control" placeholder="tempat lahir wali">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
        <label>Tanggal Lahir*</label>
        <div class="input-group date" id="dateTanggalLahirWali" data-target-input="nearest">
            <input type="text" class="form-control datetimepicker-input" data-target="#dateTanggalLahirWali"/>
            <div class="input-group-append" data-target="#dateTanggalLahirWali" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
        </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
        <label>Pendidikan Terakhir Wali</label>
        <select class="custom-select">
            <option value="0">--Pilih Pendidikan Terakhir--</option>
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
        <select class="custom-select">
            <option value="0">--Pilih Pekerjaan--</option>
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
        <div class="form-group">
        <label>Jumlah Penghasilan Wali per Bulan*</label>
        <select class="custom-select">
            <option value="0">--Pilih Jumlah Penghasilan--</option>
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
        <input type="text" class="form-control" placeholder="nomor handphone wali">
        </div>
    </div>  
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
        <label>Alamat</label>
        <textarea class="form-control" rows="2" placeholder="alamat wali"></textarea>
        </div>
    </div>
</div>