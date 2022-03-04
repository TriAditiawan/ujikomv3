<?php
	 require './function.php';
	$kode= $_GET['id'];
	mysqli_query($connection,"DELETE FROM tbl_tarif WHERE id_tarif='$kode'");
	header("location:media_admin.php?module=tarif");
?>