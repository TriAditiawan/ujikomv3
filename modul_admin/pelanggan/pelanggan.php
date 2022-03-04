<?php
 require './function.php';
 if(isset($_POST["tambah_pelanggan"])){
  //cek apkahdata berhasil ditambahkan atau tidak
  if(tambahDataPelanggan($_POST)>0){
    echo"
    <script>alert('data berhasil ditambahkan !');
    document.location.href='media_admin.php?module=pelanggan';
    </script>";


  }else{
    echo"<script>alert('data gagal ditambahkan !');
    // document.location.href='media_admin.php?module=pelanggan';
   </script>";}
}
?>
<!-- modal -->
<div class="container-modal" id="containermodal">
  <form class="form" method="POST" action="" onsubmit="return validasi(this)">
    <h2>Tambah data pelanggan</h2>
    <div class="user-details">
      <div class="input-box">
        <span class="detail">id Pelanggan</span>
        <input type="text" name="input_id_pelanggan" required>
      </div>
      <div class="input-box">
        <span class="detail">Nomor Meter</span>
        <input type="text" name="input_no_meter" required>
      </div>
      <div class="input-box">
        <span class="detail">Nama Pelanggan</span>
        <input type="text" name="input_nama" required>
      </div>
      <div class="input-box">
        <span class="detail">Alamat Pelanggan</span>
        <input type="text" name="input_alamat" required>
      </div>
      <div class="input-box">
        <span class="detail">Daya</span>
        <select name="input_id_tarif">
          <option value="" selected></option>
          <?php
						$sqlForeign = mysqli_query($connection,"SELECT * FROM tbl_tarif")or die(mysqli_error());
						while($dataForeign=mysqli_fetch_array($sqlForeign)){
					?>
          <option value=<?php echo $dataForeign['id_tarif']?>> <?php echo $dataForeign['daya']?> </option>
          <?php
						}
					?>
        </select>
      </div>
    </div>

    <input class="btn-tambah" type="submit" name="tambah_pelanggan" value="tambah" />
    <input class="btn-reset" type="reset" name="reset" value="Reset" />
    <button class="btn-tutup" type="button" id="btntutupmodal">Tutup</button>
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
              <a class="btn-print" href="modul_admin/pelanggan/laporan_pelanggan.php" target="blank">print</a>
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
<script>
const open = document.getElementById('btnmanggilmodal');
const modal = document.getElementById('containermodal');
const close = document.getElementById('btntutupmodal');

open.addEventListener('click', () => {
  modal.classList.add('buka');
});
close.addEventListener('click', () => {
  modal.classList.remove('buka');
});
</script>