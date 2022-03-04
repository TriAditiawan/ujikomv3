<?php 
 require './function.php';
if( isset($_POST["daftar"]) ){
  if(registrasi($_POST)>0){
    echo"<script>alert('Anda telah sukses mendaftar silahkan login!');
    window.location.href='index.php';</script>";
    
    
  }else{
    echo"<script>alert('Anda Gagal mendaftar');</script>";
  } 
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/style_login.css" />
  <title>Daftar Pembayaran Listrik Pasca Bayar</title>
</head>

<body>
  <form action="" method="POST" onsubmit="return validasi(this)">
    <!-- <div class="garis-atas"></div> -->
    <h2>Daftar akun baru Sistem Informasi Pembayaran Listrik</h2>
    <div class="user-details">
      <div class="input-box">
        <span class="detail">Username</span>
        <input type="text" name="input_username" placeholder="Masukkan Username Anda" required />
      </div>
      <div class="input-box">
        <span class="detail">Password</span>
        <input type="password" name="input_password" placeholder="Buat password baru" required />
      </div>
      <div class="input-box">
        <span class="detail">Confirm Password</span>
        <input type="password" name="input_password2" placeholder="Masukan ulang Password Baru" required />
      </div>
    </div>
    <input type="submit" value="daftar" name="daftar" class="button-login" />
    <p class="login2">Sudah punya akun?<a href="./index.php">Login sekarang</a></p>
    <div class="footer">
      <p>&copy 2022 by tri | 1920.10.321 | All rights reserved.</p>
    </div>
  </form>
</body>


</html>