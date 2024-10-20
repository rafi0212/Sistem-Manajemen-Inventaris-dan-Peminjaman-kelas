<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Acdinvent</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
  <link href="styles.css" rel="stylesheet">
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Acdinvent</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto"> <!-- Menu-menu sebelumnya dipindahkan ke kanan -->
        <li class="nav-item">
          <a class="nav-link" href="#cover">Halaman Utama</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact">Kontak</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link btn btn-primary btn-sm" href="login.php">Login</a>
        </li>
      </ul>
    </div>
</nav>

<!-- Cover Section -->
<section id="cover" class="text-center text-white">
  <div class="container">
    <h1 class="display-4" id="welcomeHeader">Selamat datang di Acdinvent</h1>
    <p class="lead" id="subHeader">Kemanjuan teknologi untuk integritas</p>
    <a href="#" class="btn btn-primary btn-lg" id="moreInfoBtn">More info</a>
  </div>
</section>

<!-- About Section -->
<!--<section id="about">
  <div class="container">
    <h2 class="text-center mb-4">Tentang Kami</h2>
    <p class="text-center mb-5">Dias Mechanon bertujuan untuk menghadirkan pengalaman pembelajaran yang berfokus pada pengembangan keterampilan praktis, peningkatan kolaborasi antar mahasiswa, dan penerapan teknologi terkini dalam proses belajar mengajar. Dengan fitur-fitur inovatif seperti ruang kelas virtual, perpustakaan digital, dan forum diskusi, platform ini mendorong partisipasi aktif mahasiswa dalam pembelajaran. Dosen juga mendapat manfaat dengan kemudahan manajemen kelas dan memberikan umpan balik yang lebih efisien. Sebagai jawaban atas tantangan pendidikan modern, Dias Mechanon siap memimpin revolusi pendidikan tinggi menuju masa depan yang lebih cerah dan inklusif.</p>

    <div class="row text-center mt-4">
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="developer-card">
            <img src="picts/logo1.png" class="card-img-top" alt="Developer 1">
          </div>
          <div class="card-body">
            <h5 class="card-title">Fajar Shadiq Saputra</h5>
            <p class="card-text">Frontend Developer</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="developer-card">
            <img src="picts/developer2.jpg" class="card-img-top" alt="Developer 2">
          </div>
          <div class="card-body">
            <h5 class="card-title">Muhammad Rafi Afriza</h5>
            <p class="card-text">UI/UX Designer</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="developer-card">
            <img src="picts/developer3.jpg" class="card-img-top" alt="Developer 3">
          </div>
          <div class="card-body">
            <h5 class="card-title">Alvaro Muyassar</h5>
            <p class="card-text">Backend Developer</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>-->

<!-- News Section -->
<!--<section id="news">
  <div class="container">
    <h2 class="text-center mb-4">Berita Terbaru</h2>
    <div class="row">
      <div class="col-md-4">
        <div class="card mb-4">
          <img src="picts/news1.jpg" class="card-img-top" alt="Image Caption">
          <div class="card-body">
            <h5 class="card-title">Peluncuran Produk Baru</h5>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis libero id eros vehicula.</p>
            <p class="card-date">June 2, 2024</p>
            <a href="#" class="btn btn-primary">Selengkapnya</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <img src="picts/news1.jpg" class="card-img-top" alt="Image Caption">
          <div class="card-body">
            <h5 class="card-title">Kemitraan Strategis</h5>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis libero id eros vehicula.</p>
            <p class="card-date">June 2, 2024</p>
            <a href="#" class="btn btn-primary">Selengkapnya</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <img src="picts/news1.jpg" class="card-img-top" alt="Image Caption">
          <div class="card-body">
            <h5 class="card-title">Kemitraan Strategis</h5>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis libero id eros vehicula.</p>
            <p class="card-date">June 2, 2024</p>
            <a href="#" class="btn btn-primary">Selengkapnya</a>
          </div>
        </div>
      </div>
      <div class="col-md-12 btn-lihat-semua">
        <a href="#" class="lhtsma">See more >>></a>
      </div>
    </div>
  </div>
</section>-->

<!-- Contact Section -->
<section id="contact">
  <div class="container">
    <h2 class="text-center mb-4">Kontak Kami</h2>
    <div class="row">
      <div class="col-md-6">
        <h5>Informasi Kontak</h5>
        <p><i class="fas fa-map-marker-alt"></i> Jl. Letjen Suprapto No.26, Cemp. Putih Tim., Kec. Cemp. Putih, <br>Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10510</p>
        <p><i class="fas fa-phone"></i> +62 123 4567 890</p>
        <p><i class="fas fa-envelope"></i> acdinvent@gmail.com</p>
      </div>
      <div class="col-md-6">
        <h5>Feedback</h5>
        <form>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Nama">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" placeholder="Email">
          </div>
          <div class="form-group">
            <textarea class="form-control" rows="5" placeholder="Pesan"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-light text-center py-3">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="social-icons">
          <a href="#"><i class="fab fa-google"></i></a>
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="https://wa.me/1234567890"><i class="fab fa-whatsapp"></i></a>
          <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
        <p>&copy; 2024 Acdinvent. All Rights Reserved.</p>
      </div>
    </div>
  </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="script.js"></script>
</body>
</html>
