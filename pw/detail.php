<?php
require 'functions.php';

// ambil id dari URL
$id = $_GET['id'];

// query mahasiswa berdasarkan id
$m = query("SELECT * FROM buku WHERE id = $id");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Buku</title>
</head>

<body>
  <h3>Detail Buku</h3>
  <ul>
    <li><img src="img/<?= $m['gambar']; ?>"></li>
    <li>judul_Buku : <?= $m['judul_Buku']; ?></li>
    <li>penerbit : <?= $m['penerbit']; ?></li>
    <li>pengarang : <?= $m['pengarang']; ?></li>
    <li>tahun : <?= $m['tahun']; ?></li>
    <li><a href="ubah.php?id=<?= $m['id']; ?>">ubah</a> | <a href="hapus.php?id=<?= $m['id']; ?>" onclick="return confirm('apakah anda yakin?');">hapus</a></li>
    <li><a href="index.php">Kembali ke daftar buku</a></li>
  </ul>
</body>

</html>