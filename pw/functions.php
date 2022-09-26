<?php
function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'prakweb_c_203040142_pw');
}

function query($query)
{
  $conn = koneksi();

  $result = mysqli_query($conn, $query);

  // jika hasilnya hanya 1 data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function tambah($data)
{
  $conn = koneksi();

  $judul_Buku = htmlspecialchars($data['judul_Buku']);
  $penerbit = htmlspecialchars($data['penerbit']);
  $pengarang = htmlspecialchars($data['pengarang']);
  $tahun = htmlspecialchars($data['tahun']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "INSERT INTO
              buku
            VALUES
            (null, '$judul_Buku', '$penerbit', '$pengarang', '$tahun','$gambar');
          ";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  $conn = koneksi();
  mysqli_query($conn, "DELETE FROM buku WHERE id_Buku = $id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  $conn = koneksi();

  $id = $data['id_Buku'];
  $judul_Buku = htmlspecialchars($data['judul_Buku']);
  $penerbit = htmlspecialchars($data['penerbit']);
  $pengarang = htmlspecialchars($data['pengarang']);
  $tahun = htmlspecialchars($data['tahun']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "UPDATE buku SET
              judul_Buku = '$judul_Buku',
              penerbit = '$penerbit',
              pengarang = '$pengarang',
              tahun = '$tahun',
              gambar = '$gambar'
            WHERE id_Buku = $id";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}


function cari($keyword)
{
  $conn = koneksi();

  $query = "SELECT * FROM buku
              WHERE 
            judul_Buku LIKE '%$keyword%' OR
            penerbit LIKE '%$keyword%'
          ";

  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}