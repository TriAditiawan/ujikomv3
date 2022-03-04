<?php
include "../../koneksi.php";
$hasil2=mysqli_query($connection,"SELECT * FROM tbl_pelanggan order by id_pelanggan");
// $pageQry = mysqli_query($connection,"SELECT * FROM surat_keluar");
?>
<center>
  <h2>Laporan Pelanggan</h2>
</center>
<table width="100%" border="0" cellspacing="1" cellpadding="3">
  <tr>
    <td colspan="2">
      <table class="table-list" width="100%" border="1" rules="all" bordercolor="#000000" cellspacing="1"
        cellpadding="3">
        <tr>
          <th width="16%" bgcolor="#CCCCCC"><strong>id Tarif</strong></th>
          <th width="16%" bgcolor="#CCCCCC"><strong>Nomor Meter</strong></th>
          <th width="16%" bgcolor="#CCCCCC"><strong>Nama</strong></th>
          <th width="16%" bgcolor="#CCCCCC"><strong>Alamat</strong></th>
          <th width="16%" bgcolor="#CCCCCC"><strong>Daya</strong></th>
        </tr>
        <script>
        window.print();
        </script>
        <?php
  	   # Jika tombol Cari/Search diklik, maka pencarian dilakukan
  	  if(isset($_POST['btnCari'])){
  		  $sql = "SELECT * FROM tbl_pelanggan WHERE id_pelanggan LIKE '%$dataCari%' ORDER BY id_pelanggan ";
  	  }
      else {
  		  $sql = "SELECT * FROM tbl_pelanggan 
					inner join tbl_tarif on tbl_pelanggan.id_tarif = tbl_tarif.id_tarif 
					ORDER BY id_pelanggan";
      } 
  	
      // Menjalankan query di atas
      $myquery = mysqli_query($connection,$sql)  or die ("Query salah : ".mysqli_error());

      while ($myData = mysqli_fetch_array($myquery)) {
      $id = $myData['id_pelanggan'];
    ?>
        <tr>
          <td><?php echo $myData['id_pelanggan']; ?></td>
          <td><?php echo $myData['no_meter']; ?></td>
          <td><?php echo $myData['nama']; ?></td>
          <td><?php echo $myData['alamat']; ?></td>
          <td><?php echo $myData['daya']; ?></td>
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