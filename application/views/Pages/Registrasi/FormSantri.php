<div class="row">  
    <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
        <label>Nama Lengkap Calon Santri*</label>
        <input type="text" id="inputNamaLengkapSantri" name="inputNamaLengkapSantri" 
            class="form-control" placeholder="nama lengkap calon santri" required>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
        <label>Nama Panggilan*</label>
        <input type="text" id="inputNamaPanggilan" name="inputNamaPanggilan"
            class="form-control" placeholder="nama panggilan calon santri" required>
        </div>
    </div>
</div>
<div class="row">  
    <div class="col-sm-6">
        <div class="form-group">
            <label>Jenis Kelamin*</label>
            <div class="form-group clearfix">
                <div class="row">
                <div class="col-sm-6">
                    <div class="icheck-success d-inline">
                    <input type="radio" id="radioLakilaki" name="radioJenisKelaminSantri" value="L" checked>
                    <label for="radioLakilaki">Laki-laki </label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="icheck-success d-inline">
                    <input type="radio" id="radioPerempuan" value="P" name="radioJenisKelaminSantri" required>
                    <label for="radioPerempuan">Perempuan</label>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <!-- text input -->
        <div class="form-group">
        <label>Tempat Lahir*</label>
        <input type="text" id="inputTempatLahirSantri" name="inputTempatLahirSantri"
            class="form-control" placeholder="tempat lahir calon santri" required>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
        <label>Tanggal Lahir :</label>
        <div class="input-group date" data-target-input="nearest">
            <input type="text" id="dateTanggalSantri" name="dateTanggalLahirSantri"
                class="form-control datetimepicker-input" data-target="#dateTanggalSantri"  required/>
            <div class="input-group-append" data-target="#dateTanggalSantri" data-toggle="datetimepicker">
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
        <input type="number"  id="inputNIKSantri" name="inputNIKSantri"
            onKeyPress="if(this.value.length==16) return false;" class="form-control" placeholder="NIK calon santri" required>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
        <label>Asal Sekolah</label>
        <input type="text" id="inputAsalSekolah" name="inputAsalSekolah" 
            class="form-control" placeholder="asal sekolah calon santri">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <div class="form-group">
        <label>Anak Ke*</label>
            <div class="input-group">
                <div class="input-group-append">
                <span class="input-group-text">Anak ke</span>
                </div>
                <input type="number" id="inputAnakKe" name="inputAnakKe"
                    class="form-control" placeholder="anak ke" required>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
        <label>Jumlah Saudara*</label>
            <div class="input-group">
                <div class="input-group-append">
                <span class="input-group-text">dari</span>
                </div>
                <input type="number" id="inputDariBerapaSaudara" name="inputDariBerapaSaudara"
                    class="form-control" placeholder="berapa" required>
                <div class="input-group-append">
                <span class="input-group-text">Saudara</span>
                </div>
            </div>
        </div>
    </div> 
    <div class="col-sm-3">
        <div class="form-group">
        <label>Tinggi Badan*</label>
            <div class="input-group">
                <input type="number" id="inputTinggiBadan" name="inputTinggiBadan"
                    class="form-control" placeholder="tinggi badan" required>
                <div class="input-group-append">
                <span class="input-group-text">CM</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
        <label>Berat Badan*</label>
            <div class="input-group">
                <input type="number" id="inputBeratBadan" name="inputBeratBadan"
                    class="form-control" placeholder="berat badan" required>
                <div class="input-group-append">
                <span class="input-group-text">KG</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
        <label>Alamat</label>
        <textarea type="text" id="inputAlamatSantri" name="inputAlamatSantri"
            class="form-control" rows="2" placeholder="alamat calon santri" required></textarea>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
        <label>Ukuran Seragam</label>
        <div class="row">  
            <div class="col-sm-6">
            <div class="input-group">
                <div class="input-group-append">
                <span class="input-group-text">Baju</span>
                </div>
                <select class="custom-select" id="selectUkuranBaju" name="selectUkuranBaju" required>
                <option value="">--Pilih Ukuran Baju--</option>
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
                <select class="custom-select" id="selectUkuranCelana" name="selectUkuranCelana" required>
                <option value="">--Pilih Ukuran Baju--</option>
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
                <select class="custom-select" id="selectUkuranJilbab" name="selectUkuranJilbab" required>
                <option value="">--Pilih Ukuran Baju--</option>
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