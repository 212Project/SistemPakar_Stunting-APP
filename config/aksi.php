<?php

// Koneksi Database
include 'koneksi.php';
$act = $_GET['act'];

if ($act == "tambah_data") {
    // Menangkap data yang dikirim dari form
    $id = $_POST['idibu'];
    $iddata = $_POST['iddata'];
    $bulan = $_POST['bulan'];
    $tinggi = $_POST['panjang'];
    $zscore = $_POST['zscore'];
    $status = $_POST['status'];
    $pcf = $_POST['pcf'];
    $kesimpulan = $_POST['kesimpulan'];
    $sakit = $_POST['anaksakit'];
    $usiamuda = $_POST['usiamuda'];
    $ekonomiburuk = $_POST['ekonomi'];
    $jarakpendek = $_POST['jarakk'];
    $hipertensi = $_POST['hipertensi'];
    $sakitk = $_POST['sakitk'];
    $usiamudak = $_POST['usiamudak'];
    $ekonomiburukk = $_POST['ekonomiburukk'];
    $jarakpendekk = $_POST['jarakpendekk'];
    $hipertensik = $_POST['hipertensik'];
    $interaksi = $_POST['interaksi'];
    $pengetahuan = $_POST['pengetahuan'];
    $bersih = $_POST['bersih'];
    $vitamin = $_POST['vitamin'];
    $pasif = $_POST['pasif'];
    $nafsu = $_POST['nafsu'];
    $perhatian = $_POST['perhatian'];
    $kontrol = $_POST['kontrol'];
    $interaksik = $_POST['interaksik'];
    $pengetahuank = $_POST['pengetahuank'];
    $bersihk = $_POST['bersihk'];
    $vitamink = $_POST['vitamink'];
    $pasifk = $_POST['pasifk'];
    $nafsuk = $_POST['nafsuk'];
    $perhatiank = $_POST['perhatiank'];
    $kontrolk = $_POST['kontrolk'];

    // Menginputkan data ke tb_anak dan tb_detail
    $sql = "insert into tb_anak values(null,'$id','$iddata','$bulan','$tinggi','$zscore','$status','$pcf','$kesimpulan'); insert into tb_detail values(null,'$id','$iddata','$sakit','$sakitk','$usiamuda','$usiamudak','$ekonomiburuk','$ekonomiburukk','$jarakpendek','$jarakpendekk','$hipertensi','$hipertensik','$interaksi','$interaksik','$pengetahuan','$pengetahuank','$bersih','$bersihk','$vitamin','$vitamink','$pasif','$pasifk','$nafsu','$nafsuk','$perhatian','$perhatiank','$kontrol','$kontrolk');";
    mysqli_multi_query($koneksi, $sql);

    
    // Mengalihkan halaman kembali ke index.php
    header("location:../data_anak.php?pesan=01");
} else if ($act == "hapus_data") {
    // Menghapus data dari tb_anak dan tb_detail
    $sql = "delete from tb_anak where id_data='$_GET[ID]'; delete from tb_detail where id_data='$_GET[ID]';";
    mysqli_multi_query($koneksi, $sql);

    // Mengalihkan halaman kembali ke index.php
    header("location:../data_anak.php?pesan=hapus");
}
