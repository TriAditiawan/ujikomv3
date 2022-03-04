<?php
include "../../koneksi.php";
$hasil2=mysqli_query($connection,"SELECT * FROM tbl_user order by id_user");
// $pageQry = mysqli_query($connection,"SELECT * FROM surat_keluar");
?>
<center>
  <h2>Laporan user</h2>
</center>
<table width="100%" border="0" cellspacing="1" cellpadding="3">
  <tr>
    <td colspan="2">
      <table class="table-list" width="100%" border="1" rules="all" bordercolor="#000000" cellspacing="1"
        cellpadding="3">
        <tr>
          <th width="16%" bgcolor="#CCCCCC"><strong>id user</strong></th>
          <th width="16%" bgcolor="#CCCCCC"><strong>username</strong></th>
          <th width="16%" bgcolor="#CCCCCC"><strong>nama user</strong></th>
        </tr>
        <script>
        window.print();
        </script>
        <?php
  	   # Jika tombol Cari/Search diklik, maka pencarian dilakukan
  	  if(isset($_POST['btnCari'])){
  		  $sql = "SELECT * FROM tbl_user WHERE id_user LIKE '%$dataCari%' ORDER BY id_user ";
  	  }
      else {
  		  $sql = "SELECT * FROM tbl_user ORDER BY id_user ";
      } 
  	
      // Menjalankan query di atas
      $myquery = mysqli_query($connection,$sql)  or die ("Query salah : ".mysqli_error());

      while ($myData = mysqli_fetch_array($myquery)) {
      $id = $myData['id_user'];
    ?>
        <tr>
          <td> <?php echo $myData['id_user']; ?></td>
          <td> <?php echo $myData['username']; ?></td>
          <td> <?php echo $myData['nama_user']; ?> </td>
        </tr>
        <?php } ?>
      </table>
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
    <td><br><br></td>
  </tr>
  <tr>
    <td width="80%"></td>
    <td></td>
    <td>(..........)</td>
  </tr>
</table>