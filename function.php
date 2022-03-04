<?php 
	$server = "localhost";
	$username = "root";
	$password = "";
	$database = "db_listrik_tri";
	$connection = mysqli_connect($server, $username, $password,$database) or die ("Gagal konek ke server MySQL" .mysqli_error());
  //registrasi
  function registrasi($data){
  global $connection;
  $username=strtolower(stripslashes($data["input_username"]));
  $password=mysqli_real_escape_string($connection,$data["input_password"]);
  $password2=mysqli_real_escape_string($connection,$data["input_password2"]);

  //cek konfirmasi password
  if($password !== $password2){
     echo"<script>
     alert('Konfirmasi password salah!');
     </script>";
     return false;

  }
  //enkripsi password
  $password=md5($password);
  
  mysqli_query($connection,"INSERT INTO tbl_user VALUES('','$username','$password','$username')");
  return mysqli_affected_rows($connection);
}
//  tarif
  function tambahDataTarif($data){
  global $connection;
  $id_tarif = $_POST['id_tarif'];
  $daya = $_POST['daya'];
  $tarif_perkwh = $_POST['tarif_perkwh'];
  $query = "INSERT INTO tbl_tarif values ('$id_tarif', '$daya', '$tarif_perkwh')";
  mysqli_query($connection,$query);

  return mysqli_affected_rows($connection);

  }
  function UpdateDataTarif($data){
  global $connection;
 	$id= $_GET['id'];
	$id_tarif=$_POST['input_id_tarif'];
	$daya=$_POST['input_daya'];
	$tarif_perkwh=$_POST['input_tarif_perkwh'];
	$query = "UPDATE tbl_tarif SET id_tarif='$id_tarif', daya='$daya', tarif_Perkwh='$tarif_perkwh' WHERE id_tarif='$id'";
  mysqli_query($connection,$query);

  return mysqli_affected_rows($connection);

  }
// akhir tarif

// Pelanggan

function tambahDataPelanggan($data){
 global $connection;
 $idpelanggan = $_POST['input_id_pelanggan'];
	$nometer = $_POST['input_no_meter'];
	$nama = $_POST['input_nama'];
	$alamat = $_POST['input_alamat'];
	$idtarif = $_POST['input_id_tarif'];
	
	$query = "INSERT into tbl_pelanggan values ('$idpelanggan','$nometer','$nama','$alamat','$idtarif')";
	
 mysqli_query($connection,$query);

 return mysqli_affected_rows($connection);

 }
function updateDataPelanggan($data){
 global $connection;
 	$id= $_GET['id'];
	$idpelanggan = $_POST['input_id_pelanggan'];
	$nometer = $_POST['input_no_meter'];
	$nama = $_POST['input_nama'];
	$alamat = $_POST['input_alamat'];
	$idtarif = $_POST['input_id_tarif'];
	$query = "UPDATE tbl_pelanggan SET 
		id_pelanggan='$idpelanggan',
		no_meter='$nometer',
		nama='$nama',
		alamat='$alamat',
		id_tarif='$idtarif'
		WHERE id_pelanggan='$id'";
	
 mysqli_query($connection,$query);

 return mysqli_affected_rows($connection);

 }
// akhir Pelanggan

// tagihan
 function tambahDataTagihan($data){
  global $connection;
 	$idtagihan = $_POST['input_id_tagihan'];
	$idpenggunaan = $_POST['input_id_penggunaan'];
	$bulan = $_POST['input_bulan'];
	$tahun = $_POST['input_tahun'];
	$jumlahmeter = $_POST['input_jumlah_meter'];
	$status = $_POST['input_status'];
	
	$query = "INSERT into tbl_tagihan values ('$idtagihan','$idpenggunaan','$bulan','$tahun','$jumlahmeter','$status ')";
	
  mysqli_query($connection,$query);

  return mysqli_affected_rows($connection);

  }

  
 function updateDataTagihan($data){
  global $connection;
 		$id= $_GET['id'];
	$idtagihan = $_POST['input_id_tagihan'];
	$idpenggunaan = $_POST['input_id_penggunaan'];
	$bulan = $_POST['input_bulan'];
	$tahun = $_POST['input_tahun'];
	$jumlahmeter = $_POST['input_jumlah_meter'];
	$status = $_POST['input_status'];
	
	$query = "UPDATE tbl_tagihan SET 
		id_tagihan='$idtagihan',
		id_penggunaan='$idpenggunaan',
		bulan='$bulan',
		tahun='$tahun',
		jumlah_meter='$jumlahmeter',
		status='$status'
		WHERE id_tagihan='$id'";

	
  mysqli_query($connection,$query);

  return mysqli_affected_rows($connection);

  }
