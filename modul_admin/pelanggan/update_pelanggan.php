<?php
 require './function.php';
 if(isset($_POST["update_pelanggan"])){
  //cek apkahdata berhasil diupdatekan atau tidak
  if(updateDataPelanggan($_POST)>0){
    echo"
    <script>alert('data berhasil diubah !');
    document.location.href='media_admin.php?module=pelanggan';
    </script>";


  }else{
    echo"<script>alert('data gagal diubah !');
     document.location.href='media_admin.php?module=pelanggan';
   </script>";}
}
?>
<!-- modal -->
<div class="container-modaldua muka" id="containermodaldua">
  <?php
   $id= $_GET['id'];
	$queryEdit = mysqli_query($connection,"SELECT * FROM tbl_pelanggan where Id_pelanggan='$id' limit 1")or die(mysqli_error());
	$dataEdit = mysqli_fetch_array($queryEdit);
    ?>
  <form class="form" method="POST" action="" onsubmit="return validasi(this)">
    <h2>Update data pelanggan</h2>
    <div class="user-details">
      <div class="input-box">
        <span class="detail">id Pelanggan</span>
        <input type="text" name="input_id_pelanggan" value=<?php echo $dataEdit['id_pelanggan'];?> required>
      </div>
      <div class="input-box">
        <span class="detail">Nomor Meter</span>
        <input type="text" name="input_no_meter" value=<?php echo $dataEdit['no_meter'];?> required>
      </div>
      <div class="input-box">
        <span class="detail">Nama Pelanggan</span>
        <input type="text" name="input_nama" value=<?php echo $dataEdit['nama'];?> required>
      </div>
      <div class="input-box">
        <span class="detail">Alamat Pelanggan</span>
        <input type="text" name="input_alamat" value=<?php echo $dataEdit['alamat'];?> required>
      </div>
      <div class="input-box">
        <span class="detail">Daya</span>
        <select name="input_id_tarif" style="width: 70%;">
          <option value="" selected></option>
          <?php
						$sqlForeign = mysqli_query($connection,"SELECT * FROM tbl_tarif")or die(mysqli_error());
						while($dataForeign=mysqli_fetch_array($sqlForeign)){
					?>
          <option value=<?php echo $dataForeign['id_tarif']; ?> <?php 
							if($dataEdit['id_tarif'] == $dataForeign['id_tarif']){
								echo "selected";
							} 
						?>>
            <?php echo $dataForeign['daya'];?>
          </option>

          <?php
						}
					?>
        </select>

      </div>
    </div>

    <input class="btn-tambah" type="submit" name="update_pelanggan" value="update" />
    <input class="btn-reset" type="reset" name="reset" value="Reset" />
    <a href="media_admin.php?module=pelanggan" class="btn-tutup2">Tutup</a>
  </form>
</div>
<!-- akhir modal -->
<div class="kanan-tabel">
  <h1>Data pelanggan</h1>
  <div class="container-tabel">
    <div class="tambah-data">
      <button type="button" id="btnmanggilmodal" class="btn-tambah mb-3">Tambah data</button>
    </div>
    <form method="POST" action="" align="center">
      <div class="row g-0 cari">
        <div class="col-md-8 kiri">
          <input type="text" name="inputcari" placeholder="Masukan keywoard pencarian" />
        </div>
        <div class="col-md-4 cari-kanan">
          <div class="row g-0">
            <div class="col-7">
              <select name="inputkategori">
                <option value="id_pelanggan">ID Pelanggan</option>
                <option value="no_meter">Nomor</option>
                <option value="nama">Nama</option>
                <option value="alamat">Alamat</option>
                <option value="daya">Daya</option>
              </select>
            </div>
            <div class="col-4 d-flex">
              <button class="btn-cari mx-1" name="btncari" type="submit" value="Cari">Cari</button>
              <a class="btn-print" href="modul_admin/tarif/laporan_tarif.php" target="blank">print</a>
            </div>
          </div>
        </div>
      </div>
    </form>
    <div class="responsive-tabel mt-3">
      <table class="table">
        <thead>
          <th>ID pelanggan</th>
          <th>Nomor</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Daya</th>
          <th>Aksi</th>
        </thead>
        <tbody>
          <?php
		if(isset($_POST['btncari'])){
				$kategori = $_POST['inputkategori'];
				$datacari = $_POST['inputcari'];
				$sql = mysqli_query($connection,"SELECT * FROM tbl_pelanggan 
					inner join tbl_tarif on tbl_pelanggan.id_tarif = tbl_tarif.id_tarif 
					where $kategori LIKE '%$datacari%' 
					ORDER BY $kategori")or die (mysqli_error());
			}else{
				$sql = mysqli_query($connection,"SELECT * FROM tbl_pelanggan 
					inner join tbl_tarif on tbl_pelanggan.id_tarif = tbl_tarif.id_tarif 
					ORDER BY id_pelanggan")or die (mysqli_error());
			}
			while($data=mysqli_fetch_array($sql)){  
		?>
          <tr>
            <td><?php echo $data['id_pelanggan']; ?> </td>
            <td><?php echo $data['no_meter']; ?> </td>
            <td><?php echo $data['nama']; ?> </td>
            <td><?php echo $data['alamat']; ?> </td>
            <td><?php echo $data['daya']; ?> </td>
            <td><a class="btn-ubah mx-2"
                href="media_admin.php?module=update_pelanggan&amp;id=<?php echo $data['id_pelanggan'];?>">Update</a>
              <a onClick="return confirm('Hapus ?')" class="btn-hapus"
                href="media_admin.php?module=delete_pelanggan&amp;id=<?php echo $data['id_pelanggan'];?>">Hapus</a>
            </td>
          </tr>
          <?php
			}
		?>
        </tbody>
      </table>
    </div>
  </div>
</div>