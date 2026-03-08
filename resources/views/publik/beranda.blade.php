<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>SIAP PKK</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="icon" type="image/png" href="{{ asset('storage/assets/images/logos/siap.png') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('storage/dashboards/vendor/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/dashboards/vendor/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/dashboards/vendor/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/dashboards/vendor/glightbox/css/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/dashboards/vendor/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/dashboards/css/main.css') }}" />
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="header-container ">
            <div class="container position-relative d-flex align-items-center justify-content-between">
                <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
                    {{-- <h1 class="sitename btn-getstarted">SI-AP Bandarsono</h1> --}}
                    <img src="{{ asset('storage/assets/images/logos/siap.png') }}" alt="" style="width:120px;">
                </a>
                <nav id="navmenu" class="navmenu">
                    <ul>
                    <li><a href="#beranda" class="active">Beranda</a></li>
                    <li><a href="#profil">Profil</a></li>
                    <li><a href="#tugas">Tugas</a></li>
                    <li><a href="#program">Program</a></li>
                    
                    <li><a href="#lapor">Kontak</a></li>
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>
            </div>
        </div>
    </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="beranda" class="hero section">
        <div class="background-hero" data-aos-delay="50"></div>
        <div class="background-hero-line" data-aos-delay="100"></div>

        <div class="container" data-aos="fade-up" data-aos-delay="150">

            <div class="row align-items-center">
                          <div class="col-lg-6">
                <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
                    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img src="{{ asset('storage/assets/images/products/gb1.jpg') }}" class="d-block w-100" alt="pkk1">
                        </div>
                        <div class="carousel-item">
                          <img src="{{ asset('storage/assets/images/products/bg2.jpg') }}" class="d-block w-100" alt="pkk2">
                        </div>
                        <div class="carousel-item">
                          <img src="{{ asset('storage/assets/images/products/bg3.jpg') }}" class="d-block w-100" alt="pkk3">
                        </div>
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
                    <!-- <img src="{{ asset('storage/dashboards/img/baru/section1.png')}}" alt="Hero Image" class="img-fluid"> -->
                </div>
            </div>
                <div class="col-lg-6">
                    <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
                    <h1 class="mb-4">
                        PKK
                        <span class="accent-text">Bandarsono</span>
                    </h1>

                    <p class="mb-4 mb-md-5">
                    SI-AP Bandarsono (Sistem Informasi Administrasi dan Pelayanan PKK Bandarsono) adalah platform digital yang digunakan untuk memudahkan pengelolaan administrasi PKK, pendataan warga, serta pelaporan kegiatan secara lebih tertib, cepat, dan terintegrasi di Kelurahan Bandarsono.
                    </p>

                    <div class="hero-buttons">
                        <a href="#lapor" class="btn btn-primary me-0 me-sm-2 mx-1">Hubungi</a>

                    </div>
                </div>
            </div>


        </div>

        <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                <div class="stat-icon">
                <span class="material-symbols-outlined"><img src="{{ asset('storage/assets/svg/team.svg') }}" style="width:40px;height:40px;"></span>
                </div>
                <div class="stat-content">
                    <h4>Anggota PKK</h4>
                    <p class="mb-0">38 anggota/pengurus</p>
                </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <span class="material-symbols-outlined"><img src="{{ asset('storage/assets/svg/map.svg') }}" style="width:40px;height:40px;"></span>
                        </div>
                        <div class="stat-content">
                            <h4>Luas Wilayah</h4>
                            <p class="mb-0">1,3970 km<sup>2</sup></p>
                        </div>
                    </div>
            </div>
            <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <span class="material-symbols-outlined"><img src="{{ asset('storage/assets/svg/district.svg') }}" style="width:40px;height:40px;"></span>
                        </div>
                        <div class="stat-content">
                            <h4>Lingkungan</h4>
                            <p class="mb-0">9 Lingkungan</p>
                        </div>
                    </div>
            </div>
            <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <span class="material-symbols-outlined"><img src="{{ asset('storage/assets/svg/community.svg') }}" style="width:40px;height:40px;"></span>
                        </div>
                        <div class="stat-content">
                            <h4>Dasawisma</h4>
                            <p class="mb-0">Jumlah Dasawisma</p>
                        </div>
                    </div>
            </div>
        </div>

      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="profil" class="about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 align-items-center justify-content-between">

          <div class="col-xl-12" data-aos="fade-up" data-aos-delay="200">
            <span class="about-meta">Tentang Kami</span>
            <h2 class="about-title">Visi Umum PKK Kelurahan</h2>
            <p class="about-description">Terwujudnya keluarga yang beriman dan bertaqwa kepada Tuhan Yang Maha Esa, berakhlak mulia, sehat, sejahtera, maju, dan mandiri, serta memiliki kesetaraan gender, kesadaran hukum, dan kepedulian terhadap lingkungan</p>
            <h2 class="about-title">Misi Umum PKK Kelurahan</h2>
            <div class="row feature-list-wrapper">
              <div class="col-md-12">
                <ul class="feature-list">
                  <li><i class="bi bi-check-circle-fill"></i> Meningkatkan penghayatan nilai-nilai Pancasila, gotong royong, dan sikap saling menghargai dalam kehidupan keluarga dan masyarakat.</li>
                  <li><i class="bi bi-check-circle-fill"></i> Meningkatkan kualitas hidup keluarga di bidang pangan, sandang, perumahan, pendidikan, dan kesehatan.</li>
                  <li><i class="bi bi-check-circle-fill"></i> Mengembangkan potensi ekonomi keluarga melalui pelatihan keterampilan dan pengembangan koperasi atau usaha kecil.</li>
                  <li><i class="bi bi-check-circle-fill"></i> Menumbuhkan kesadaran akan pentingnya kelestarian lingkungan dan perencanaan keluarga sehat.</li>
                  <li><i class="bi bi-check-circle-fill"></i> Mengelola kegiatan PKK secara terstruktur dan sesuai dengan kebutuhan masyarakat lokal.</li>

                </ul>
              </div>
            </div>
            <p class="about-description">Bertujuan memberdayakan keluarga agar dapat hidup sejahtera, maju, dan mandiri, serta terwujudnya keluarga yang beriman bertaqwa, berakhlak mulia, sehat, serta memiliki kesetaraan gender dan kesadaran hukum serta lingkungan.</p>
            <h2 class="about-title">Tujuan Utama</h2>
            <p class="about-description">Bertujuan memberdayakan keluarga agar dapat hidup sejahtera, maju, dan mandiri, serta terwujudnya keluarga yang beriman bertaqwa, berakhlak mulia, sehat, serta memiliki kesetaraan gender dan kesadaran hukum serta lingkungan.</p>
            <h4 class="about-title">Peran dan Fungsi</h4>
            <div class="row feature-list-wrapper">
              <div class="col-md-12">
                <ul class="feature-list">
                  <li><i class="bi bi-check-circle-fill"></i> ⁠Sebagai mitra kerja pemerintah kelurahan dan organisasi kemasyarakatan, membantu dalam meningkatkan kesejahteraan keluarga dan menumbuhkan potensi perempuan untuk meningkatkan pendapatan keluarga.</li>
                  <li><i class="bi bi-check-circle-fill"></i> ⁠Berfungsi sebagai fasilitator, perencana, pelaksana, pengendali, pembina, penyuluh, dan motivator dalam menjalankan program PKK, serta menampung dan menyalurkan aspirasi masyarakat.</li>
                </ul>
              </div>
            </div>
            

          </div>

        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Features Cards Section -->
    <section id="tugas" class="features-cards section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Tugas Khusus</h2>
        <p>Berikut merupakan empat tugas khusus yang menjadi bagian dari pelaksanaan kegiatan Tim Penggerak PKK Kelurahan Bandarsono dalam mendukung pemberdayaan dan kesejahteraan keluarga.</p>
      </div><!-- End Section Title -->
      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="feature-box orange">
              <!-- <span class="material-symbols-outlined">assured_workload</span> -->
              <span class="material-symbols-outlined"><img src="{{ asset('storage/assets/svg/planning.svg') }}" style="width:60px;height:60px;color:#edb86e;"></span>

              <h4>Perencanaan Program Kerja</h4>
              <p>Menyusun rencana kerja sesuai dengan kebijakan daerah dan melaksanakannya sesuai jadwal</p>
            </div>
          </div><!-- End Feature Borx-->

          <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="feature-box blue">
            <!-- <span class="material-symbols-outlined">monitoring</span> -->
              <span class="material-symbols-outlined"><img src="{{ asset('storage/assets/svg/teamwork.svg') }}" style="width:60px;height:60px;color:#edb86e;"></span>
              <h4>Pemberdayaan dan Penggerakan Masyarakat</h4>
              <p>Menyuluh dan menggerakkan masyarakat di tingkat RW, RT, dan dasa wisma, serta menggali dan mengembangkan potensi keluarga</p>
            </div>
          </div><!-- End Feature Borx-->

          <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
            <div class="feature-box green">
            <!-- <span class="material-symbols-outlined">globe</span> -->
              <span class="material-symbols-outlined"><img src="{{ asset('storage/assets/svg/education.svg') }}" style="width:60px;height:60px;color:#edb86e;"></span>

              <h4>Pembinaan dan Kolaborasi Program</h4>
              <p>Melaksanakan penyuluhan, pembinaan, serta berpartisipasi dalam program instansi terkait kesejahteraan keluarga</p>
            </div>
          </div><!-- End Feature Borx-->

          <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
            <div class="feature-box red">
            <!-- <span class="material-symbols-outlined">deployed_code_account</span> -->
              <span class="material-symbols-outlined"><img src="{{ asset('storage/assets/svg/document.svg') }}" style="width:60px;height:60px;color:#edb86e;"></span>

              <h4>Administrasi dan Pelaporan Kegiatan</h4>
              <p>Membuat laporan kegiatan dan menjalankan administrasi yang tertib</p>
            </div>
          </div><!-- End Feature Borx-->

        </div>

      </div>

    </section><!-- /Features Cards Section -->

    <!-- Features 2 Section -->
    <section id="program" class="features-2 section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="container section-title" data-aos="fade-up">
          <h2>10 Program Pokok</h2>
        </div>
        <div class="row align-items-center">

          <div class="col-lg-4">

            <div class="feature-item text-end mb-5" data-aos="fade-right" data-aos-delay="200">
              <div class="d-flex align-items-center justify-content-end gap-4">
                <div class="feature-content">
                  <h4>Penghayatan Pancasila</h4>
                  <p>Kegiatan penyuluhan tentang nilai-nilai Pancasila, upacara peringatan hari besar nasional, serta kegiatan keagamaan bersama.</p>
                </div>
                <div class="feature-icon flex-shrink-0">
                <span class="material-symbols-outlined"><img src="{{ asset('storage/assets/svg10/garuda.svg') }}" style="width:60px;height:60px;color:#edb86e;"></span>
                </div>
              </div>
            </div>

            <div class="feature-item text-end mb-5" data-aos="fade-right" data-aos-delay="300">
              <div class="d-flex align-items-center justify-content-end gap-4">
                <div class="feature-content">
                  <h4>Pendidikan dan Keterampilan</h4>
                  <p>Pelatihan keterampilan seperti menjahit, memasak, membuat kerajinan tangan, atau mengelola usaha kecil; juga penyuluhan tentang pentingnya pendidikan bagi anak-anak dan keluarga</p>
                </div>
                <div class="feature-icon flex-shrink-0">
                <span class="material-symbols-outlined"><img src="{{ asset('storage/assets/svg10/learning.svg') }}" style="width:60px;height:60px;color:#034971;"></span>
                </div>
              </div>
            </div><!-- End .feature-item -->

            <div class="feature-item text-end mb-5" data-aos="fade-right" data-aos-delay="300">
              <div class="d-flex align-items-center justify-content-end gap-4">
                <div class="feature-content">
                  <h4>Kesehatan</h4>
                  <p>Posyandu untuk anak dan ibu hamil, penyuluhan tentang pola makan sehat, penanaman kesadaran akan kesehatan reproduksi, serta kegiatan pemeriksaan kesehatan massal</p>
                </div>
                <div class="feature-icon flex-shrink-0">
                <span class="material-symbols-outlined"><img src="{{ asset('storage/assets/svg10/health.svg') }}" style="width:60px;height:60px;color:#034971;"></span>
                </div>
              </div>
            </div><!-- End .feature-item -->

            <div class="feature-item text-end mb-5" data-aos="fade-right" data-aos-delay="400">
              <div class="d-flex align-items-center justify-content-end gap-4">
                <div class="feature-content">
                  <h4>Pangan</h4>
                  <p>Pembuatan makanan olahan lokal, pelatihan budidaya tanaman sayuran atau hewan ternak skala kecil, serta penyuluhan tentang gizi seimbang</p>
                </div>
                <div class="feature-icon flex-shrink-0">
                <span class="material-symbols-outlined"><img src="{{ asset('storage/assets/svg10/agriculture.svg') }}" style="width:60px;height:60px;color:#034971;"></span>
                </div>
              </div>
            </div>

            <div class="feature-item text-end mb-5" data-aos="fade-right" data-aos-delay="400">
              <div class="d-flex align-items-center justify-content-end gap-4">
                <div class="feature-content">
                  <h4>Sandang</h4>
                  <p>Penyuluhan tentang perawatan pakaian, pembuatan pakaian atau aksesoris, serta kegiatan pengumpulan dan pembagian pakaian bekas yang masih layak pakai</p>
                </div>
                <div class="feature-icon flex-shrink-0">
                <span class="material-symbols-outlined"><img src="{{ asset('storage/assets/svg10/clothes.svg') }}" style="width:60px;height:60px;color:#034971;"></span>
                </div>
              </div>
            </div><!-- End .feature-item -->

          </div>

          <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="phone-mockup text-center">
              <img src="{{ asset('storage/assets/images/logos/logo_pkk.png')}}" alt="Phone Mockup" class="img-fluid">
            </div>
          </div><!-- End Phone Mockup -->

          <div class="col-lg-4">

            <div class="feature-item mb-5" data-aos="fade-left" data-aos-delay="200">
              <div class="d-flex align-items-center gap-4">
                <div class="feature-icon flex-shrink-0">
                <span class="material-symbols-outlined"><img src="{{ asset('storage/assets/svg10/house.svg') }}" style="width:60px;height:60px;color:#f6c103;"></span>
                  <!-- <i class="material-icons">history</i> -->
                </div>
                <div class="feature-content">
                  <h4>Perumahan dan Tata Laksana Rumah Tangga</h4>
                  <p>Penyuluhan tentang manajemen keuangan rumah tangga, penataan ruang hunian yang sehat, serta kegiatan gotong royong membersihkan lingkungan rumah atau wilayah RT/RW</p>
                </div>
              </div>
            </div><!-- End .feature-item -->

            <div class="feature-item mb-5" data-aos="fade-left" data-aos-delay="300">
              <div class="d-flex align-items-center gap-4">
                <div class="feature-icon flex-shrink-0">
                <span class="material-symbols-outlined"><img src="{{ asset('storage/assets/svg10/environment.svg') }}" style="width:60px;height:60px;color:#f6c103;"></span>
                </div>
                <div class="feature-content">
                  <h4>Kelestarian Lingkungan Hidup</h4>
                  <p>Penanaman pohon, pembuatan taman keluarga, penyuluhan tentang pengelolaan sampah, serta kegiatan pembersihan sungai atau kawasan umum</p>
                </div>
              </div>
            </div><!-- End .feature-item -->

            <div class="feature-item mb-5" data-aos="fade-left" data-aos-delay="400">
              <div class="d-flex align-items-center gap-4">
                <div class="feature-icon flex-shrink-0">
                <span class="material-symbols-outlined"><img src="{{ asset('storage/assets/svg10/teamwork.svg') }}" style="width:60px;height:60px;color:#f6c103;"></span>
                </div>
                <div class="feature-content">
                  <h4>Gotong Royong</h4>
                  <p>Kegiatan kerja bakti bersama masyarakat untuk memperbaiki fasilitas umum seperti jalan kecil, tempat ibadah, atau taman; juga acara silaturahmi antar keluarga</p>
                </div>
              </div>
            </div>
            <div class="feature-item mb-5" data-aos="fade-left" data-aos-delay="300">
              <div class="d-flex align-items-center gap-4">
                <div class="feature-icon flex-shrink-0">
                <span class="material-symbols-outlined"><img src="{{ asset('storage/assets/svg10/finance.svg') }}" style="width:60px;height:60px;color:#f6c103;"></span>
                </div>
                <div class="feature-content">
                  <h4>Pengembangan Koperasi</h4>
                  <p>Pendirian atau pengembangan koperasi simpan pinjam atau koperasi produk lokal untuk meningkatkan ekonomi keluarga</p>
                </div>
              </div>
            </div><!-- End .feature-item -->

            <div class="feature-item mb-5" data-aos="fade-left" data-aos-delay="400">
              <div class="d-flex align-items-center gap-4">
                <div class="feature-icon flex-shrink-0">
                <span class="material-symbols-outlined"><img src="{{ asset('storage/assets/svg10/famili.svg') }}" style="width:60px;height:60px;color:#f6c103;"></span>
                </div>
                <div class="feature-content">
                  <h4>Perencanaan Sehat</h4>
                  <p>Penyuluhan tentang keluarga berencana, hak dan kewajiban keluarga, serta kesetaraan gender dalam rumah tangga</p>
                </div>
              </div>
            </div><!-- End .feature-item -->

          </div>
          
        </div>

      </div>

    </section><!-- /Features 2 Section -->


    <section id="lapor" class="contact section light-background">


      <div class="container section-title" data-aos="fade-up">
        <h2>Kontak</h2>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-4 g-lg-5">
          <div class="col-lg-5">
            <div class="info-box" data-aos="fade-up" data-aos-delay="200">
              <h3>Infromasi Kontak</h3>
              <p></p>

              <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box">
                <span class="material-symbols-outlined">location_on</span>
                </div>
                <div class="content">
                  <h4>Alamat Kantor Lurah Bandarsono</h4>
                  <p>Jl. Damai No. 8, Bandar Sono, Kec. Padang Hulu</p>  
                  <p>Kota Tebing Tinggi, Sumatera Utara - 20631</p>
                </div>
              </div>
              <div class="info-item" data-aos="fade-up" data-aos-delay="500">
                <div class="icon-box">
                <span class="material-symbols-outlined">mail</span>
                </div>
                <div class="content">
                  <h4>Email</h4>
                  <p>ppkbandarsono@gmail.com</p>
                  <!-- <p>info@tebingtinggikota.go.id</p> -->
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-7">


            <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
            @if (session('lapor_success'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert" id="laporAlert">
                {{ session('lapor_success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
                <h3>Semangat PKK Bandarsono</h3>
                <p>PKK Bandarsono hadir sebagai penggerak kebaikan di tengah masyarakat. Dengan semangat kebersamaan dan gotong royong, kita bergandengan tangan membangun keluarga yang kuat, sehat, dan sejahtera, demi mewujudkan masa depan yang lebih baik bagi generasi yang akan datang.</p>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer pb-5">

    <div class="container footer-top">
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><span class="material-symbols-outlined">arrow_upward</span></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('storage/dashboards/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('storage/dashboards/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('storage/dashboards/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('storage/dashboards/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('storage/dashboards/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('storage/dashboards/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  
  <!-- Main JS File -->
  <script src="{{asset('storage/dashboards/js/main.js')}}"></script>

  <!-- <script src="assets/js/main.js"></script> -->

</body>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const artikelLinks = document.querySelectorAll('.read-more');

    artikelLinks.forEach(link => {
      link.addEventListener('click', function (e) {
        e.preventDefault();

        const parent = this.closest('.testimonial-item');
        const judul = parent.querySelector('h3').innerText;
        const sumber = parent.querySelector('.artikel-sumber').innerHTML;
        const konten = parent.querySelector('.artikel-konten').innerHTML;
        const gambarSrc = parent.querySelector('img').getAttribute('src');

        document.getElementById('artikelModalLabel').innerText = judul;
        document.getElementById('sumberArtikel').innerHTML = sumber;
        document.getElementById('kontenArtikel').innerHTML = konten;
        document.getElementById('modalGambar').setAttribute('src', gambarSrc);

        const modal = new bootstrap.Modal(document.getElementById('artikelModal'));
        modal.show();
      });
    });
  });

</script>

<script>
  function unduhPDF(filename) {
    fetch(`/unduh-dokumen/${filename}`, {
      method: 'GET',
      headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'Accept': 'application/pdf'
      }
    })
    .then(response => {
      if (!response.ok) {
        throw new Error('Gagal mengunduh file');
      }
      return response.blob();
    })
    .then(blob => {
      const url = window.URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.href = url;
      a.download = filename;
      document.body.appendChild(a);
      a.click();
      a.remove();
      window.URL.revokeObjectURL(url);
    })
    .catch(err => {
      alert('Terjadi kesalahan saat mengunduh file: ' + err.message);
    });
  }
</script>


</html>