// akhir tagihan

// pembayaran

 function tambahDataPembayaran($data){
  global $connection;
 		$idpembayaran = $_POST['input_id_bayar'];
	$idtagihan = $_POST['input_id_tagihan'];
	$tanggal = $_POST['input_tanggal'];
	$bulan = $_POST['input_bulan'];
	$badmin = $_POST['input_biaya_admin'];
	
	$query = "INSERT into tbl_pembayaran values ('$idpembayaran','$idtagihan','$tanggal','$bulan','$badmin')";
	
  mysqli_query($connection,$query);

  return mysqli_affected_rows($connection);

  }

  
 function updateDataPembayaran($data){
  global $connection;
 		$id= $_GET['id'];
	$idpembayaran = $_POST['input_id_bayar'];
	$idtagihan = $_POST['input_id_tagihan'];
	$tanggal = $_POST['input_tanggal'];
	$bulan = $_POST['input_bulan'];
	$badmin = $_POST['input_biaya_admin'];
	$query = "UPDATE tbl_pembayaran SET 
		id_bayar='$idpembayaran',
		id_tagihan='$idtagihan',
		tanggal='$tanggal',
		bulan_bayar='$bulan',
		biaya_admin='$badmin'
		WHERE id_bayar='$id'";


	
  mysqli_query($connection,$query);

  return mysqli_affected_rows($connection);

  }
// akhir pembayaran
// penggunaan

 function tambahDataPenggunaan($data){
  global $connection;
 			$idpenggunaan = $_POST['input_id_penggunaan'];
	$idpelanggan = $_POST['input_id_pelanggan'];
	$bulan = $_POST['input_bulan'];
	$tahun = $_POST['input_tahun'];
	$mawal = $_POST['input_meter_awal'];
	$makhir = $_POST['input_meter_akhir'];
	
	$query = "INSERT into tbl_penggunaan values ('$idpenggunaan','$idpelanggan','$bulan','$tahun','$mawal','$makhir')";
	
  mysqli_query($connection,$query);

  return mysqli_affected_rows($connection);

  }

  
 function updateDataPenggunaan($data){
  global $connection;
  $id= $_GET['id'];
	$idpenggunaan = $_POST['input_id_penggunaan'];
	$idpelanggan = $_POST['input_id_pelanggan'];
	$bulan = $_POST['input_bulan'];
	$tahun = $_POST['input_tahun'];
	$mawal = $_POST['input_meter_awal'];
	$makhir = $_POST['input_meter_akhir'];
	$query = "UPDATE tbl_penggunaan SET 
		id_penggunaan='$idpenggunaan',
		id_pelanggan='$idpelanggan',
		bulan='$bulan',
		tahun='$tahun',
		meter_awal='$mawal',
		meter_akhir='$makhir'

		WHERE id_penggunaan='$id'";



	
  mysqli_query($connection,$query);

  return mysqli_affected_rows($connection);

  }
// akhir penggunaan
// penggunaan

 function tambahDataUser($data){
  global $connection;
 			$Username = $_POST['Username'];
	$password = $_POST['Password'];
	$password=md5($password);
	$nama_user = $_POST['nama_user'];
	$query = "INSERT INTO tbl_user values ('', '$Username', '$password','$nama_user')";
	
  mysqli_query($connection,$query);

  return mysqli_affected_rows($connection);

  }

  
 function updateDataUser($data){
  global $connection;
  $id= $_GET['id'];
	$username=$_POST['username'];
	$nama_user=$_POST['nama_user'];
	$password_lama=md5($_POST['password_lama']);
	$password_baru=md5($_POST['password_baru']);
	$login	= mysqli_query($connection,"SELECT * FROM tbl_user WHERE id_user='$id' AND password='$password_lama'");
	$ketemu	= mysqli_num_rows($login);
	 if ($ketemu > 0){
			$datalogin = mysqli_fetch_array($login);
		$password_database = $datalogin['password'];
	}else{
		echo"<script>
		alert('Maaf, password lama salah!');
		window.location.href = 'media_admin.php?module=user';
		</script>";
	}

	if($password_lama===$password_database){

		$query = "UPDATE tbl_user SET
		id_user='$id',
		username='$username',
		password='$password_baru',
		nama_user='$nama_user'
		WHERE id_user='$id'";

		$cekquery = mysqli_query($connection,$query);
		if ($cekquery) {
			echo"<script>
		alert('Data berhasil di ubah!');
		location = 'media_admin.php?module=user';
		</script>";
			}else{
				echo"<script>
		alert('Gagal di ubah!');
		location = 'media_admin.php?module=user';
		</script>";

		 } 
		}

  return mysqli_affected_rows($connection);

  }
// akhir penggunaan


 