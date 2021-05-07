<font color="orange">

</font>
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Master Biaya Detail</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?modul=home">Home</a></li>
            <li class="breadcrumb-item active">Master Biaya Detail</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Data Biaya Detail</h3>
                </div>
                <div class="card">
                    <table border="1">
                        <tr>
                            <th>id</th>
                            <th>nrp</th>
                            <th>nama</th>
                            <th>email</th>
                            <th>jurusan</th>
                        </tr>	
                        <?php for ($i=0; $i< count($mahasiswa1); $i++)
                        { ?>
                            <tr>
                                <td><?=$mahasiswa1[$i]['id'];?></td>
                                <td><?=$mahasiswa1[$i]['nrp'];?></td>
                                <td><?=$mahasiswa1[$i]['nama'];?></td>
                                <td><?=$mahasiswa1[$i]['email'];?></td>
                                <td><?=$mahasiswa1[$i]['jurusan'];?></td>
                            </tr>
                        <?php
                        } 
                        ?>

                        <?php
                        //echo print_r($query);
                        //echo print_r($mahasiswa2);
                        ?>
                    </table>
                </div>
            </div>
          </div>
        </div>
      </div>
</section>

<!-- <a href="http://localhost/rest_ci_client/index.php/kontak/create">+ Tambah data<a> -->