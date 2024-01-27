<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">

    <title>Diagnosa Stunting Pada Balita</title>
</head>

<?php
session_start();

if (!isset($_SESSION['kode'])) {
    header('location: index.php');
}


include 'config/koneksi.php';
$kode = $_SESSION['kode'];
$detail = mysqli_query($koneksi, "select * from tb_ibuanak where id='$kode'");
$det = mysqli_fetch_array($detail);
?>

<body class="bg-pink-light p-5">
    <div class="container bg-white my-3 p-5 shadow rounded-3">
        <div class="card mb-3 border-0">
            <div class="row g-0">
                <div class="col-md-3 text-center my-auto">
                    <img src="img/avatar.png" style="max-width: 250px;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title">Data Ibu</h2>
                        <table class="table table-borderless">
                            <tr>
                                <td> Username </td>
                                <td> : </td>
                                <td> <?php echo $det['id'] ?> </td>
                            </tr>
                            <tr>
                                <td> Nama </td>
                                <td> : </td>
                                <td> <?php echo $det['nama_ibu'] ?> </td>
                            </tr>
                            <tr>
                                <td> Umur </td>
                                <td> : </td>
                                <td> <?php echo $det['umur'] ?> </td>
                            </tr>
                            <tr>
                                <td> Pendidikan </td>
                                <td> : </td>
                                <td> <?php echo $det['pendidikan'] ?> </td>
                            </tr>
                            <tr>
                                <td> Alamat </td>
                                <td> : </td>
                                <td> <?php echo $det['alamat'] ?> </td>
                            </tr>
                            <tr>
                                <td> No. Telepon </td>
                                <td> : </td>
                                <td> <?php echo $det['notlp'] ?> </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container bg-white my-3 p-5 shadow rounded-3">
        <div class="card mb-3 border-0">
            <div class="row g-0">
                <div class="col-md-3 text-center my-auto">
                    <?php
                    if ($det['jk'] == "Laki-laki") {
                        echo "<img src='img/boy.png' style='max-width: 250px;'>";
                    } else {
                        echo "<img src='img/girl.webp' style='max-width: 250px;'>";
                    }
                    ?>
                </div>
                <div class="col-md-8 my-auto">
                    <div class="card-body">
                        <h2 class="card-title">Data Anak</h2>
                        <table class="table table-borderless">
                            <tr>
                                <td> Nama </td>
                                <td> : </td>
                                <td> <?php echo $det['nama_anak'] ?> </td>
                            </tr>
                            <tr>
                                <td> Jenis Kelamin </td>
                                <td> : </td>
                                <td> <?php echo $det['jk'] ?> </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <button class="btn btn-success mt-4" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah Data</button>
                <table class="table table-hover mt-4">
                    <thead>
                        <td>Bulan</td>
                        <td>Panjang / Tinggi</td>
                        <td>Z-Score</td>
                        <td>Status</td>
                        <td>Persentase Stunting</td>
                        <td>Kesimpulan</td>
                        <td>Action</td>

                    </thead>
                    <tbody>
                        <?php
                        $data = mysqli_query($koneksi, "select * from tb_anak where id_ibu='$kode'");
                        $arr = array();
                        while ($d = mysqli_fetch_array($data)) {
                            array_push($arr, $d['bulan']);
                            $idrow = $d['id_data'];
                            $ge = mysqli_query($koneksi, "select * from tb_detail where id_data='$idrow'");
                            $gb = mysqli_fetch_array($ge)
                        ?>
                            <tr>
                                <td><?php echo $d['bulan']; ?></td>
                                <td><?php echo $d['tinggi']; ?></td>
                                <td><?php echo $d['zscore']; ?></td>
                                <td><?php echo $d['status']; ?></td>
                                <td><?php echo $d['stunting']; ?>%</td>
                                <td><?php echo $d['kesimpulan']; ?></td>
                                <td>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal<?= $d['id_data']; ?>">Detail</button>
                                    <a class="btn btn-danger" href="config/aksi.php?act=hapus_data&ID=<?= $d['id_data']; ?>">Hapus</a>
                                </td>
                            </tr>

                            <!-- Modal Tampil -->
                            <div class="modal fade" id="detailModal<?= $d['id_data']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-pink-light modal-dialog-centered">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Anak Sering Sakit</label>
                                                <input type="text" class="form-control" value="<?php echo $gb['sakitk']; ?> | <?php echo $gb['sakit']; ?>" readonly>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label>Melahirkan Anak Diusia Muda (Dibawah 20 atau 20 Sampai 25)</label>
                                                <input type="text" class="form-control" value="<?php echo $gb['usiamudak']; ?> | <?php echo $gb['usiamuda']; ?>" readonly>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label>Kondisi Ekonomi Buruk</label>
                                                <input type="text" class="form-control" value="<?php echo $gb['ekonomiburukk']; ?> | <?php echo $gb['ekonomiburuk']; ?>" readonly>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label>Jarak Kelahiran Anak Dengan Anak Sebelumnya Dekat</label>
                                                <input type="text" class="form-control" value="<?php echo $gb['jarakpendekk']; ?> | <?php echo $gb['jarakpendek']; ?>" readonly>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label>Ada Riwayat Hipertensi</label>
                                                <input type="text" class="form-control" value="<?php echo $gb['hipertensik']; ?> | <?php echo $gb['hipertensi']; ?>" readonly>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label>Tidak Ada Respon Dari Anak Ketika Diajak Berinteraksi</label>
                                                <input type="text" class="form-control" value="<?php echo $gb['interaksik']; ?> | <?php echo $gb['interaksi']; ?>" readonly>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label>Tidak Mengetahui Mengenai Stunting</label>
                                                <input type="text" class="form-control" value="<?php echo $gb['pengetahuank']; ?> | <?php echo $gb['pengetahuan']; ?>" readonly>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label>Lingkungan Anak Tidak Bersih</label>
                                                <input type="text" class="form-control" value="<?php echo $gb['bersihk']; ?> | <?php echo $gb['bersih']; ?>" readonly>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label>Anak Kurang Asumsi Vitamin Dan Nutrisi Makanan</label>
                                                <input type="text" class="form-control" value="<?php echo $gb['vitamink']; ?> | <?php echo $gb['vitamin']; ?>" readonly>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label>Anak Kurang Aktif / Pasif</label>
                                                <input type="text" class="form-control" value="<?php echo $gb['pasifk']; ?> | <?php echo $gb['pasif']; ?>" readonly>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label>Anak Kurang Nafsu Makan</label>
                                                <input type="text" class="form-control" value="<?php echo $gb['nafsuk']; ?> | <?php echo $gb['nafsu']; ?>" readonly>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label>Kurang Memperhatikan Anak</label>
                                                <input type="text" class="form-control" value="<?php echo $gb['perhatiank']; ?> | <?php echo $gb['perhatian']; ?>" readonly>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label>Jarang Melakukan Pengontrolan Pertumbuhan Anak</label>
                                                <input type="text" class="form-control" value="<?php echo $gb['kontrolk']; ?> | <?php echo $gb['kontrol']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "01") {
            echo "<script>alert('Data Berhasil Ditambahkan!')</script>";
        } else if ($_GET['pesan'] == "hapus") {
            echo "<script>alert('Data Berhasil Dihapus!')</script>";
        }
    }
    ?>

    <!-- Modal Tambah -->
    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="config/aksi.php?act=tambah_data" class="form-control">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="iddata" id="iddata" hidden>
                        </div>
                        <div class="form-group">
                            <label>ID Ibu</label>
                            <input type="text" class="form-control" name="idibu" id="idibu" value="<?php echo $det['id'] ?>" readonly>
                        </div>
                        <div class="form-group mt-3">
                            <label>Jenis Kelamin</label>
                            <input type="text" class="form-control" name="jk" id="jk" value="<?php echo $det['jk'] ?>" readonly>
                        </div>
                        <div class="form-group mt-3">
                            <label>Bulan</label>
                            <select class="form-control" name="bulan" id="bulan">
                                <?php
                                    $arr2 = array();
                                    for ($i = 0; $i <=60; $i++) {
                                        array_push($arr2, strval($i));
                                    }
                                    $arr3 = array_diff($arr2, $arr);
                                    foreach($arr3 as $value) {
                                        ?>
                                        <option value="<?= $value ?>"><?= $value ?> Bulan</option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label>Panjang / Tinggi</label>
                            <input type="text" class="form-control" name="panjang" id="panjang" placeholder="Masukkan Panjang / Tinggi (CM)">
                        </div>
                        <div class="form-group mt-3">
                            <label>Anak Anda Sering Sakit</label>
                            <select class="form-control" name="anaksakit" id="anaksakit">
                                <option value="0">Tidak</option>
                                <option value="1">Iya</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label>Anda Melahirkan Anak Anda Diusia Muda (Dibawah 20 atau 20 Sampai 25)</label>
                            <select class="form-control" name="usiamuda" id="usiamuda">
                                <option value="0">Tidak</option>
                                <option value="1">Iya</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label>Kondisi Ekonomi Keluarga Anda Buruk</label>
                            <select class="form-control" name="ekonomi" id="ekonomi">
                                <option value="0">Tidak</option>
                                <option value="1">Iya</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label>Jarak Kelahiran Anak Anda Dengan Anak Sebelumnya Dekat</label>
                            <select class="form-control" name="jarakk" id="jarakk">
                                <option value="0">Tidak</option>
                                <option value="1">Iya</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label>Anda Ada Riwayat Hipertensi</label>
                            <select class="form-control" name="hipertensi" id="hipertensi">
                                <option value="0">Tidak</option>
                                <option value="1">Iya</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label>Tidak Ada Respon Dari Anak Anda Ketika Diajak Berinteraksi</label>
                            <select class="form-control" name="interaksi" id="interaksi">
                                <option value="0">Tidak</option>
                                <option value="1">Iya</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label>Anda Tidak Mengetahui Mengenai Stunting</label>
                            <select class="form-control" name="pengetahuan" id="pengetahuan">
                                <option value="0">Tidak</option>
                                <option value="1">Iya</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label>Lingkungan Anak Anda Tidak Bersih</label>
                            <select class="form-control" name="bersih" id="bersih">
                                <option value="0">Tidak</option>
                                <option value="1">Iya</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label>Anak Anda Kurang Asumsi Vitamin Dan Nutrisi Makanan</label>
                            <select class="form-control" name="vitamin" id="vitamin">
                                <option value="0">Tidak</option>
                                <option value="1">Iya</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label>Anak Anda Kurang Aktif / Pasif</label>
                            <select class="form-control" name="pasif" id="pasif">
                                <option value="0">Tidak</option>
                                <option value="1">Iya</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label>Anak Anda Kurang Nafsu Makan</label>
                            <select class="form-control" name="nafsu" id="nafsu">
                                <option value="0">Tidak</option>
                                <option value="1">Iya</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label>Anda Kurang Memperhatikan Anak Anda</label>
                            <select class="form-control" name="perhatian" id="perhatian">
                                <option value="0">Tidak</option>
                                <option value="1">Iya</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label>Anda Jarang Melakukan Pengontrolan Pertumbuhan Anak</label>
                            <select class="form-control" name="kontrol" id="kontrol">
                                <option value="0">Tidak</option>
                                <option value="1">Iya</option>
                            </select>
                        </div>
                        <button type="button" onclick="ujiDiagnosa()" class="btn btn-primary my-2">Hitung</button>
                        <div class="form-group">
                            <input type="text" class="form-control" name="sakitk" id="sakitk" hidden>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="usiamudak" id="usiamudak" hidden>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="ekonomiburukk" id="ekonomiburukk" hidden>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="jarakpendekk" id="jarakpendekk" hidden>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="hipertensik" id="hipertensik" hidden>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="interaksik" id="interaksik" hidden>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="pengetahuank" id="pengetahuank" hidden>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="bersihk" id="bersihk" hidden>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="vitamink" id="vitamink" hidden>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="pasifk" id="pasifk" hidden>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="nafsuk" id="nafsuk" hidden>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="perhatiank" id="perhatiank" hidden>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="kontrolk" id="kontrolk" hidden>
                        </div>
                        <div class="form-group">
                            <label>Z-Score</label>
                            <input type="text" class="form-control" name="zscore" id="zscore" readonly>
                        </div>
                        <div class="form-group mt-3">
                            <label>Status</label>
                            <input type="text" class="form-control" name="status" id="status" readonly>
                        </div>
                        <div class="form-group mt-3">
                            <label>Persentase CF</label>
                            <input type="text" class="form-control" name="pcf" id="pcf" readonly>
                        </div>
                        <div class="form-group mt-3">
                            <label>Kesimpulan</label>
                            <input type="text" class="form-control" name="kesimpulan" id="kesimpulan" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Tampil -->
    <div class="modal fade" id="tampilModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-pink-light modal-dialog-centered">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hasil Uji</h5>
                </div>
                <div class="modal-body text-center">
                    <h4 id="zscores"></h4>
                    <h2 id="statuss"></h2>
                    <h4 id="pcff"></h4>
                    <h2 id="kesimpulann"></h2>
                    <p id="solusi"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery.js"></script>
    <script src="./js/nilai_pakar.js"></script>
    <script>
        function ujiDiagnosa() {
            var kelamin = $('#jk').val();
            var umur = parseInt($("#bulan option:selected").val());
            var x = parseFloat($('#panjang').val());

            var gejala1 = parseFloat($("#anaksakit option:selected").val());
            if (gejala1 == 0) {
                $("#sakitk").val("Tidak");
            } else if (gejala1 == 1) {
                $("#sakitk").val("Iya");
            }

            var gejala2 = parseFloat($("#usiamuda option:selected").val());
            if (gejala2 == 0) {
                $("#usiamudak").val("Tidak");
            } else if (gejala2 == 1) {
                $("#usiamudak").val("Iya");
            }

            var gejala3 = parseFloat($("#ekonomi option:selected").val());
            if (gejala3 == 0) {
                $("#ekonomiburukk").val("Tidak");
            } else if (gejala3 == 1) {
                $("#ekonomiburukk").val("Iya");
            }

            var gejala4 = parseFloat($("#jarakk option:selected").val());
            if (gejala4 == 0) {
                $("#jarakpendekk").val("Tidak");
            } else if (gejala4 == 1) {
                $("#jarakpendekk").val("Iya");
            }

            var gejala5 = parseFloat($("#hipertensi option:selected").val());
            if (gejala5 == 0) {
                $("#hipertensik").val("Tidak");
            } else if (gejala5 == 1) {
                $("#hipertensik").val("Iya");
            }

            var gejala6 = parseFloat($("#interaksi option:selected").val());
            if (gejala6 == 0) {
                $("#interaksik").val("Tidak");
            } else if (gejala6 == 1) {
                $("#interaksik").val("Iya");
            }

            var gejala7 = parseFloat($("#pengetahuan option:selected").val());
            if (gejala7 == 0) {
                $("#pengetahuank").val("Tidak");
            } else if (gejala7 == 1) {
                $("#pengetahuank").val("Iya");
            }

            var gejala8 = parseFloat($("#bersih option:selected").val());
            if (gejala8 == 0) {
                $("#bersihk").val("Tidak");
            } else if (gejala8 == 1) {
                $("#bersihk").val("Iya");
            }

            var gejala9 = parseFloat($("#vitamin option:selected").val());
            if (gejala9 == 0) {
                $("#vitamink").val("Tidak");
            } else if (gejala9 == 1) {
                $("#vitamink").val("Iya");
            }

            var gejala10 = parseFloat($("#pasif option:selected").val());
            if (gejala10 == 0) {
                $("#pasifk").val("Tidak");
            } else if (gejala10 == 1) {
                $("#pasifk").val("Iya");
            }

            var gejala11 = parseFloat($("#nafsu option:selected").val());
            if (gejala11 == 0) {
                $("#nafsuk").val("Tidak");
            } else if (gejala11 == 1) {
                $("#nafsuk").val("Iya");
            }

            var gejala12 = parseFloat($("#perhatian option:selected").val());
            if (gejala12 == 0) {
                $("#perhatiank").val("Tidak");
            } else if (gejala12 == 1) {
                $("#perhatiank").val("Iya");
            }

            var gejala13 = parseFloat($("#kontrol option:selected").val());
            if (gejala13 == 0) {
                $("#kontrolk").val("Tidak");
            } else if (gejala13 == 1) {
                $("#kontrolk").val("Iya");
            }


            if (kelamin == "Laki-laki") {
                if (x < laki2[umur][1]) {
                    zscore = (x - laki2[umur][1]) / (laki2[umur][1] - laki2[umur][0]);
                    zscoref = zscore.toFixed(3);
                } else {
                    zscore = (x - laki2[umur][1]) / (laki2[umur][2] - laki2[umur][1]);
                    zscoref = zscore.toFixed(3);
                }
            } else {
                if (x < perempuan[umur][1]) {
                    zscore = (x - perempuan[umur][1]) / (perempuan[umur][1] - perempuan[umur][0]);
                    zscoref = zscore.toFixed(3);
                } else {
                    zscore = (x - perempuan[umur][1]) / (perempuan[umur][2] - perempuan[umur][1]);
                    zscoref = zscore.toFixed(3);
                }
            }

            if (zscore < -3.0) {
                status = "Sangat Pendek";
            } else if (zscore >= -3.0 && zscore < -2.0) {
                status = "Pendek";
            } else if (zscore > 0) {
                status = "Tinggi";
            } else {
                status = "Normal";
            }

            // Perhitungan CF
            CFG1 = CFPakar[0] * gejala1;
            CFG2 = CFPakar[1] * gejala2;
            CFG3 = CFPakar[2] * gejala3;
            CFG4 = CFPakar[3] * gejala4;
            CFG5 = CFPakar[4] * gejala5;
            CFG6 = CFPakar[5] * gejala6;
            CFG7 = CFPakar[6] * gejala7;
            CFG8 = CFPakar[7] * gejala8;
            CFG9 = CFPakar[8] * gejala9;
            CFG10 = CFPakar[9] * gejala10;
            CFG11 = CFPakar[10] * gejala11;
            CFG12 = CFPakar[11] * gejala12;
            CFG13 = CFPakar[12] * gejala13;

            if (status != "Normal") {
                CFG14 = CFPakar[13];
            } else {
                CFG14 = 0;
            }

            // CF Kombinasi 1,2
            CFH1 = CFG1 + CFG2 * (1 - CFG1);
            // CF Kombinasi 12,3
            CFH2 = CFH1 + CFG3 * (1 - CFH1);
            // CF Kombinasi 123,4
            CFH3 = CFH2 + CFG4 * (1 - CFH2);
            // CF Kombinasi 1234,5
            CFH4 = CFH3 + CFG5 * (1 - CFH3);
            // CF Kombinasi 12345,6
            CFH5 = CFH4 + CFG6 * (1 - CFH4);
            // CF Kombinasi 123456,7
            CFH6 = CFH5 + CFG7 * (1 - CFH5);
            // CF Kombinasi 1234567,8
            CFH7 = CFH6 + CFG8 * (1 - CFH6);
            // CF Kombinasi 12345678,9
            CFH8 = CFH7 + CFG9 * (1 - CFH7);
            // CF Kombinasi 123456789,10
            CFH9 = CFH8 + CFG10 * (1 - CFH8);
            // CF Kombinasi 12345678910,11
            CFH10 = CFH9 + CFG11 * (1 - CFH9);
            // CF Kombinasi 1234567891011,12
            CFH11 = CFH10 + CFG12 * (1 - CFH10);
            // CF Kombinasi 123456789101112,13
            CFH12 = CFH11 + CFG13 * (1 - CFH11);
            // CF Kombinasi 12345678910111213,14
            CFH13 = CFH12 + CFG14 * (1 - CFH12);

            CFH13f = CFH13.toFixed(4);
            persentasecf = CFH13f * 100;

            if (persentasecf >= 99) {
                kesimpulan = "Pasti Stunting"
                solusi = "1. Melakukan stimulasi dini perkembangan anak. 2. Memberikan makanan tambahan (PMT) untuk balita. 3. Rutin memantau pertumbuhan perkembangan balita. 4. Memberikan pelayanan dan perawatan kesehatan yang optimal untuk anak."
            } else if (persentasecf >= 80) {
                kesimpulan = "Kemungkinan Stunting"
                solusi = "1. Melakukan stimulasi dini perkembangan anak. 2. Memberikan makanan tambahan (PMT) untuk balita. 3. Rutin memantau pertumbuhan perkembangan balita. 4. Memberikan pelayanan dan perawatan kesehatan yang optimal untuk anak."
            } else if (persentasecf >= 60) {
                kesimpulan = "Cukup Kemungkinan Stunting"
                solusi = "1. Melakukan stimulasi dini perkembangan anak. 2. Memberikan makanan tambahan (PMT) untuk balita. 3. Rutin memantau pertumbuhan perkembangan balita. 4. Memberikan pelayanan dan perawatan kesehatan yang optimal untuk anak."
            } else if (persentasecf >= 40) {
                kesimpulan = "Sedikit Kemungkinan Stunting"
                solusi = "1. Beri ASI eksklusif sampai bayi berusia 6 bulan. 2. Dampingi ASI eksklusif dengan MPASI sehat. 3. Terus memantau tumbuh kembang anak. 4. Selalu jaga kebersihan lingkungan."
            } else if (persentasecf >= 20) {
                kesimpulan = "Kurang Kemungkinan Stunting"
                solusi = "1. Beri ASI eksklusif sampai bayi berusia 6 bulan. 2. Dampingi ASI eksklusif dengan MPASI sehat. 3. Terus memantau tumbuh kembang anak. 4. Selalu jaga kebersihan lingkungan."
            } else {
                kesimpulan = "Bukan Stunting"
                solusi = "1. Beri ASI eksklusif sampai bayi berusia 6 bulan. 2. Dampingi ASI eksklusif dengan MPASI sehat. 3. Terus memantau tumbuh kembang anak. 4. Selalu jaga kebersihan lingkungan."
            }

            $("#zscore").val(zscoref);
            $("#status").val(status);
            $("#pcf").val(persentasecf);
            $("#kesimpulan").val(kesimpulan);
            $("#zscores")[0].textContent = zscoref;
            $("#statuss")[0].textContent = "Status: " + status;
            $("#pcff")[0].textContent = "Persentase CF: " + persentasecf + "%";
            $("#kesimpulann")[0].textContent = kesimpulan;
            $("#solusi")[0].textContent = solusi;

            var myModal = new bootstrap.Modal(document.getElementById("tampilModal"), {});
            myModal.show();
        }
        let genID = () => {
            let g4 = () => {
                return Math.floor((1 + Math.random()) * 0x10000)
                    .toString(16)
                    .substring(1);
            }
            //return ID of format 'xxxx-xxxxxxxx'
            return g4()
        }

        document.getElementById("iddata").value = genID();
    </script>

</body>

</html>