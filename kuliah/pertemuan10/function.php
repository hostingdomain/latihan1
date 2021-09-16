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
