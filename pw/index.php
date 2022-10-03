<?php
require 'functions.php';
$buku = query("SELECT * FROM buku");

//ketika tombol cari di klik
if (isset($_POST['cari'])) {
  $buku = cari($_POST['keyword']);
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Daftar Buku</title>
</head>

<body>
  <div class="container" align = "center">
    <h3>Daftar Koleksi Buku</h3>

    <a href="tambah.php">Tambah Data Buku</a>
    <br><br>

    <form method="post" action="">
      <input type="text" name="keyword" size="50" placeholder="masukkan keywoard pencarian" autocomplete="off" autofocus>
      <button type="submit" name="cari">Cari!</button>
    </form>
    <br>

    <table border="5" cellpadding="15" cellspacing="0" style="background-color: white;">
      <tr>
        <th style="background-color: blue;">No</th>
        <th style="background-color: blue;">judul_Buku</th>
        <th style="background-color: blue;">penerbit</th>
        <th style="background-color: blue;">pengarang</th>
        <th style="background-color: blue;">tahun</th>
        <th style="background-color: blue;">gambar</th>
        <th style="background-color: blue;">aksi</th>
      </tr>

      <?php if (empty($buku)) : ?>
        <tr>
          <td colspan="4">
            <p style="color: red; font-style: italic;">Data buku tidak ditemukan</p>
          </td>
        </tr>
      <?php endif; ?>

      <?php $i = 1;
      foreach ($buku as $m) : ?>
        <tr>
          <td><?= $i++; ?></td>
          <td><?= $m['judul_Buku']; ?></td>
          <td><?= $m['penerbit']; ?></td>
          <td><?= $m['pengarang']; ?></td>
          <td><?= $m['tahun']; ?></td>
          <td><img src="img/<?= $m['gambar']; ?>" width="120"></td>
          <td>
          <i class="large material-icons"><a href="ubah.php?id=<?= $m['id_Buku']; ?>">create</a></i>
            <i class="large material-icons"><a href="hapus.php?id=<?= $m['id_Buku']; ?>">delete_forever</a></i>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
</body>

</html>