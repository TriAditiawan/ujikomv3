<?php
	 require './function.php';
 if(isset($_POST["update_pembayaran"])){
  //cek apkahdata berhasil diupdatekan atau tidak
  if(updateDataPembayaran($_POST)>0){
    echo"
    <script>alert('data berhasil diUbah !');
    document.location.href='media_admin.php?module=pembayaran';
    </script>";


  }else{
    echo"<script>alert('data gagal diUbah !');
    // document.location.href='media_admin.php?module=pembayaran';
   </script>";}
}
	$id= $_GET['id'];
	$queryEdit = mysqli_query($connection,"SELECT * FROM tbl_pembayaran where id_bayar='$id' limit 1")or die(mysqli_error());
	$dataEdit = mysqli_fetch_array($queryEdit);
?>
<!-- modal -->
<div class="container-modaldua muka" id="containermodal2">
  <form class="form" method="POST" action="" onsubmit="return validasi(this)">
    <h2>Tambah data pembayaran</h2>
    <div class="user-details">
      <div class="input-box">
        <span class="detail">id pembayaran</span>
        <input type="text" name="input_id_bayar" value=<?php echo $dataEdit['id_bayar'];?> required>
      </div>
      <div class="input-box">
        <span class="detail">Id tagihan</span>
        <input type="text" name="input_id_tagihan" value=<?php echo $dataEdit['id_tagihan'];?> required>
      </div>
      <div class="input-box">
        <span class="detail">Tanggal Pembayaran</span>
        <input type="date" name="input_tanggal" value=<?php echo $dataEdit['tanggal'];?> required>
      </div>
      <div class="input-box">
        <span class="detail">Bulan Pembayaran</span>
        <input type="text" name="input_bulan" value=<?php echo $dataEdit['bulan_bayar'];?> required>
      </div>
      <div class="input-box">
        <span class="detail">Biaya admin</span>
        <select name="input_biaya_admin">
          <option value="2500" selected>2500</option>
        </select>
      </div>
    </div>
    <input class="btn-tambah" type="submit" name="update_pembayaran" value="Update">
    <input class="btn-reset" type="reset" name="reset" value="Reset">
    <a href="media_admin.php?module=pembayaran" class="btn-tutup2">Tutup</a>
  </form>
</div>

<!-- akhir modal -->
<div class="kanan-tabel">
  <h1>Data pembayaran</h1>
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
                <option value="id_bayar">ID pembayaran</option>

                <option value="id_tagihan">Nomor</option>
                <option value="tanggal">Tanggal</option>
                <option value="bulan_bayar">bulan bayar</option>
              </select>
            </div>
            <div class="col-4 d-flex">
              <button class="btn-cari mx-1" name="btncari" type="submit" value="Cari">Cari</button>
              <a class="btn-print" href="modul_admin/pembayaran/laporan_pembayaran.php" target="blank">print</a>
            </div>
          </div>
        </div>
      </div>
    </form>
    <div class="responsive-tabel mt-3">
      <table class="table">
        <thead>
          <th>ID bayar</th>
          <th>id tagihan</th>
          <th>Tanggal</th>
          <th>Bulan bayar</th>
          <th>Biaya admin</th>
          <th>Aksi</th>
        </thead>
        <tbody>
          <?php
		if(isset($_POST['btncari'])){
				$kategori = $_POST['inputkategori'];
				$datacari = $_POST['inputcari'];
				$sql = mysqli_query($connection,"SELECT * FROM tbl_pembayaran 
					inner join tbl_tagihan on tbl_pembayaran.id_tagihan = tbl_tagihan.id_tagihan 
					where $kategori LIKE '%$datacari%' 
					ORDER BY $kategori")or die (mysqli_error());
			}else{
				$sql = mysqli_query($connection,"SELECT * FROM tbl_pembayaran 
					inner join tbl_tagihan on tbl_pembayaran.id_tagihan = tbl_tagihan.id_tagihan 
					ORDER BY id_bayar")or die (mysqli_error());
			}
			while($data=mysqli_fetch_array($sql)){  
		?>
          <tr>
            <td><?php echo $data['id_bayar']; ?> </td>
            <td><?php echo $data['id_tagihan']; ?> </td>
            <td><?php echo $data['tanggal']; ?> </td>
            <td><?php echo $data['bulan_bayar']; ?> </td>
            <td><?php echo $data['biaya_admin']; ?> </td>
            <td><a class="btn-ubah mx-2"
                href="media_admin.php?module=update_pembayaran&amp;id=<?php echo $data['id_bayar'];?>">Update</a>
              <a onClick="return confirm('Hapus ?')" class="btn-hapus"
                href="media_admin.php?module=delete_pembayaran&amp;id=<?php echo $data['id_bayar'];?>">Hapus</a>
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