<?php
include "../../koneksi.php";
$hasil2=mysqli_query($connection,"SELECT * FROM tbl_pembayaran order by id_bayar");
// $pageQry = mysqli_query($connection,"SELECT * FROM surat_keluar");
?>
<center>
  <h2>Laporan Pembayaran</h2>
</center>
<table width="100%" border="0" cellspacing="1" cellpadding="3">
  <tr>
    <td colspan="2">
      <table class="table-list" width="100%" border="1" rules="all" bordercolor="#000000" cellspacing="1"
        cellpadding="3">
        <tr>

          <th width="16%" bgcolor="#CCCCCC"><strong>ID bayar</strong></th>
          <th width="16%" bgcolor="#CCCCCC"><strong>id tagihan</strong></th>
          <th width="16%" bgcolor="#CCCCCC"><strong>Tanggal</strong></th>
          <th width="16%" bgcolor="#CCCCCC"><strong>Bulan bayar</strong></th>
          <th width="16%" bgcolor="#CCCCCC"><strong>Biaya admin</strong></th>
        </tr>
        <script>
        window.print();
        </script>
        <?php
  	   # Jika tombol Cari/Search diklik, maka pencarian dilakukan
  	  if(isset($_POST['btnCari'])){
  		  $sql = "SELECT * FROM tbl_pembayaran WHERE id_bayar LIKE '%$dataCari%' ORDER BY id_bayar ";
  	  }
      else {
  		  $sql = "SELECT * FROM tbl_pembayaran 
					inner join tbl_tagihan on tbl_pembayaran.id_tagihan = tbl_tagihan.id_tagihan 
					ORDER BY id_bayar";
      } 
  	
      // Menjalankan query di atas
      $myquery = mysqli_query($connection,$sql)  or die ("Query salah : ".mysqli_error());

      while ($myData = mysqli_fetch_array($myquery)) {
      $id = $myData['id_bayar'];
    ?>
        <tr>
          <td><?php echo $myData['id_bayar']; ?></td>
          <td><?php echo $myData['id_tagihan']; ?></td>
          <td><?php echo $myData['tanggal']; ?></td>
          <td><?php echo $myData['bulan_bayar']; ?></td>
          <td><?php echo $myData['biaya_admin']; ?></td>
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