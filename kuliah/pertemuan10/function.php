<?php

function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'pw');
}

function query($query)
{
  $conn = koneksi();

  $hasil = mysqli_query($conn, $query);
  //jika data 1
  if (mysqli_num_rows($hasil) == 1) {
    return mysqli_fetch_assoc($hasil);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($hasil)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambah($data)
{
  $conn = koneksi();

  $nama = htmlspecialchars($data['nama']);
  $nrp = htmlspecialchars($data['nrp']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "INSERT INTO
              mahasiswa
            VALUES
            (null, '$nama', '$nrp', '$email', '$jurusan', '$gambar');
          ";
  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}
