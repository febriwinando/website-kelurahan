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
                    <li><a href="#artikel">Artikel</a></li>
                    <li><a href="#peraturan">Peraturan</a></li>
                    
                    <li><a href="#lapor">Kontak dan Lapor</a></li>
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
                    <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
                    <div class="company-badge mb-4">
                    <span class="material-symbols-outlined">speaker_notes</span>
                        Lapor Insiden Siber
                    </div>

                    <h1 class="mb-4">
                        Backup Today, <br>
                        <span class="accent-text">Recover Tomorrow</span>
                    </h1>

                    <p class="mb-4 mb-md-5">
                    "Hadapi Ancaman, Jangan Diam! Jika terjadi insiden siber terhadap layanan Pemerintah Kota Tebing Tinggi, segera laporkan ke TTIS untuk tindakan cepat dan tepat. Keamanan digital adalah tanggung jawab bersama!"
                    </p>

                    <div class="hero-buttons">
                        <a href="#lapor" class="btn btn-primary me-0 me-sm-2 mx-1">LAPORKAN</a>

                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
                    <img src="{{ asset('storage/dashboards/img/baru/section1.png')}}" alt="Hero Image" class="img-fluid">
                </div>
            </div>
        </div>

        <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                <div class="stat-icon">
                <span class="material-symbols-outlined">dns</span>
                </div>
                <div class="stat-content">
                    <h4>Domain</h4>
                    <p class="mb-0">tebingtinggikota.go.id</p>
                </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <span class="material-symbols-outlined">host</span>
                        </div>
                        <div class="stat-content">
                            <h4>Server</h4>
                            <p class="mb-0">Terdapat 50 Server</p>
                        </div>
                    </div>
            </div>
            <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <span class="material-symbols-outlined">vpn_lock</span>
                        </div>
                        <div class="stat-content">
                            <h4>VPN</h4>
                            <p class="mb-0">Akses Aman dan Terenkripsi</p>
                        </div>
                    </div>
            </div>
            <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <span class="material-symbols-outlined">encrypted</span>
                        </div>
                        <div class="stat-content">
                            <h4>SSL</h4>
                            <p class="mb-0">Komunikasi Terenkripsi</p>
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
            <h2 class="about-title">TTIS Tebing Tinggi</h2>
            <p class="about-description">Tim Tanggap Insiden Siber (TTIS) Pemko Tebing Tinggi adalah tim tanggap insiden keamanan siber yang dibentuk oleh Pemerintah Kota Tebing Tinggi untuk meningkatkan ketahanan digital dan mengamankan infrastruktur teknologi informasi. Kami berperan sebagai garda terdepan dalam mendeteksi, merespons, dan mengatasi insiden keamanan siber yang dapat mengancam sistem informasi di lingkungan pemerintahan dan masyarakat Kota Tebing Tinggi.</p>
            <h4 class="about-title">Visi</h4>
            <p class="about-description">Menjadi tim respons insiden keamanan siber yang andal dan proaktif dalam melindungi sistem informasi serta data digital di Kota Tebing Tinggi.</p>
            <h4 class="about-title">Misi</h4>

            <div class="row feature-list-wrapper">
              <div class="col-md-12">
                <ul class="feature-list">
                  <li><i class="bi bi-check-circle-fill"></i> Deteksi & Respons – Mengidentifikasi, menganalisis, dan menangani insiden keamanan siber dengan cepat dan tepat.</li>
                  <li><i class="bi bi-check-circle-fill"></i> Edukasi & Kesadaran – Meningkatkan kesadaran keamanan siber melalui pelatihan, seminar, dan publikasi informasi.</li>
                  <li><i class="bi bi-check-circle-fill"></i> Kolaborasi & Koordinasi – Bekerja sama dengan TTIS nasional, instansi pemerintah, serta sektor swasta dalam mitigasi ancaman siber.</li>
                  <li><i class="bi bi-check-circle-fill"></i> Perlindungan Data & Infrastruktur – Memastikan keamanan data dan infrastruktur digital melalui kebijakan dan teknologi yang tepat.</li>

                </ul>
              </div>

            </div>

          </div>

        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Features Cards Section -->
    <section id="features-cards" class="features-cards section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Implementasi TTIS Pemko Tebing Tinggi</h2>
        <p>Untuk memastikan TTIS Pemko Tebing Tinggi berfungsi secara optimal, berikut adalah pelaksanaan yang akan diterapkan:</p>
      </div><!-- End Section Title -->
      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="feature-box orange">
              <span class="material-symbols-outlined">assured_workload</span>
              <h4>Ketahanan Siber Pemerintah dan Infrastruktur Publik</h4>
              <p>TTIS bertanggung jawab dalam mendeteksi, merespons, dan memitigasi insiden keamanan siber yang mengancam sistem pemerintahan. Dengan penerapan standar keamanan dan pemantauan real-time, layanan digital seperti e-Government, Smart City, dan e-Health dapat beroperasi dengan aman dan terpercaya.</p>
            </div>
          </div><!-- End Feature Borx-->

          <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="feature-box blue">
            <span class="material-symbols-outlined">monitoring</span>
              <h4>Kepercayaan Publik & Ekonomi Digital yang Lebih Kuat</h4>
              <p>Keamanan siber yang baik akan meningkatkan kepercayaan masyarakat dan dunia usaha terhadap layanan digital. Dengan edukasi publik, audit keamanan untuk UMKM, dan kerja sama dengan sektor swasta, TTTIS dapat menjadi pilar dalam mendorong pertumbuhan ekonomi digital yang lebih aman dan berkelanjutan.</p>
            </div>
          </div><!-- End Feature Borx-->

          <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
            <div class="feature-box green">
            <span class="material-symbols-outlined">globe</span>
              <h4>Pencegahan Ancaman Global & Kejahatan Siber Nasional</h4>
              <p>Sebagai benteng pertahanan digital daerah, TTTIS akan membangun sistem deteksi dini terhadap ancaman siber, menyediakan layanan pengaduan insiden, serta berkoordinasi dengan TTIS nasional. Hal ini memastikan respons cepat terhadap serangan siber dan mendukung penegakan hukum di bidang kejahatan digital.</p>
            </div>
          </div><!-- End Feature Borx-->

          <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
            <div class="feature-box red">
            <span class="material-symbols-outlined">deployed_code_account</span>
              <h4>Peningkatan SDM & Kesadaran Keamanan Siber</h4>
              <p>TTTIS akan aktif dalam melatih dan mengembangkan talenta keamanan siber melalui pelatihan, sertifikasi, dan simulasi serangan. Dengan membangun ekosistem yang mendukung, TTTIS dapat menciptakan tenaga ahli keamanan siber lokal dan meningkatkan kesadaran masyarakat terhadap ancaman digital.</p>
            </div>
          </div><!-- End Feature Borx-->

        </div>

      </div>

    </section><!-- /Features Cards Section -->

    <!-- Features 2 Section -->
    <section id="features-2" class="features-2 section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center">

          <div class="col-lg-4">

            <div class="feature-item text-end mb-5" data-aos="fade-right" data-aos-delay="200">
              <div class="d-flex align-items-center justify-content-end gap-4">
                <div class="feature-content">
                  <h4>Gunakan Password yang Kuat dan Unik</h4>
                  <p>Kombinasikan huruf besar, huruf kecil, angka, dan simbol.<br>
                 Jangan gunakan kata sandi yang sama untuk banyak akun.</p>
                </div>
                <div class="feature-icon flex-shrink-0">
                <span class="material-symbols-outlined">lock</span>
                </div>
              </div>
            </div><!-- End .feature-item -->

            <div class="feature-item text-end mb-5" data-aos="fade-right" data-aos-delay="300">
              <div class="d-flex align-items-center justify-content-end gap-4">
                <div class="feature-content">
                  <h4>Aktifkan Autentikasi Dua Faktor (2FA) </h4>
                  <p>Tambahkan lapisan keamanan ekstra agar akun lebih sulit diretas.</p>
                </div>
                <div class="feature-icon flex-shrink-0">
                <span class="material-symbols-outlined">vpn_key</span>
                </div>
              </div>
            </div><!-- End .feature-item -->

            <div class="feature-item text-end" data-aos="fade-right" data-aos-delay="400">
              <div class="d-flex align-items-center justify-content-end gap-4">
                <div class="feature-content">
                  <h4>Waspada terhadap Phishing</h4>
                  <p>Jangan asal klik tautan atau membuka lampiran dari email dan pesan mencurigakan.</p>
                </div>
                <div class="feature-icon flex-shrink-0">
                <span class="material-symbols-outlined">destruction</span>
                </div>
              </div>
            </div><!-- End .feature-item -->

          </div>

          <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="phone-mockup text-center">
              <img src="{{ asset('storage/dashboards/img/baru/phonesec.png')}}" alt="Phone Mockup" class="img-fluid">
            </div>
          </div><!-- End Phone Mockup -->

          <div class="col-lg-4">

            <div class="feature-item mb-5" data-aos="fade-left" data-aos-delay="200">
              <div class="d-flex align-items-center gap-4">
                <div class="feature-icon flex-shrink-0">
                <span class="material-symbols-outlined">deployed_code_history</span>
                  <!-- <i class="material-icons">history</i> -->
                </div>
                <div class="feature-content">
                  <h4>Perbarui Perangkat dan Aplikasi Secara Berkala</h4>
                  <p>Pastikan sistem operasi dan aplikasi selalu dalam versi terbaru untuk menutup celah keamanan.</p>
                </div>
              </div>
            </div><!-- End .feature-item -->

            <div class="feature-item mb-5" data-aos="fade-left" data-aos-delay="300">
              <div class="d-flex align-items-center gap-4">
                <div class="feature-icon flex-shrink-0">
                <span class="material-symbols-outlined">person_alert</span>
                </div>
                <div class="feature-content">
                  <h4>Batasi Informasi Pribadi di Media Sosial</h4>
                  <p>Jangan sembarangan membagikan data sensitif seperti alamat, nomor telepon, atau identitas lainnya.</p>
                </div>
              </div>
            </div><!-- End .feature-item -->

            <div class="feature-item" data-aos="fade-left" data-aos-delay="400">
              <div class="d-flex align-items-center gap-4">
                <div class="feature-icon flex-shrink-0">
                <span class="material-symbols-outlined">health_and_safety</span>
                </div>
                <div class="feature-content">
                  <h4>Gunakan Jaringan Internet yang Aman</h4>
                  <p>Hindari akses data sensitif melalui Wi-Fi publik tanpa VPN.</p>
                </div>
              </div>
            </div><!-- End .feature-item -->

          </div>
          
        </div>

      </div>

    </section><!-- /Features 2 Section -->


    <!-- Testimonials Section -->
    <section id="artikel" class="testimonials section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Artikel</h2>
        <p>Artikel seputar keamanan informasi dan siber.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row g-5">
          {{-- @php $delay = 100; @endphp
          @foreach ($artikels as $index => $artikel)
            <div class="col-lg-3" data-aos="fade-up" data-aos-delay="{{ $delay }}">
              <div class="testimonial-item">
                <img src="{{ asset($artikel->gambar)}}" class="testimonial-img mb-3 wv-100" alt="">
                <h3>{{ $artikel->judul}}</h3>
                <div class="artikel-sumber text-body-tertiary mb-3" style="font-size:12px;">Sumber: {{ $artikel->sumber }}</div>

                <p class="mb-2">
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>{!! \Illuminate\Support\Str::limit(strip_tags($artikel->konten), 50) !!}</span>
                  <div class="d-none artikel-konten">{!! $artikel->konten !!}</div>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
                <a href="#{{$artikel->id}}" class="read-more d-inline-flex align-items-center gap-1 text-decoration-none mt-2">
                  <span class="material-symbols-outlined">open_in_full</span>
                  <span>Baca</span>
                </a>
              </div>
            </div>
            @php
            $delay += 100;
            if (($index + 1) % 4 === 0) {
                $delay = 100;
            }
            @endphp
          @endforeach --}}

        </div>
        <div class="mt-3">
          {{-- {{ $artikels->links() }} --}}
        </div>
      </div>

    </section>
