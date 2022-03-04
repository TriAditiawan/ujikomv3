<?php
include "koneksi.php";
if(isset($_POST["login"])){
	$user	= $_POST['input_username'];
	$pass	= md5($_POST['input_password']);
	$login	= mysqli_query($connection,"SELECT * FROM tbl_user WHERE username='$user' AND password='$pass'");
	$ketemu	= mysqli_num_rows($login);
	if ($ketemu > 0){
		session_start();
	  	$datalogin = mysqli_fetch_array($login);
		$_SESSION['username'] = $datalogin['username'];
		$_SESSION['password'] = $datalogin['password'];
        header("location:media_admin.php?module=home");
	}else{
		echo"<script>
		alert('Maaf, username atau password salah.');
		window.location.href = 'index.php';
		</script>";

	}
}
	if(isset($_SESSION['username'])){
		header("location:media_admin.php?module=home");
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/style_login.css" />
  <title>Login Pembayaran Listrik Pasca Bayar</title>
</head>

<body>
  <form action="" method="POST" onsubmit="return validasi(this)">
    <!-- <div class="garis-atas"></div> -->
    <h2>Login Sistem Informasi Pembayaran Listrik</h2>
    <div class="user-details">
      <div class="input-box">
        <span class="detail">Username</span>
        <input type="text" name="input_username" placeholder="Masukkan Username Anda" required />
      </div>
      <div class="input-box">
        <span class="detail">Password</span>
        <input type="password" name="input_password" placeholder="Masukan Password Anda" required />
      </div>
    </div>
    <input type="submit" value="Login" name="login" class="button-login" />
    <!-- <p class="login">Lupa password?<a href="./reset_password.php">Reset password </a></p> -->
    <p class="login2">Belum punya akun?<a href="./daftar.php">Daftar sekarang</a></p>
    <div class="footer">
      <p>&copy 2022 by tri | 1920.10.321 | All rights reserved.</p>
    </div>
  </form>
</body>
<script type="text/javascript">
function validasi(form) {
  if (form.input_username.value == '') {
    alert('Anda belum mengisikan username');
    form.input_username.focus();
    return false;
  }
  if (form.input_password.value == '') {
    alert('Anda belum mengisikan password.');
    form.input_password.focus();
    return false;
  }
  return true;
}
</script>

</html>