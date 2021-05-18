<div class="row">  
    <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
        <label>Nama Lengkap Calon Santri*</label>
        <input type="text" id="inputNamaLengkapSantri" name="inputNamaLengkapSantri" 
        class="form-control" placeholder="nama lengkap calon santri">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
        <label>Nama Panggilan*</label>
        <input type="text" class="form-control" placeholder="nama panggilan calon santri">
        </div>
    </div>
    </div>
    <div class="row">  
    <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
        <label>Tempat Lahir*</label>
        <input type="text" class="form-control" placeholder="tempat lahir calon santri">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
        <label>Tanggal Lahir :</label>
        <div class="input-group date" data-target-input="nearest">
            <input type="text" class="form-control datetimepicker-input" data-target="#dateTanggalLahirSantri" id="dateTanggalLahirSantri" name="dateTanggalLahirSantri"/>
            <div class="input-group-append" data-target="#dateTanggalLahirSantri" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="row">  
    <div class="col-sm-6">
        <div class="form-group">
        <label>Nomor Induk Kependudukan (NIK)*</label>
        <input type="number"  onKeyPress="if(this.value.length==16) return false;" class="form-control" placeholder="NIK calon santri">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
        <label>Jenis Kelamin*</label>
        <div class="form-group clearfix">
            <div class="row">
            <div class="col-sm-6">
                <div class="icheck-primary d-inline">
                <input type="radio" id="radioLakilaki" name="radioJenisKelaminSantri" value="1" checked>
                <label for="radioLakilaki">Laki-laki </label>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="icheck-primary d-inline">
                <input type="radio" id="radioPerempuan" value="2" name="radioJenisKelaminSantri">
                <label for="radioPerempuan">Perempuan</label>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="row">
    <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
        <label>Anak Ke dari Berapa Bersaudara*</label>
        <div class="row">  
            <div class="col-sm-6">
            <div class="input-group">
                <div class="input-group-append">
                <span class="input-group-text">Anak ke</span>
                </div>
                <input type="number" class="form-control" placeholder="anak ke">
            </div>
            </div>
            <div class="col-sm-6">
            <div class="input-group">
                <div class="input-group-append">
                <span class="input-group-text">dari</span>
                </div>
                <input type="number" class="form-control" placeholder="jumlah saudara">
                <div class="input-group-append">
                <span class="input-group-text">Bersaudara</span>
                </div>
            </div>
            </div>
        </div>
        
        </div>
    </div>  
    <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
        <label>Tinggi dan Berat Badan*</label>
        <div class="row">  
            <div class="col-sm-6">
            <div class="input-group">
                <input type="number" class="form-control" placeholder="tinggi badan">
                <div class="input-group-append">
                <span class="input-group-text">CM</span>
                </div>
            </div>
            </div>
            <div class="col-sm-6">
            <div class="input-group">
                <input type="number" class="form-control" placeholder="berat badan">
                <div class="input-group-append">
                <span class="input-group-text">KG</span>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="row">
    <div class="col-sm-12">
        <div class="form-group">
        <label>Alamat</label>
        <textarea class="form-control" rows="2" placeholder="alamat calon santri"></textarea>
        </div>
    </div>
    </div>
    <div class="row">  
    <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
        <label>Asal Sekolah</label>
        <input type="text" id="inputAsalSekolah" name="inputAsalSekolah" 
        class="form-control" placeholder="asal sekolah calon santri">
        </div>
    </div>
    </div>
    <div class="row">
    <div class="col-sm-12">
        <!-- text input -->
        <div class="form-group">
        <label>Ukuran Seragam</label>
        <div class="row">  
            <div class="col-sm-6">
            <div class="input-group">
                <div class="input-group-append">
                <span class="input-group-text">Baju</span>
                </div>
                <select class="custom-select" id="selectUkuranBaju" name="selectUkuranBaju">
                <option value="0">--Pilih Ukuran Baju--</option>
                <?php
                    foreach($ukuranBajuCelanaList as $listUkuranBajuCelana)
                    {
                    $selected = "";
                    if("" == $listUkuranBajuCelana)
                    {
                        $selected = 'selected = "selected"';
                    }
                    echo '
                    
                        <option value="'.$listUkuranBajuCelana. '"' .$selected. '>' .$listUkuranBajuCelana. '</option>
                    ';
                    }
                ?>
                </select>
            </div>
            </div>
        </div>
        </div>
    </div>  
    </div>
    <div class="row">
    <div class="col-sm-12">
        <div class="form-group">
        <div class="row">  
            <div class="col-sm-6">
            <div class="input-group">
                <div class="input-group-append">
                <span class="input-group-text">Celana</span>
                </div>
                <select class="custom-select" id="selectUkuranCelana" name="selectUkuranCelana">
                <option value="0">--Pilih Ukuran Baju--</option>
                <?php
                    foreach($ukuranBajuCelanaList as $listUkuranBajuCelana)
                    {
                    $selected = "";
                    if("" == $listUkuranBajuCelana)
                    {
                        $selected = 'selected = "selected"';
                    }
                    echo '
                    
                        <option value="'.$listUkuranBajuCelana. '"' .$selected. '>' .$listUkuranBajuCelana. '</option>
                    ';
                    }
                ?>
                </select>
            </div>
            </div>
        </div>
        </div>
    </div>  
    </div>
    <div class="row">
    <div class="col-sm-12">
        <div class="form-group">
        <div class="row">  
            <div class="col-sm-6">
            <div class="input-group" id="divUkuranJilbab">
                <div class="input-group-append">
                <span class="input-group-text">Jilbab</span>
                </div>
                <select class="custom-select" id="selectUkuranJilbab" name="selectUkuranJilbab">
                <option value="0">--Pilih Ukuran Baju--</option>
                <?php
                    foreach($ukuranJilbabList as $listUkuranJilbab)
                    {
                    $selected = "";
                    if("" == $listUkuranJilbab)
                    {
                        $selected = 'selected = "selected"';
                    }
                    echo '
                    
                        <option value="'.$listUkuranJilbab. '"' .$selected. '>' .$listUkuranJilbab. '</option>
                    ';
                    }
                ?>
                </select>
            </div>
            </div>
        </div>
        </div>
    </div>  
    </div>