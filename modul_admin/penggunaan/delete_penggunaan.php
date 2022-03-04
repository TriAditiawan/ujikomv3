<?php
	include "koneksi.php";
	$id= $_GET['id'];
	mysqli_query($connection,"DELETE FROM tbl_penggunaan WHERE id_penggunaan='$id'");
	header("location:media_admin.php?module=penggunaan");
?>