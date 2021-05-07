<?php
    include "Master/Values/ListofValue.php";  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/dist/css/adminlte.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/plugins/daterangepicker/daterangepicker.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/plugins/bs-stepper/css/bs-stepper.min.css">
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header" style="text-align: center;  background-color: #007bff; color: #ffffff;">
    <div class="container-fluid">
      <div class="row mb-2" >
        <div class="col-sm-12">
          <h4>Formulir Pendaftaran Santri Baru <p> 
          Pesantren Modern Ar-Risalah Lubuklinggau Tahun Pelajaran 
          <?php
          echo date("Y") ."/";
          echo date("Y")+1 . "<br>";
          ?>
          </h4>
        </div>
      </div>
      
      
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <label></label>
            <div class="input-group">
              <div class="input-group-append">
                <span class="input-group-text">Formulir</span>
              </div>
              <select class="custom-select" id="selectJenjang" name="selectJenjang">
                <option value="0">Pilih Jenjang</option>
                <?php
                  foreach($jenjangList as $listJenjang)
                  {
                    $selected = "";
                    if($jenjang == $listJenjang)
                    {
                      $selected = 'selected = "selected"';
                    }
                    echo '
                    
                      <option value="'.$listJenjang. '"' .$selected. '>' .$listJenjang. '</option>
                    ';
                  }
                ?>

              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title" style="font-size:15px">
                <b>Formulir akan diproses jika sudah melakukan pembayaran uang pendaftaran sebesar Rp 225.000,-</b> ke rekening Pesantren Modern Ar Risalah Bank BNI Syariah An. Yayasan Pesantren Modern Ar Risalah Lubuklinggau No. Rek 1511111169.
                Jumlah Uang Pangkal yang harus dibayar sebesar Rp 8.000.000,- jika pembayaran dilakukan di Bulan April.
                Jumlah Uang Pangkal yang harus dibayar sebesar Rp  9.000.000,- jika pembayaran dilakukan setelah bulan April.
                Info Lebih Lanjut Hubungi Panitia PSB di 0812-7875-8019.
              </h3>
            </div>
            <div class="card-body p-0">
              <div class="bs-stepper">
                <div class="bs-stepper-header" role="tablist">
                  <!-- your steps here -->
                  <div class="step" data-target="#biodata-santri">
                    <button type="button" class="step-trigger" role="tab" aria-controls="biodata-santri" id="biodata-santri-trigger">
                      <span class="bs-stepper-circle">1</span>
                      <span class="bs-stepper-label">Biodata Santri</span>
                    </button>
                  </div>
                  <div class="line"></div>
                  <div class="step" data-target="#biodata-ayah">
                    <button type="button" class="step-trigger" role="tab" aria-controls="biodata-ayah" id="biodata-ayah-trigger">
                      <span class="bs-stepper-circle">2</span>
                      <span class="bs-stepper-label">Biodata Ayah</span>
                    </button>
                  </div>
                  <div class="line"></div>
                  <div class="step" data-target="#biodata-ibu">
                    <button type="button" class="step-trigger" role="tab" aria-controls="biodata-ibu" id="biodata-ibu-trigger">
                      <span class="bs-stepper-circle">3</span>
                      <span class="bs-stepper-label">Biodata Ibu</span>
                    </button>
                  </div>
                  <div class="line"></div>
                  <div class="step" data-target="#biodata-wali">
                    <button type="button" class="step-trigger" role="tab" aria-controls="biodata-wali" id="biodata-wali-trigger">
                      <span class="bs-stepper-circle">4</span>
                      <span class="bs-stepper-label">Biodata Wali</span>
                    </button>
                  </div>
                </div>
                <div class="bs-stepper-content">
                  <!-- your steps content here -->
                  <div id="biodata-santri" class="content" role="tabpanel" aria-labelledby="biodata-santri-trigger">
                    <form id="formBiodataSantri">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="exampleInputFile">Bukti Pembayaran(File berbentuk Gambar/Photo/PDF)</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr>
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
                            <label>Tempat Lahir*</label>
                            <input type="text" class="form-control" placeholder="tempat lahir calon santri">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Tanggal Lahir*</label>
                            <div class="input-group date" id="dateTanggalLahirSantri" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#dateTanggalLahirSantri"/>
                                <div class="input-group-append" data-target="#dateTanggalLahirSantri" data-toggle="datetimepicker">
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
                                    <input type="radio" id="radioPrimary1" name="r1" checked>
                                    <label for="radioPrimary1">Laki-laki </label>
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary2" name="r1">
                                    <label for="radioPrimary2">Perempuan</label>
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
                          <!-- text input -->
                          <div class="form-group">
                            <label>Pilih Ukuran Seragam (Jilbab Hanya Untuk Perempuan)</label>
                            <div class="row">  
                              <div class="col-sm-4">
                                <div class="input-group">
                                  <div class="input-group-append">
                                    <span class="input-group-text">Baju</span>
                                  </div>
                                  <select class="custom-select">
                                    <option>--Pilih Ukuran Baju--</option>
                                    <option>XS</option>
                                    <option>S</option>
                                    <option>M</option>
                                    <option>L</option>
                                    <option>XL</option>
                                    <option>XXL</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-sm-4">
                                <div class="input-group">
                                  <div class="input-group-append">
                                    <span class="input-group-text">Celana</span>
                                  </div>
                                  <select class="custom-select">
                                    <option>--Pilih Ukuran Celana--</option>
                                    <option>XS</option>
                                    <option>S</option>
                                    <option>M</option>
                                    <option>L</option>
                                    <option>XL</option>
                                    <option>XXL</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-sm-4">
                                <div class="input-group">
                                  <div class="input-group-append">
                                    <span class="input-group-text">Jilbab</span>
                                  </div>
                                  <select class="custom-select">
                                    <option>--Pilih Ukuran Jilbab--</option>
                                    <option>XS</option>
                                    <option>S</option>
                                    <option>M</option>
                                    <option>L</option>
                                    <option>XL</option>
                                    <option>XXL</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>  
                      </div>
                    </form>
                      <!-- input states -->
                    <button class="btn btn-primary float-right" onclick="stepper.next()">Next</button>
                  </div>
                  <div id="biodata-ayah" class="content" role="tabpanel" aria-labelledby="biodata-ayah-trigger">
                    <form id="formBiodataAyah">
                      <div class="row">  
                        <div class="col-sm-6">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Nama Lengkap*</label>
                            <input type="text" class="form-control" placeholder="nama lengkap ayah">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Nomor Induk Kependudukan (NIK)*</label>
                            <input type="number" onKeyPress="if(this.value.length==16) return false;" class="form-control" placeholder="NIK ayah">
                          </div>
                        </div>
                      </div>
                      <div class="row">  
                        <div class="col-sm-6">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Tempat Lahir*</label>
                            <input type="text" class="form-control" placeholder="tempat lahir ayah">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Tanggal Lahir*</label>
                            <div class="input-group date" id="dateTanggalLahirAyah" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#dateTanggalLahirAyah"/>
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
                            <select class="custom-select">
                              <option>--Pilih Pendidikan Terakhir--</option>
                              <option>SD</option>
                              <option>SMP</option>
                              <option>SMA</option>
                              <option>S1</option>
                              <option>S2</option>
                              <option>S3</option>
                              <option>Tidak tamat SD</option>
                            </select>
                          </div>
                        </div>  
                        <div class="col-sm-6">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Pekerjaan Ayah</label>
                            <select class="custom-select">
                              <option>--Pilih Pekerjaan--</option>
                              <option>Tidak Bekerja</option>
                              <option>Wiraswasta</option>
                              <option>PNS/TNI/POLRI</option>
                              <option>Buruh Harian Lepas</option>
                              <option>Pegawai BUMN/BUMD</option>
                              <option>Karyawan Swasta</option>
                              <option>Pedagang Besar</option>
                              <option>Pedagang Kecil</option>
                              <option>Lainnya</option>
                            </select>
                          </div>
                        </div>  
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Jumlah Penghasilan Ayah per Bulan*</label>
                            <select class="custom-select">
                              <option>--Pilih Jumlah Penghasilan--</option>
                              <option>Rp 0 s/d Rp 1.000.000</option>
                              <option>Rp 1.000.000 s/d Rp 2.000.000</option>
                              <option>Rp 2.000.000 s/d Rp 3.000.000</option>
                              <option>Rp 3.000.000 s/d Rp 4.000.000</option>
                              <option>Rp 4.000.000 s/d Rp 5.000.000</option>
                              <option>Lebih dari Rp 5.000.000</option>
                            </select>
                          </div>
                        </div>  
                        <div class="col-sm-6">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Nomor Handphone</label>
                            <input type="text" class="form-control" placeholder="nomor handphone ayah">
                          </div>
                        </div>  
                      </div>
                    </form>
                    <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                    <button class="btn btn-primary float-right" onclick="stepper.next()">Next</button>
                  </div>
                  <div id="biodata-ibu" class="content" role="tabpanel" aria-labelledby="biodata-ibu-trigger">
                    <form id="formBiodataIbu">
                      <div class="row">  
                        <div class="col-sm-6">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Nama Lengkap*</label>
                            <input type="text" class="form-control" placeholder="nama lengkap ibu">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Nomor Induk Kependudukan (NIK)*</label>
                            <input type="number" onKeyPress="if(this.value.length==16) return false;"  class="form-control" placeholder="NIK ibu">
                          </div>
                        </div>
                      </div>
                      <div class="row">  
                        <div class="col-sm-6">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Tempat Lahir*</label>
                            <input type="text" class="form-control" placeholder="tempat lahir ibu">
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
                            <select class="custom-select">
                              <option>--Pilih Pendidikan Terakhir--</option>
                              <option>SD</option>
                              <option>SMP</option>
                              <option>SMA</option>
                              <option>S1</option>
                              <option>S2</option>
                              <option>S3</option>
                              <option>Tidak tamat SD</option>
                            </select>
                          </div>
                        </div>  
                        <div class="col-sm-6">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Pekerjaan Ibu</label>
                            <select class="custom-select">
                              <option>--Pilih Pekerjaan--</option>
                              <option>Tidak Bekerja</option>
                              <option>Wiraswasta</option>
                              <option>PNS/TNI/POLRI</option>
                              <option>Buruh Harian Lepas</option>
                              <option>Pegawai BUMN/BUMD</option>
                              <option>Karyawan Swasta</option>
                              <option>Pedagang Besar</option>
                              <option>Pedagang Kecil</option>
                              <option>Lainnya</option>
                            </select>
                          </div>
                        </div>  
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Jumlah Penghasilan Ibu per Bulan*</label>
                            <select class="custom-select">
                              <option>--Pilih Jumlah Penghasilan--</option>
                              <option>Rp 0 s/d Rp 1.000.000</option>
                              <option>Rp 1.000.000 s/d Rp 2.000.000</option>
                              <option>Rp 2.000.000 s/d Rp 3.000.000</option>
                              <option>Rp 3.000.000 s/d Rp 4.000.000</option>
                              <option>Rp 4.000.000 s/d Rp 5.000.000</option>
                              <option>Lebih dari Rp 5.000.000</option>
                            </select>
                          </div>
                        </div>  
                        <div class="col-sm-6">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Nomor Handphone</label>
                            <input type="text" class="form-control" placeholder="nomor handphone ibu">
                          </div>
                        </div>  
                      </div>
                    </form>
                    <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                    <button class="btn btn-primary float-right" onclick="stepper.next()">Next</button>
                  </div>
                  <div id="biodata-wali" class="content" role="tabpanel" aria-labelledby="biodata-wali-trigger">
                    <form id="formBiodataWali">
                      <div class="row">  
                        <div class="col-sm-6">
                          <!-- text input -->
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
                          <!-- text input -->
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
                          <!-- text input -->
                          <div class="form-group">
                            <label>Pendidikan Terakhir Wali</label>
                            <select class="custom-select">
                              <option>--Pilih Pendidikan Terakhir--</option>
                              <option>SD</option>
                              <option>SMP</option>
                              <option>SMA</option>
                              <option>S1</option>
                              <option>S2</option>
                              <option>S3</option>
                              <option>Tidak tamat SD</option>
                            </select>
                          </div>
                        </div>  
                        <div class="col-sm-6">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Pekerjaan Wali</label>
                            <select class="custom-select">
                              <option>--Pilih Pekerjaan--</option>
                              <option>Tidak Bekerja</option>
                              <option>Wiraswasta</option>
                              <option>PNS/TNI/POLRI</option>
                              <option>Buruh Harian Lepas</option>
                              <option>Pegawai BUMN/BUMD</option>
                              <option>Karyawan Swasta</option>
                              <option>Pedagang Besar</option>
                              <option>Pedagang Kecil</option>
                              <option>Lainnya</option>
                            </select>
                          </div>
                        </div>  
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Jumlah Penghasilan Wali per Bulan*</label>
                            <select class="custom-select">
                              <option>--Pilih Jumlah Penghasilan--</option>
                              <option>Rp 0 s/d Rp 1.000.000</option>
                              <option>Rp 1.000.000 s/d Rp 2.000.000</option>
                              <option>Rp 2.000.000 s/d Rp 3.000.000</option>
                              <option>Rp 3.000.000 s/d Rp 4.000.000</option>
                              <option>Rp 4.000.000 s/d Rp 5.000.000</option>
                              <option>Lebih dari Rp 5.000.000</option>
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
                    </form>
                    <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              Visit <a href="http://arrisalahlubuklinggau.com/" target="_blank">Pesantren Modern Arrisalah Website</a> for more information.
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div>
  </section>
</div>
<!-- /.register-box -->


<?php
  include "Library/script_library.php";
  include "Library/script_custom.php";
  include "Script/RegisterScript.php";
?>
</body>
</html>
