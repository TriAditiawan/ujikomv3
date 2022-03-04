<?php
	include "koneksi.php";
	$id= $_GET['id'];
	mysqli_query($connection,"DELETE FROM tbl_tagihan WHERE id_tagihan='$id'");
	header("location:media_admin.php?module=tagihan");
?>