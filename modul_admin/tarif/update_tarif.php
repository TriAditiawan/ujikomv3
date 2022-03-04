<?php
 require './function.php';
 if(isset($_POST["update_tarif"])){
  //cek apkahdata berhasil diupdatekan atau tidak
  if(updateDataTarif($_POST)>0){
    echo"
    <script>alert('data berhasil diUbah !');
    document.location.href='media_admin.php?module=tarif';
    </script>";


  }else{
    echo"<script>alert('data gagal diUbah !');
    // document.location.href='media_admin.php?module=tarif';
   </script>";}
}
?>
<!-- modal -->
<div class="container-modaldua muka" id="containermodaldua">
  <?php
    $id= $_GET['id'];
    $queryEdit = mysqli_query($connection,"SELECT * FROM tbl_tarif where id_tarif='$id' limit 1")or die(mysqli_error());
    $dataEdit = mysqli_fetch_array($queryEdit);
    ?>
  <form class="form" method="POST" action="" onsubmit="return validasi(this)">
    <h2>Update data tarif</h2>
    <div class="user-details">
      <div class="input-box">
        <span class="detail">id tarif</span>
        <input type="text" name="input_id_tarif" value=<?php echo $dataEdit['id_tarif'];?> required />
      </div>
      <div class="input-box">
        <span class="detail">Daya</span>
        <input type="text" name="input_daya" value=<?php echo $dataEdit['daya'];?> required />
      </div>
      <div class="input-box">
        <span class="detail">TarifPerKWH</span>
        <input type="text" name="input_tarif_perkwh" required value=<?php echo $dataEdit['tarif_perkwh'];?> />
      </div>
    </div>

    <input class="btn-tambah" type="submit" name="update_tarif" value="Update" />
    <input class="btn-reset" type="reset" name="reset" value="Reset" />
    <a href="media_admin.php?module=tarif" class="btn-tutup2">Tutup</a>
  </form>
</div>
<!-- akhir modal -->
<div class="kanan-tabel">
  <h1>Data tarif</h1>
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
                <option value="id_tarif">id Tarif</option>
                <option value="daya">Daya</option>
                <option value="tarif_perkwh">Tarif Per KWH</option>
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
          <tr>
            <th scope="col">ID tarif</th>
            <th scope="col">Daya</th>
            <th scope="col">Tarif PerKWH</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
			if(isset($_POST['btncari'])){
				$kategori = $_POST['inputkategori'];
				$datacari = $_POST['inputcari'];
				$sql = mysqli_query($connection,"SELECT * FROM tbl_tarif 
					where $kategori LIKE '%$datacari%' 
					ORDER BY $kategori") or die (mysqli_error());
			}else{
				$sql = mysqli_query($connection,"SELECT * FROM tbl_tarif")or die (mysqli_error());
			}
			while($mydata=mysqli_fetch_array($sql)){
		?>
          <tr>
            <td><?php echo $mydata['id_tarif']; ?></td>
            <td><?php echo $mydata['daya']; ?></td>
            <td><?php echo $mydata['tarif_perkwh']; ?></td>
            <td><a id="btnmanggilmodaldua" class="btn-ubah mx-1"
                href="media_admin.php?module=update_tarif&amp;id=<?php echo $mydata['id_tarif'];?>">Update</a>
              <a onClick="return confirm('Hapus ?')" class="btn-hapus"
                href="media_admin.php?module=delete_tarif&amp;id=<?php echo $mydata['id_tarif'];?>">Hapus</a>
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