
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
    <link rel="stylesheet" href="{{ asset('storage/dashboards/vendor/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/dashboards/vendor/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/dashboards/vendor/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/dashboards/vendor/glightbox/css/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/dashboards/vendor/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/dashboards/css/main.css') }}" />
</head>

<body class="index-page">



  <main class="main">



    <!-- Hero Section -->
    <section id="beranda" class="hero section position-relative">
        <div class="position-absolute top-0 start-50 translate-middle-x mt-5">
            <a href="/" >
                <img src="{{ asset('storage/assets/images/logos/siap.png') }}" style="width:140px;" data-aos-delay="50">
            </a>
        </div>
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

</body>




</html>


<!-- <h3>Data Kepala Keluarga</h3>

<p><strong>Nama:</strong> {{ $kk->nama_kepala_keluarga }}</p>
<p><strong>No KK:</strong> {{ $kk->no_kk }}</p>
<p><strong>Kode:</strong> {{ $kk->kode_unik }}</p>

<p><strong>Sub Lingkungan:</strong> 
    {{ $kk->subLingkungan->nama_sub_lingkungan ?? '-' }}
</p>

<p><strong>Lingkungan:</strong> 
    {{ $kk->subLingkungan->lingkungan->nama_lingkungan ?? '-' }}
</p>

<hr>

<h4>Anggota Keluarga</h4>

<table border="1" cellpadding="5">
    <tr>
        <th>Nama</th>
        <th>NIK</th>
        <th>Jumlah KK</th>
    </tr>

    @foreach($kk->warga as $w)
    <tr>
        <td>{{ $w->nama }}</td>
        <td>{{ $w->nik }}</td>
        <td>
            {{ $w->dasawisma->first()->balita_l ?? '-' }}
        </td>
    </tr>
    @endforeach
</table> -->