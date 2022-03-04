<?php

     require './function.php';
 if(isset($_POST["update_user"])){
  //cek apkahdata berhasil diupdatekan atau tidak
  if(updateDataUser($_POST)>0){
    echo"
    <script>alert('data berhasil diUbah !');
    document.location.href='media_admin.php?module=user';
    </script>";


  }else{
    echo"<script>alert('data gagal diUbah !');
    // document.location.href='media_admin.php?module=user';
   </script>";}
}
    $id= $_GET['id'];
    $queryEdit = mysqli_query($connection,"SELECT * FROM tbl_user where id_user='$id' limit 1")or die(mysqli_error());
    $dataEdit = mysqli_fetch_array($queryEdit);
    ?>
<!-- modal -->
<div class="container-modaldua muka" id="containermodal2">
  <form class="form" method="POST" action="" onsubmit="return validasi(this)">
    <h2>Update data user</h2>
    <div class="user-details">

      <div class="input-box">
        <span class="detail">username</span>
        <input type="text" name="username" value=<?php echo $dataEdit['username'];?> required />
      </div>
      <div class="input-box">
        <span class="detail">nama user</span>
        <input type="text" name="nama_user" required value=<?php echo $dataEdit['nama_user'];?> />
      </div>
      <div class="input-box">
        <span class="detail">Password lama</span>
        <input type="text" name="password_lama" required />
      </div>
      <div class="input-box">
        <span class="detail">Password baru</span>
        <input type="text" name="password_baru" required />
      </div>
    </div>

    <input class="btn-tambah" type="submit" name="update_user" value="update" />
    <input class="btn-reset" type="reset" name="reset" value="Reset" />
    <a href="media_admin.php?module=user" class="btn-tutup2">Tutup</a>

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