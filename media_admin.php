<?php
  session_start();
  include "koneksi.php";
  include "akses.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Bootstrap CSS -->
  <link href="./css/bootstrap-5/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <!-- my css -->
  <link rel="stylesheet" href="./css/style.css" />
  <!-- font awesome -->
  <link rel="stylesheet" href="./css/fontawesome-free-6.0.0-web/fontawesome-free-6.0.0-web/css/all.min.css" />

  <?php 
  $modul = $_GET['module'];
    if ($modul=='home'){
    $tittle="Home";
    }
    else if ($modul=='tarif'){
    $tittle="tarif";
    }
    else if ($modul=='update_tarif'){
    $tittle="update_tarif";
    }
    else if ($modul=='delete_tarif'){
    $tittle="delete_tarif";
    }
    else if ($modul=='laporan_tarif'){
    $tittle="laporan_tarif";
    }
    else if ($modul=='pelanggan'){
    $tittle="pelanggan";
    }
    else if ($modul=='update_pelanggan'){
    $tittle="update_pelanggan";
    }
    else if ($modul=='delete_pelanggan'){
    $tittle="delete_pelanggan";
    }
    else if ($modul=='laporan_pelanggan'){
    $tittle="laporan_pelanggan";
    }
    else if ($modul=='penggunaan'){
    $tittle="penggunaan";
    }
    else if ($modul=='update_penggunaan'){
    $tittle="update_penggunaan";
    }
    else if ($modul=='delete_penggunaan'){
    $tittle="delete_penggunaan";
    }
    else if ($modul=='laporan_penggunaan'){
    $tittle="laporan_penggunaan";
    }
    else if ($modul=='tagihan'){
    $tittle="tagihan";
    }
    else if ($modul=='update_tagihan'){
    $tittle="update_tagihan";
    }
    else if ($modul=='delete_tagihan'){
    $tittle="delete_tagihan";
    }
    else if ($modul=='laporan_tagihan'){
    $tittle="laporan_tagihan";
    }
    else if ($modul=='pembayaran'){
    $tittle="pembayaran";
    }
    else if ($modul=='update_pembayaran'){
    $tittle="update_pembayaran";
    }
    else if ($modul=='delete_pembayaran'){
    $tittle="delete_pembayaran";
    }
    else if ($modul=='laporan_pembayaran'){
    $tittle="laporan_pembayaran";
    }
    else if ($modul=='user'){
    $tittle="user";
    }
    else if ($modul=='update_user'){
    $tittle="update_user";
    }
    else if ($modul=='delete_user'){
    $tittle="delete_user";
    }
    else if ($modul=='laporan_user'){
    $tittle="laporan_user";
    }
    else{
        echo "<b>ERROR</b>";
    }
   ?>
  <title><?= $tittle ?></title>


</head>

<body>
  <!-- bagi 2 -->
  <div class="row g-0 kontent">
    <div class="col-2">
      <?php include "nav.php"; ?>
    </div>
    <div class="col-10 kanan">
      <!-- navbar -->
      <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="?module=home">Sistem Informasi Pembayaran Listrik</a>
          <div class="icon mx-3">
            <h5>
              <i class="fa-solid fa-bell mx-2" data-toggle="tooltip" title="nontifikasi"></i>
              <a href="logout.php"><i class="fa-solid fa-right-from-bracket mx-2" data-toggle="tooltip"
                  title="keluar"></i></a>
            </h5>
          </div>
        </div>
      </nav>
      <!--akhir navbar -->

      <?php include "content_admin.php"; ?>

      <div class="footer mt-5">
        <p>Copyright 2022 By Tri. All rights reserved.</p>
      </div>
    </div>
  </div>

  <!-- Bootstrap Bundle with Popper -->
  <script src="./css/bootstrap-5/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>

  <!-- my js -->
  <script src="./admin.js"></script>
</body>

</html>