<?php
 require './function.php';
 if(isset($_POST["tambah_pembayaran"])){
  //cek apkahdata berhasil ditambahkan atau tidak
  if(tambahDataPembayaran($_POST)>0){
    echo"
    <script>alert('data berhasil ditambahkan');
    document.location.href='media_admin.php?module=pembayaran';
    </script>";


  }else{
    echo"<script>alert('data gagal ditambahkan');
     document.location.href='media_admin.php?module=pembayaran';
   </script>";}
}
?>
<!-- modal -->
<div class="container-modal" id="containermodal">
  <form class="form" method="POST" action="" onsubmit="return validasi(this)">
    <h2>Tambah data pembayaran</h2>
    <div class="user-details">
      <div class="input-box">
        <span class="detail">id pembayaran</span>
        <input type="text" name="input_id_bayar" required>
      </div>
      <div class="input-box">
        <span class="detail">Id tagihan</span>
        <input type="text" name="input_id_tagihan" required>
      </div>
      <div class="input-box">
        <span class="detail">Tanggal Pembayaran</span>
        <input type="date" name="input_tanggal" required>
      </div>
      <div class="input-box">
        <span class="detail">Bulan Pembayaran</span>
        <input type="text" name="input_bulan" required>
      </div>
      <div class="input-box">
        <span class="detail">Biaya admin</span>
        <select name="input_biaya_admin">
          <option value="2500" selected>2500</option>
        </select>
      </div>
    </div>
    <input class="btn-tambah" type="submit" name="tambah_pembayaran" value="tambah" />
    <input class="btn-reset" type="reset" name="reset" value="Reset" />
    <button class="btn-tutup" type="button" id="btntutupmodal">Tutup</button>
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