<?php
include "../../koneksi.php";
$hasil2=mysqli_query($connection,"SELECT * FROM tbl_penggunaan order by id_penggunaan");
// $pageQry = mysqli_query($connection,"SELECT * FROM surat_keluar");
?>
<center>
  <h2>Laporan Penggunaan</h2>
</center>
<table width="100%" border="0" cellspacing="1" cellpadding="3">
  <tr>
    <td colspan="2">
      <table class="table-list" width="100%" border="1" rules="all" bordercolor="#000000" cellspacing="1"
        cellpadding="3">
        <tr>
          <th width="16%" bgcolor="#CCCCCC"><strong>ID penggunaan</strong></th>
          <th width="16%" bgcolor="#CCCCCC"><strong>Nama pelanggan</strong></th>
          <th width="16%" bgcolor="#CCCCCC"><strong>Bulan</strong></th>
          <th width="16%" bgcolor="#CCCCCC"><strong>Tahun</strong></th>
          <th width="16%" bgcolor="#CCCCCC"><strong>meter awal</strong></th>
          <th width="16%" bgcolor="#CCCCCC"><strong>meter akhir</strong></th>
        </tr>
        <script>
        window.print();
        </script>
        <?php
  	   # Jika tombol Cari/Search diklik, maka pencarian dilakukan
  	  if(isset($_POST['btnCari'])){
  		  $sql = "SELECT * FROM tbl_penggunaan WHERE id_penggunaan LIKE '%$dataCari%' ORDER BY id_penggunaan ";
  	  }
      else {
  		  $sql = "SELECT * FROM tbl_penggunaan 
					inner join tbl_pelanggan on tbl_penggunaan.id_pelanggan = tbl_pelanggan.id_pelanggan 
					ORDER BY id_penggunaan";
      } 
  	
      // Menjalankan query di atas
      $myquery = mysqli_query($connection,$sql)  or die ("Query salah : ".mysqli_error());

      while ($myData = mysqli_fetch_array($myquery)) {
      $id = $myData['id_penggunaan'];
    ?>
        <tr>
          <td><?php echo $myData['id_penggunaan']; ?></td>
          <td><?php echo $myData['nama']; ?></td>
          <td><?php echo $myData['bulan']; ?></td>
          <td><?php echo $myData['tahun']; ?></td>
          <td><?php echo $myData['meter_awal']; ?></td>
          <td><?php echo $myData['meter_akhir']; ?></td>
        </tr>
        <?php } ?>
      </table>
    </td>
  </tr>
</table>

<table width="100%" align="center" border="0">
  <tr>
    <td width="80%"></td>
    <td></td>
    <td>Admin</td>
  </tr>
  <tr>
    <td width="80%"></td>
    <td></td>
    <td><br /><br /></td>
  </tr>
  <tr>
    <td width="80%"></td>
    <td></td>
    <td>(..........)</td>
  </tr>
</table>