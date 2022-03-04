<?php
$data_pelanggan = mysqli_query($connection,"SELECT * FROM tbl_pelanggan");
$data_user = mysqli_query($connection,"SELECT * FROM tbl_user");
$data_tagihan = mysqli_query($connection,"SELECT * FROM tbl_tagihan");
$data_pembayaran = mysqli_query($connection,"SELECT * FROM tbl_pembayaran");
$data_tarif = mysqli_query($connection,"SELECT * FROM tbl_tarif");
$data_penggunaan = mysqli_query($connection,"SELECT * FROM tbl_penggunaan");

// menghitung 
$jumlah_pelanggan = mysqli_num_rows($data_pelanggan);
$jumlah_user = mysqli_num_rows($data_user);
$jumlah_tagihan = mysqli_num_rows($data_tagihan);
$jumlah_pembayaran = mysqli_num_rows($data_pembayaran);
$jumlah_tarif = mysqli_num_rows($data_tarif);
$jumlah_penggunaan = mysqli_num_rows($data_penggunaan);
?>
<div class="container kanan-tabel">
  <div class="informasi">
    <div class="row justify-content-center">
      <a class="col-3 card-informasi tarif mx-3 " href="media_admin.php?module=tarif">
        <h3> <?php echo"$jumlah_tarif"?></h3>
        <h5>Tarif </h5>
      </a>
      <a class="col-3 card-informasi pelanggan mx-3 " href="media_admin.php?module=pelanggan">
        <h3> <?php echo"$jumlah_pelanggan"?></h3>
        <h5>Pelanggan</h5>
      </a>
      <a class="col-3 card-informasi penggunaan mx-3 " href="media_admin.php?module=penggunaan">
        <h3> <?php echo"$jumlah_penggunaan"?></h3>
        <h5>penggunaan</h5>
      </a>
    </div>
    <div class="row justify-content-center">
      <a class="col-3 card-informasi tagihan mx-3 mt-3 " href="media_admin.php?module=tagihan">
        <h3> <?php echo"$jumlah_tagihan"?></h3>
        <h5>tagihan</h5>
      </a>
      <a class="col-3 card-informasi pembayaran mx-3 mt-3 " href="media_admin.php?module=pembayaran">
        <h3> <?php echo"$jumlah_pembayaran"?></h3>
        <h5>Pembayaran</h5>
      </a>
      <a class="col-3 card-informasi user mx-3 mt-3 " href="media_admin.php?module=user">
        <h3> <?php echo"$jumlah_user"?></h3>
        <h5>User</h5>
      </a>
    </div>
  </div>
</div>