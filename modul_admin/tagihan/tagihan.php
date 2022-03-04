<?php
 require './function.php';
 if(isset($_POST["tambah_tagihan"])){
  //cek apkahdata berhasil ditambahkan atau tidak
  if(tambahDataTagihan($_POST)>0){
    echo"
    <script>alert('data berhasil ditambahkan !');
    document.location.href='media_admin.php?module=tagihan';
    </script>";


  }else{
    echo"<script>alert('data gagal ditambahkan !');
    // document.location.href='media_admin.php?module=tagihan';
   </script>";}
}
?>
<!-- modal -->
<div class="container-modal" id="containermodal">
  <form class="form" method="POST" action="" onsubmit="return validasi(this)">
    <h2>Tambah data tagihan</h2>
    <div class="user-details">
      <div class="input-box">
        <span class="detail">id tagihan</span>
        <input type="text" name="input_id_tagihan" required>
      </div>
      <div class="input-box">
        <span class="detail">id penggunaan</span>
        <input type="text" name="input_id_penggunaan" required>
      </div>
      <div class="input-box">
        <span class="detail">bulan</span>
        <input type="text" name="input_bulan" required>
      </div>
      <div class="input-box">
        <span class="detail">tahun</span>
        <input type="text" name="input_tahun" required>
      </div>
      <div class="input-box">
        <span class="detail">jumlah meter</span>
        <input type="text" name="input_jumlah_meter" required>
      </div>
      <div class="input-box">
        <span class="detail">Status</span>
        <select name="input_status">
          <option value="Lunas">Lunas</option>
          <option value="Belum lunas">Belum lunas</option>
          <option value="Tunggakan">Tunggakan</option>

        </select>
      </div>
    </div>

    <input class="btn-tambah" type="submit" name="tambah_tagihan" value="tambah" />
    <input class="btn-reset" type="reset" name="reset" value="Reset" />
    <button class="btn-tutup" type="button" id="btntutupmodal">Tutup</button>
  </form>
</div>
<!-- akhir modal -->
<div class="kanan-tabel">
  <h1>Data tagihan</h1>
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
                <option value="id_tagihan">ID tagihan</option>
                <option value="id_penggunaan">id penggunaan</option>
                <option value="bulan">bulan</option>
                <option value="tahun">tahun</option>
                <option value="jumlah_meter">jumlah meter</option>
                <option value="status">status</option>
              </select>
            </div>
            <div class="col-4 d-flex">
              <button class="btn-cari mx-1" name="btncari" type="submit" value="Cari">Cari</button>
              <a class="btn-print" href="modul_admin/tagihan/laporan_tagihan.php" target="blank">print</a>
            </div>
          </div>
        </div>
      </div>
    </form>
    <div class="responsive-tabel mt-3">
      <table class="table">
        <thead>
          <th>ID tagihan</th>
          <th>id penggunaan</th>
          <th>bulan</th>
          <th>tahun</th>
          <th>jumlah meter</th>
          <th>status</th>
          <th>Aksi</th>
        </thead>
        <tbody>
          <?php
		if(isset($_POST['btncari'])){
				$kategori = $_POST['inputkategori'];
				$datacari = $_POST['inputcari'];
				$sql = mysqli_query($connection,"SELECT * FROM tbl_tagihan 
					inner join tbl_penggunaan on tbl_tagihan.id_penggunaan = tbl_penggunaan.id_penggunaan 
					where $kategori LIKE '%$datacari%' 
					ORDER BY $kategori") or die (mysqli_error());
			}else{
				$sql = mysqli_query($connection,"SELECT * FROM tbl_tagihan 
					inner join tbl_penggunaan on tbl_tagihan.id_penggunaan = tbl_penggunaan.id_penggunaan 
					ORDER BY id_tagihan")or die (mysqli_error());
			}
			while($data=mysqli_fetch_array($sql)){  
		?>
          <tr>
            <td><?php echo $data['id_tagihan']; ?> </td>
            <td><?php echo $data['id_penggunaan']; ?> </td>
            <td><?php echo $data['bulan']; ?> </td>
            <td><?php echo $data['tahun']; ?> </td>
            <td><?php echo $data['jumlah_meter']; ?> </td>
            <td><?php echo $data['status']; ?> </td>
            <td><a class="btn-ubah mx-2"
                href="media_admin.php?module=update_tagihan&amp;id=<?php echo $data['id_tagihan'];?>">Update</a>
              <a onClick="return confirm('Hapus ?')" class="btn-hapus"
                href="media_admin.php?module=delete_tagihan&amp;id=<?php echo $data['id_tagihan'];?>">Hapus</a>
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