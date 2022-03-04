<?php
include "../../koneksi.php";
$hasil2=mysqli_query($connection,"SELECT * FROM tbl_tagihan order by id_tagihan");
// $pageQry = mysqli_query($connection,"SELECT * FROM surat_keluar");
?>
<center>
  <h2>Laporan Tagihan</h2>
</center>
<table width="100%" border="0" cellspacing="1" cellpadding="3">
  <tr>
    <td colspan="2">
      <table class="table-list" width="100%" border="1" rules="all" bordercolor="#000000" cellspacing="1"
        cellpadding="3">
        <tr>

          <th width="16%" bgcolor="#CCCCCC"><strong>ID tagihan</strong></th>
          <th width="16%" bgcolor="#CCCCCC"><strong>id penggunaan</strong></th>
          <th width="16%" bgcolor="#CCCCCC"><strong>bulan</strong></th>
          <th width="16%" bgcolor="#CCCCCC"><strong>tahun</strong></th>
          <th width="16%" bgcolor="#CCCCCC"><strong>jumlah meter</strong></th>
          <th width="16%" bgcolor="#CCCCCC"><strong>status</strong></th>
        </tr>
        <script>
        window.print();
        </script>
        <?php
  	   # Jika tombol Cari/Search diklik, maka pencarian dilakukan
  	  if(isset($_POST['btnCari'])){
  		  $sql = "SELECT * FROM tbl_tagihan WHERE id_tagihan LIKE '%$dataCari%' ORDER BY id_tagihan ";
  	  }
      else {
  		  $sql = "SELECT * FROM tbl_tagihan 
					inner join tbl_penggunaan on tbl_tagihan.id_penggunaan = tbl_penggunaan.id_penggunaan 
					ORDER BY id_tagihan";
      } 
  	
      // Menjalankan query di atas
      $myquery = mysqli_query($connection,$sql)  or die ("Query salah : ".mysqli_error());

      while ($myData = mysqli_fetch_array($myquery)) {
      $id = $myData['id_tagihan'];
    ?>
        <tr>
          <td><?php echo $myData['id_tagihan']; ?></td>
          <td><?php echo $myData['id_penggunaan']; ?></td>
          <td><?php echo $myData['bulan']; ?></td>
          <td><?php echo $myData['tahun']; ?></td>
          <td><?php echo $myData['jumlah_meter']; ?></td>
          <td><?php echo $myData['status']; ?></td>
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