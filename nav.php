  <ul class="nav flex-column" onclick="window.myFunction(event)">
    <li class="logo">
      <h2>tri </h2>
    </li>
    <li class="nav-item">
      <a class="nav-link" aria-current="page" href="?module=home"><i class="fa-solid fa-house-user mx-2"></i>
        Beranda</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="?module=tarif"><i class="fa-solid fa-bolt mx-2"></i>Tarif</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="?module=pelanggan"><i class="fa-solid fa-user-group mx-2"></i>Pelanggan</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="?module=penggunaan"><i class="fa-solid fa-chalkboard-user mx-2"></i>penggunaan</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="?module=tagihan"><i class="fa-solid fa-money-bill mx-2"></i> tagihan</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="?module=pembayaran"><i class="fa-solid fa-money-check mx-2"></i>pembayaran</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="?module=user"><i class="fa-solid fa-users mx-2"></i> users</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="logout.php"> <i class="fa-solid fa-right-from-bracket mx-2"></i> keluar</a>
    </li>
  </ul>
  <script>
window.myFunction = function(event) {
  // reset all menu items
  document.querySelectorAll('.flex-column li a.active').forEach(function(item) {
    item.classList.remove('active');
  })
  // mark as active selected menu item
  event.target.classList.add('active');
};
  </script>