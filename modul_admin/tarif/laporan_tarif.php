<?php
include "../../koneksi.php";
$hasil2=mysqli_query($connection,"SELECT * FROM tbl_tarif order by id_tarif");
// $pageQry = mysqli_query($connection,"SELECT * FROM surat_keluar");
?>
<center>
  <h2>Laporan Tarif</h2>
</center>
<table width="100%" border="0" cellspacing="1" cellpadding="3">
  <tr>
    <td colspan="2">
      <table class="table-list" width="100%" border="1" rules="all" bordercolor="#000000" cellspacing="1"
        cellpadding="3">
        <tr>
          <th width="16%" bgcolor="#CCCCCC"><strong>id Tarif</strong></th>
          <th width="16%" bgcolor="#CCCCCC"><strong>Daya</strong></th>
          <th width="16%" bgcolor="#CCCCCC"><strong>Tarif Per KWH</strong></th>
        </tr>
        <script>
        window.print();
        </script>
        <?php
  	   # Jika tombol Cari/Search diklik, maka pencarian dilakukan
  	  if(isset($_POST['btnCari'])){
  		  $sql = "SELECT * FROM tbl_tarif WHERE id_tarif LIKE '%$dataCari%' ORDER BY id_tarif ";
  	  }
      else {
  		  $sql = "SELECT * FROM tbl_tarif ORDER BY id_tarif ";
      } 
  	
      // Menjalankan query di atas
      $myquery = mysqli_query($connection,$sql)  or die ("Query salah : ".mysqli_error());

      while ($myData = mysqli_fetch_array($myquery)) {
      $id = $myData['id_tarif'];
    ?>
        <tr>
          <td> <?php echo $myData['id_tarif']; ?></td>
          <td> <?php echo $myData['daya']; ?></td>
          <td> <?php echo $myData['tarif_perkwh']; ?> </td>
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