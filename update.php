<?php
include 'koneksi.php';

// menyimpan data kedalam variabel
$id_mhs = $_POST['id_mhs'];
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$jenis_kelamin = $_POST['jenis_kelamin'];

// query sou untuk insert data
$query="UPDATE mahasiswa SET nim='$nim',nama='$nama', jurusan='$jurusan',jenis_kelamin='$jenis_kelamin' where id_mhs='$id_mhs'";
mysqli_query($koneksi, $query);

// mengalikan ke halaman index.php
header ("location:index.php");
?>
