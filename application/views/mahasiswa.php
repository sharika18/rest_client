<font color="orange">

</font>

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

<table border="1">
    <tr>
        <th>id</th>
        <th>nrp</th>
        <th>nama</th>
        <th>email</th>
        <th>jurusan</th>
	</tr>	
	<?php for ($i=0; $i< count($mahasiswa2); $i++)
	{ ?>
		<tr>
              <td><?=$mahasiswa2[$i]['id'];?></td>
              <td><?=$mahasiswa2[$i]['nrp'];?></td>
              <td><?=$mahasiswa2[$i]['nama'];?></td>
              <td><?=$mahasiswa2[$i]['email'];?></td>
              <td><?=$mahasiswa2[$i]['jurusan'];?></td>
		</tr>
	<?php
	} 
    ?>
</table>

<select class="custom-select">
    <option>--Pilih Formulir--</option>
    <?php for ($i=0; $i< count($mahasiswa2); $i++)
    { 
    ?>
        <option value="<?=$mahasiswa2[$i]['id'];?>"><?=$mahasiswa2[$i]['nama'];?></option>
    <?php
    } 
    ?>
</select>

<table border="1">
    <tr>
        <th>id</th>
        <th>desx</th>
        <th>jenj</th>
        <th>crtby</th>
        <th>crtdt</th>
        <th>crtdt</th>
        <th>crtdt</th>
	</tr>	
	<?php for ($i=0; $i< count($biaya); $i++)
	{ ?>
		<tr>
              <td><?=$biaya[$i]['Biaya_ID'];?></td>
              <td><?=$biaya[$i]['Deskripsi'];?></td>
              <td><?=$biaya[$i]['Jenjang'];?></td>
              <td><?=$biaya[$i]['CreatedBy'];?></td>
              <td><?=$biaya[$i]['CreatedDate'];?></td>
              <td><?=$biaya[$i]['ModifiedBy'];?></td>
              <td><?=$biaya[$i]['ModifiedDate'];?></td>
		</tr>
	<?php
	} 
    ?>
</table>

<!-- <a href="http://localhost/rest_ci_client/index.php/kontak/create">+ Tambah data<a> -->