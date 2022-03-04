<?php
	include "koneksi.php";
	$id= $_GET['id'];
	mysqli_query($connection,"DELETE FROM tbl_pembayaran WHERE id_bayar='$id'");
	header("location:media_admin.php?module=pembayaran");
?>