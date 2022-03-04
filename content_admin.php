<?php
    include "koneksi.php";
    $modul = $_GET['module'];
    if ($modul=='home'){
    	echo '<h4 class="pt-3 mb-5 mx-2 selamat-datang">Hai, '.$_SESSION['username'].' . Selamat datang, Di Sistem Informasi Pembayaran Listrik</h4>';
    	;

        include "home.php";
    }
    else if ($modul=='tarif'){
        include "modul_admin/tarif/tarif.php";
    }
    else if ($modul=='update_tarif'){
        include "modul_admin/tarif/update_tarif.php";
    }
    else if ($modul=='delete_tarif'){
        include "modul_admin/tarif/delete_tarif.php";
    }
    else if ($modul=='laporan_tarif'){
        include "modul_admin/tarif/laporan_tarif.php";
    }
    else if ($modul=='pelanggan'){
        include "modul_admin/pelanggan/pelanggan.php";
    }
    else if ($modul=='update_pelanggan'){
        include "modul_admin/pelanggan/update_pelanggan.php";
    }
    else if ($modul=='delete_pelanggan'){
        include "modul_admin/pelanggan/delete_pelanggan.php";
    }
    else if ($modul=='laporan_pelanggan'){
        include "modul_admin/pelanggan/laporan_pelanggan.php";
    }
    else if ($modul=='penggunaan'){
        include "modul_admin/penggunaan/penggunaan.php";
    }
    else if ($modul=='update_penggunaan'){
        include "modul_admin/penggunaan/update_penggunaan.php";
    }
    else if ($modul=='delete_penggunaan'){
        include "modul_admin/penggunaan/delete_penggunaan.php";
    }
    else if ($modul=='laporan_penggunaan'){
        include "modul_admin/penggunaan/laporan_penggunaan.php";
    }
    else if ($modul=='tagihan'){
        include "modul_admin/tagihan/tagihan.php";
    }
    else if ($modul=='update_tagihan'){
        include "modul_admin/tagihan/update_tagihan.php";
    }
    else if ($modul=='delete_tagihan'){
        include "modul_admin/tagihan/delete_tagihan.php";
    }
    else if ($modul=='laporan_tagihan'){
        include "modul_admin/tagihan/laporan_tagihan.php";
    }
    else if ($modul=='pembayaran'){
        include "modul_admin/pembayaran/pembayaran.php";
    }
    else if ($modul=='update_pembayaran'){
        include "modul_admin/pembayaran/update_pembayaran.php";
    }
    else if ($modul=='delete_pembayaran'){
        include "modul_admin/pembayaran/delete_pembayaran.php";
    }
    else if ($modul=='laporan_pembayaran'){
        include "modul_admin/pembayaran/laporan_pembayaran.php";
    }
    else if ($modul=='user'){
        include "modul_admin/user/user.php";
    }
    else if ($modul=='update_user'){
        include "modul_admin/user/update_user.php";
    }
    else if ($modul=='delete_user'){
        include "modul_admin/user/delete_user.php";
    }
    else if ($modul=='laporan_user'){
        include "modul_admin/user/laporan_user.php";
    }
    else{
        echo "<b>ERROR</b>";
    }
?>