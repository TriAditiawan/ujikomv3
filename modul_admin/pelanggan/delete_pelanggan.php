<?php
	include "koneksi.php";
	$id= $_GET['id'];
	mysqli_query($connection,"DELETE FROM tbl_pelanggan WHERE id_pelanggan='$id'");
	header("location:media_admin.php?module=pelanggan");
?>