<!-- Modal Artikel -->
    <div class="modal fade " id="artikelModal" tabindex="-1" aria-labelledby="artikelModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="artikelModalLabel">Judul Artikel</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
          </div>
          <div class="modal-body">
            <img id="modalGambar" class="img-fluid rounded mb-3" style="margin:auto;" src="" alt="Gambar Artikel">
            <div class="fs-6 fw-light text-body-tertiary mb-3" id="sumberArtikel"></div>
            <div id="kontenArtikel"></div>
          </div>
        </div>
      </div>
    </div>

    
    <section id="peraturan" class="services section light-background">


      <div class="container section-title" data-aos="fade-up">
        <h2>Kebijakan</h2>
        <p>Halaman ini berisi aturan dan pedoman keamanan informasi pemerintah.</p>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-4">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-card d-flex">
              <div class="icon flex-shrink-0">
              <span class="material-symbols-outlined">gavel</span>
              </div>
              <div>
                <h3>Peraturan Walikota Keamanan Informasi</h3>
                <p>Peraturan Walikota tentang Keamanan Informasi merupakan regulasi yang mengatur perlindungan dan pengelolaan informasi di lingkungan Pemerintah Kota guna mencegah ancaman siber, kebocoran data, serta penyalahgunaan informasi. Peraturan ini menetapkan standar keamanan sistem elektronik, tata kelola akses, serta kewajiban perangkat daerah dalam menjaga kerahasiaan, integritas, dan ketersediaan informasi.</p>
                <a href="" onclick="unduhPDF('perwa-pedoman-pelaksanaan-manajemen-keamanan-informasi-spbe.pdf')" class="read-more"><span class="material-symbols-outlined">file_save</span> Unduh </a>
                <!-- <button class="btn btn-outline-primary" onclick="unduhPDF('perwa-pedoman-pelaksanaan-manajemen-keamanan-informasi-spbe.pdf')">
                  <i class="mdi mdi-download"></i> Unduh PDF
                </button> -->
              </div>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-card d-flex">
              <div class="icon flex-shrink-0">
              <span class="material-symbols-outlined">drag_indicator</span>
              </div>
              <div>
                <h3>SOP Keamanan Informasi</h3>
                <p>SOP Keamanan Informasi adalah pedoman operasional yang mengatur prosedur perlindungan, pengelolaan, dan pemantauan keamanan informasi di lingkungan Pemerintah Kota. SOP ini mencakup standar pengamanan sistem elektronik, pengelolaan akses pengguna, penanganan insiden siber, serta mitigasi risiko kebocoran data.</p>
                <a href="" onclick="unduhPDF('sop-manajemen-keamanan-informasi.pdf')" class="read-more"><span class="material-symbols-outlined">file_save</span> Unduh </a>
              </div>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-card d-flex">
              <div class="icon flex-shrink-0">
              <span class="material-symbols-outlined">person_apron</span>
              </div>
              <div>
                <h3>Surat Keputusan Walikota TTIS</h3>
                <p>Surat Keputusan Walikota tentang TTIS merupakan dokumen resmi yang menetapkan pembentukan Tim Tanggap Insiden Siber (TTIS) di lingkungan Pemerintah Kota. SK ini mengatur struktur organisasi, tugas, dan tanggung jawab TTIS dalam mendeteksi, merespons, serta memitigasi insiden keamanan siber yang dapat mengancam sistem informasi pemerintah daerah.</p>
                <a href="" onclick="unduhPDF('sk-ttis-tebing-tinggi.pdf')" class="read-more"><span class="material-symbols-outlined">file_save</span> Unduh </a>
              </div>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-card d-flex">
              <div class="icon flex-shrink-0">
                <i class="bi bi-clipboard-data"></i>
              </div>
              <div>
                <h3>SOP Spesifikasi Infrastruktur</h3>
                <p>SOP Spesifikasi Infrastruktur adalah pedoman teknis yang menetapkan standar dan persyaratan infrastruktur teknologi informasi di lingkungan Pemerintah Kota. SOP ini mencakup spesifikasi perangkat keras, perangkat lunak, jaringan, serta sistem keamanan yang harus dipenuhi untuk memastikan kinerja, ketersediaan, dan perlindungan data dalam layanan pemerintahan. Selain itu, SOP ini juga mengatur tata kelola pemeliharaan, peningkatan kapasitas, serta prosedur mitigasi risiko terhadap gangguan atau ancaman siber guna mendukung operasional yang andal dan aman.</p>
                <a href="#" class="read-more"><span class="material-symbols-outlined">file_save</span> Unduh </a>
              </div>
            </div>
          </div>

        </div>

      </div>

    </section>


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
                  <h4>Alamat Kantor</h4>
                  <p>Jl. Imam Bonjol No.1A, Satria, Kec. Padang Hilir,</p>  
                  <p>Kota Tebing Tinggi, Sumatera Utara</p>
                </div>
              </div>
              <div class="info-item" data-aos="fade-up" data-aos-delay="500">
                <div class="icon-box">
                <span class="material-symbols-outlined">mail</span>
                </div>
                <div class="content">
                  <h4>Email</h4>
                  <p>diskominfo@tebingtinggikota.go.id</p>
                  <p>info@tebingtinggikota.go.id</p>
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
                <h3>Laporkan Insiden Siber</h3>
                <p>Jika Anda menemukan atau mengalami insiden siber pada layanan dan sistem informasi milik Pemerintah Kota Tebing Tinggi, segera laporkan ke TTIS Pemko Tebing Tinggi untuk tindakan cepat dan penanganan yang tepat.</p>
                {{-- <form action="{{ route('send.email') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row gy-4">
                    <div class="col-md-6">
                        <input type="text" name="pelapor" class="form-control" placeholder="Pelapor" required>
                    </div>
                    <div class="col-md-6">
                        <input type="email" name="email" class="form-control" placeholder="Email Pelapor" required>
                    </div>
                    <div class="col-12">
                        <input type="text" name="subjek" class="form-control" placeholder="Insiden Terjadi" required>
                    </div>
                    <div class="col-12">
                        <textarea name="isi" class="form-control" rows="6" placeholder="Keterangan" required></textarea>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="file" name="attachment[]" id="formFileMultiple" multiple>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn">Laporkan</button>
                    </div>
                    </div>
                </form> --}}


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