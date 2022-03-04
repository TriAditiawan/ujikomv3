<?php
 require './function.php';
 if(isset($_POST["tambah_penggunaan"])){
  //cek apkahdata berhasil ditambahkan atau tidak
  if(tambahDataPenggunaan($_POST)>0){
    echo"
    <script>alert('data berhasil ditambahkan !');
    document.location.href='media_admin.php?module=penggunaan';
    </script>";


  }else{
    echo"<script>alert('data gagal ditambahkan !');
    // document.location.href='media_admin.php?module=penggunaan';
   </script>";}
}
?>
<!-- modal -->
<div class="container-modal" id="containermodal">
  <form class="form" method="POST" action="" onsubmit="return validasi(this)">
    <h2>Tambah data penggunaan</h2>
    <div class="user-details">
      <div class="input-box">
        <span class="detail">id penggunaan</span>
        <input type="text" name="input_id_penggunaan" required>
      </div>
      <div class="input-box">
        <span class="detail">nama pelanggan</span>
        <select name="input_id_pelanggan">
          <option value="" selected></option>
          <?php
						$sqlForeign = mysqli_query($connection,"SELECT * FROM tbl_pelanggan")or die(mysqli_error());
						while($dataForeign=mysqli_fetch_array($sqlForeign)){
					?>
          <option value=<?php echo $dataForeign['id_pelanggan']?>> <?php echo $dataForeign['nama']?> </option>
          <?php
						}
					?>
        </select>
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
        <span class="detail">meter awal</span>
        <input type="text" name="input_meter_awal" required>
      </div>
      <div class="input-box">
        <span class="detail">meter akhir</span>
        <input type="text" name="input_meter_akhir" required>
      </div>

    </div>

    <input class="btn-tambah" type="submit" name="tambah_penggunaan" value="tambah" />
    <input class="btn-reset" type="reset" name="reset" value="Reset" />
    <button class="btn-tutup" type="button" id="btntutupmodal">Tutup</button>
  </form>
</div>
<!-- akhir modal -->
<div class="kanan-tabel">
  <h1>Data penggunaan</h1>
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
                <option value="id_penggunaan">ID penggunaan</option>
                <option value="id_pelanggan">id pelanggan</option>
                <option value="bulan">bulan</option>
                <option value="tahun">tahun</option>
                <option value="meter_awal">meter awal</option>
                <option value="meter_akhir">meter akhir</option>
              </select>
            </div>
            <div class="col-4 d-flex">
              <button class="btn-cari mx-1" name="btncari" type="submit" value="Cari">Cari</button>
              <a class="btn-print" href="modul_admin/penggunaan/laporan_penggunaan.php" target="blank">print</a>
            </div>
          </div>
        </div>
      </div>
    </form>
    <div class="responsive-tabel mt-3">
      <table class="table">
        <thead>
          <th>ID penggunaan</th>
          <th>nama</th>
          <th>bulan</th>
          <th>tahun</th>
          <th>meter awal</th>
          <th>meter akhir</th>
          <th colspan="2">Aksi</th>
        </thead>
        <tbody>
          <?php
            if(isset($_POST['btncari'])){
                $kategori = $_POST['inputkategori'];
                $datacari = $_POST['inputcari'];
                $sql = mysqli_query($connection,"SELECT * FROM tbl_penggunaan 
                  inner join tbl_pelanggan on tbl_penggunaan.id_pelanggan = tbl_pelanggan.id_pelanggan 
                  where $kategori LIKE '%$datacari%' 
                  ORDER BY $kategori")or die (mysqli_error());
              }else{
                $sql = mysqli_query($connection,"SELECT * FROM tbl_penggunaan 
                  inner join tbl_pelanggan on tbl_penggunaan.id_pelanggan = tbl_pelanggan.id_pelanggan 
                  ORDER BY id_penggunaan")or die (mysqli_error());
              }
              while($data=mysqli_fetch_array($sql)){  
            ?>
          <tr>
            <td><?php echo $data['id_penggunaan']; ?> </td>
            <td><?php echo $data['nama']; ?> </td>
            <td><?php echo $data['bulan']; ?> </td>
            <td><?php echo $data['tahun']; ?> </td>
            <td><?php echo $data['meter_awal']; ?> </td>
            <td><?php echo $data['meter_akhir']; ?> </td>
            <td><a class="btn-ubah"
                href="media_admin.php?module=update_penggunaan&amp;id=<?php echo $data['id_penggunaan'];?>">Update</a>
            </td>
            <td><a onClick="return confirm('Hapus ?')" class="btn-hapus"
                href="media_admin.php?module=delete_penggunaan&amp;id=<?php echo $data['id_penggunaan'];?>">Hapus</a>
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