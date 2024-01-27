<?php

// Koneksi Database
include 'koneksi.php';

// Menangkap data yang dikirim dari form
$id = $_POST['id_ibu'];
$nama_ibu = $_POST['nama'];
$umur = $_POST['umur'];
$pendidikan = $_POST['pendidikan'];
$alamat = $_POST['alamat'];
$notlp = $_POST['notlp'];
$nama_anak = $_POST['nama_anak'];
$jk = $_POST['jk'];

// Menginputkan data ke database
mysqli_query($koneksi, "insert into tb_ibuanak values('$id','$nama_ibu','$umur','$pendidikan','$alamat','$notlp','$nama_anak','$jk')");

// Mengalihkan halaman kembali ke index.php
header("location:../index.php?pesan=01");
