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
  <title>Daftar Buku</title>
</head>

<body>
  <h3>Daftar Buku</h3>

  <a href="tambah.php">Tambah Data Buku</a>
  <br><br>

  <form method="post" action="">
    <input type="text" name="keyword" size="40" placeholder="masukkan keywoard pencarian" autocomplete="off" autofocus>
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
          <a href="ubah.php?id=<?= $m['id_Buku']; ?>">ubah</a>
          <a href="hapus.php?id=<?= $m['id_Buku']; ?>">hapus</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>

</body>

</html>