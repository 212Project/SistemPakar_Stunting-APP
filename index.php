<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="./css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./css/style.css">

  <title>Diagnosa Stunting Pada Balit</title>
</head>

<body>
  <nav id="navbar-utama" class="navbar navbar-dark bg-pink">
    <div class="container-fluid">
      <a class="navbar-brand">Sistem Pakar Diagnosa Stunting Pada Bayi</a>
      <div class="d-flex">
        <ul class="nav nav-pills">
          <li class="nav-item">
            <a href="#about" class="nav-link text-white">About</a>
          </li>
          <li class="nav-item">
            <a href="#gallery" class="nav-link text-white">Gallery</a>
          </li>
          <li class="nav-item">
            <a href="#test" class="nav-link text-white">Uji Diagnosa</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div id="slider" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/slider/1.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/slider/2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/slider/3.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
  </div>

  <div data-spy="scroll" data-target="#navbar-utama" data-offset="0">
    <section id="about">
      <div class="container my-5">
        <div class="row text-secondary">
          <h2 class="text-center">Tentang Penyakit</h2>
          <h5>Penyakit Stunting</h5>
          <p>Stunting adalah kondisi gagal pertumbuhan pada anak (pertumbuhan tubuh dan otak) akibat
            kekurangan gizi dalam waktu yang lama. Sehingga, anak lebih pendek atau perawakan pendek dari
            anak normal seusianya dan memiliki keterlambatan dalam berpikir. Umumnya disebabkan asupan makan
            yang tidak sesuai dengan kebutuhan gizi.</p>
        </div>
      </div>
    </section>

    <section id="gallery" class="bg-secondary">
      <div class="container mt-3">
        <div class="row pb-4">
          <h2 class="text-center text-white p-3">Gallery</h2>
          <div class="col-md-4 p-2">
            <div class="thumbnail">
              <img src="img/gallery/1.jpg" style="width: 100%;">
            </div>
          </div>
          <div class="col-md-4 p-2">
            <div class="thumbnail">
              <img src="img/gallery/2.jpg" style="width: 100%;">
            </div>
          </div>
          <div class="col-md-4 p-2">
            <div class="thumbnail">
              <img src="img/gallery/3.jpg" style="width: 100%;">
            </div>
          </div>
          <div class="col-md-4 p-2">
            <div class="thumbnail">
              <img src="img/gallery/4.jpeg" style="width: 100%;">
            </div>
          </div>
          <div class="col-md-4 p-2">
            <div class="thumbnail">
              <img src="img/gallery/5.jpg" style="width: 100%;">
            </div>
          </div>
          <div class="col-md-4 p-2">
            <div class="thumbnail">
              <img src="img/gallery/6.jpg" style="width: 100%;">
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php
    if (isset($_GET['pesan'])) {
      if ($_GET['pesan'] == "02") {
        echo "<script>alert('Maaf ID Anda Salah!')</script>";
      } else if ($_GET['pesan'] == "belum_login") {
        echo "<script>alert('Silahkan Masukkan ID Untuk Mengakses Laman Ini!')</script>";
      } else if ($_GET['pesan'] == "01") {
        echo "<script>alert('Data Berhasil Ditambahkan!')</script>";
      }
    }
    ?>

    <section id="test">
      <div class="container my-3">
        <div class="row text-secondary">
          <h2 class="text-center p-3">Uji Diagnosa</h2>
          <div class="shadow pt-5 px-5 pb-3 mb-3 bg-pink-light rounded">
            <div class="text-center">
              <form method="post" action="config/cek_login.php">
                <input type="text" name="kode" class="form-control text-center p-3" id="kode" placeholder="Masukkan Username Anda">
                <button type="submit" class="btn bg-pink text-white mt-3 px-5">MASUK</button>
              </form>
              <p class="mt-3">Belum Punya ID? <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">Klik Disini!</button></p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <footer class="footer">
    <div class="container">
      <span class="text-white">Sistem Pakar Diagnosa Stunting Pada Balita, Copyright 2021.</span>
    </div>
  </footer>

  <!-- Modal Tambah -->
  <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Registrasi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" action="config/tambah_ibu.php" class="form-control">
          <div class="modal-body">
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" name="id_ibu" id="id_ibu">
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Lengkap Anda">
            </div>
            <div class="form-group">
              <label>Umur</label>
              <input type="text" class="form-control" name="umur" id="umur" placeholder="Masukkan Umur Anda">
            </div>
            <div class="form-group">
              <label>Pendidikan</label>
              <select class="form-control" name="pendidikan" id="pendidikan">
                <option value="SD">SD</option>
                <option value="SMP">SMP</option>
                <option value="SMA">SMA</option>
                <option value="S1">S1</option>
                <option value="S2">S2</option>
                <option value="S3">S3</option>
              </select>
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <textarea class="form-control" name="alamat" id="alamat" rows="1"></textarea>
            </div>
            <div class="form-group">
              <label>No. Telepon</label>
              <input type="text" class="form-control" name="notlp" id="notlp" placeholder="Masukkan Nomor Telepon Anda">
            </div>
            <div class="form-group">
              <label>Nama Anak</label>
              <input type="text" class="form-control" name="nama_anak" id="nama_anak" placeholder="Masukkan Nama Anak Anda">
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select class="form-control" name="jk" id="jk">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="./js/bootstrap.bundle.min.js"></script>
</body>

</html>