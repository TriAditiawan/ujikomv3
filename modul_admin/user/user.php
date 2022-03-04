<?php
 require './function.php';
 if(isset($_POST["tambah_user"])){
  //cek apkahdata berhasil ditambahkan atau tidak
  if(tambahDataUser($_POST)>0){
    echo"
    <script>alert('data berhasil ditambahkan');
    document.location.href='media_admin.php?module=user';
    </script>";


  }else{
    echo"<script>alert('data gagal ditambahkan');
     document.location.href='media_admin.php?module=user';
   </script>";}
}
?>
<!-- modal -->
<div class="container-modal" id="containermodal">
  <form class="form" method="POST" action="" onsubmit="return validasi(this)">
    <h2>Tambah data user</h2>
    <div class="user-details">
      <div class="input-box">
        <span class="detail">Username</span>
        <input type="text" name="Username" />
      </div>
      <div class="input-box">
        <span class="detail">Password</span>
        <input type="password" name="Password" />
      </div>
      <div class="input-box">
        <span class="detail">Nama user</span>
        <input type="text" name="nama_user" />
      </div>
    </div>

    <input class="btn-tambah" type="submit" name="tambah_user" value="tambah" />
    <input class="btn-reset" type="reset" name="reset" value="Reset" />
    <button class="btn-tutup" type="button" id="btntutupmodal">Tutup</button>
  </form>
</div>

<!-- akhir modal -->
<div class="kanan-tabel">
  <h1>Data user</h1>
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
                <option value="id_user">id user</option>
                <option value="username">username</option>
                <option value="nama_user">nama user</option>
              </select>
            </div>
            <div class="col-4 d-flex">
              <button class="btn-cari mx-1" name="btncari" type="submit" value="Cari">Cari</button>
              <a class="btn-print" href="modul_admin/user/laporan_user.php" target="blank">print</a>
            </div>
          </div>
        </div>
      </div>
    </form>
    <div class="responsive-tabel mt-3">
      <table class="table">
        <thead>
          <th>ID user</th>
          <th>Username</th>
          <th>Password user</th>
          <th>Nama user</th>
          <th colspan="2">Aksi</th>
        </thead>
        <tbody>
          <?php
			if(isset($_POST['btncari'])){
				$kategori = $_POST['inputkategori'];
				$datacari = $_POST['inputcari'];
				$sql = mysqli_query($connection,"SELECT * FROM tbl_user 
					where $kategori LIKE '%$datacari%' 
					ORDER BY $kategori") or die (mysqli_error());
			}else{
				$sql = mysqli_query($connection,"SELECT * FROM tbl_user")or die (mysqli_error());
			}
			while($mydata=mysqli_fetch_array($sql)){
		?>
          <tr>
            <td><?php echo $mydata['id_user']; ?></td>
            <td><?php echo $mydata['username']; ?></td>
            <td><?php echo $mydata['password']; ?></td>
            <td><?php echo $mydata['nama_user']; ?></td>
            <td><a id="btnmanggilmodaldua" class="btn-ubah"
                href="media_admin.php?module=update_user&amp;id=<?php echo $mydata['id_user'];?>">Update</a>
            </td>

            <td><a onClick="return confirm('Hapus ?')" class="btn-hapus"
                href="media_admin.php?module=delete_user&amp;id=<?php echo $mydata['id_user'];?>">Hapus</a></td>
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