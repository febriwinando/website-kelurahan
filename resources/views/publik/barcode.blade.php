
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
                <div class="col-lg-12 mb-5">
                    <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
                        <h1 class="mb-4">
                            Data Kepala Keluarga
                            <span class="accent-text">{{ $kk->nama_kepala_keluarga }}</span>
                        </h1>
                        <div class="hero-buttons">
                            <span class="btn btn-primary me-0 me-sm-2 mx-1">Lingkungan: {{ $kk->subLingkungan->nama_sub_lingkungan ?? '-' }} - {{ $kk->subLingkungan->lingkungan->nama_lingkungan ?? '-' }}</span>

                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-lg-12 mb-5">
                                        
                    <h4>Tabel Keluarga</h4>

                    <table class="table table-light table-striped-columns table-hover">
                        <tr class="table-info text-center align-middle">
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Usia</th>
                            <th>Pendidikan</th>
                            <th>Pekerjaan</th>
                            <th>Akseptor KB</th>
                            <th>Aktif Posyandu</th>
                            <th>Mengikuti BKB</th>
                            <th>Memiliki Tabungan</th>
                            <th>Ikut Kelompok Belajar</th>
                            <th>Ikut PAUD</th>
                            <th>Ikut Koperasi</th>
                        </tr>

                        @foreach($kk->warga as $w)
                        <tr>
                            <td>{{ substr($w->nama, 0, 2) . str_repeat('*', max(strlen($w->nama) - 4, 0)) . substr($w->nama, -2) }}</td>
                            <td class="text-center">{{ $w->jenis_kelamin }}</td>
                            <td class="text-center">{{ $w->usia }} tahun</td>
                            <td class="text-center">{{ $w->pendidikan }}</td>
                            <td class="text-center">{{ $w->pekerjaan }}</td>
                            <td class="text-center">
                                @if($w->akseptor_kb == 1)
                                    Ya
                                @else
                                    Tidak    
                                @endif
                            </td>
                            <td class="text-center">
                                @if($w->aktif_posyandu == 1)
                                    Ya
                                @else
                                    Tidak    
                                @endif
                            </td>
                            <td class="text-center">
                                @if($w-> ikut_bkb == 1)
                                    Ya
                                @else
                                    Tidak    
                                @endif
                            </td>
                            <td class="text-center">
                                @if($w->memiliki_tabungan == 1)
                                    Ya
                                @else
                                    Tidak    
                                @endif
                            </td>
                            <td class="text-center">
                                @if($w->ikut_kelompok_belajar == 1)
                                    Ya
                                @else
                                    Tidak    
                                @endif
                            </td>
                            <td class="text-center">
                                @if($w->ikut_paud == 1)
                                    Ya
                                @else
                                    Tidak    
                                @endif
                            </td>
                            <td class="text-center">
                                @if($w->ikut_koperasi == 1)
                                    Ya
                                @else
                                    Tidak    
                                @endif
                            </td>

                            <!-- <td>
                                {{ $w->dasawisma->first()->balita_l ?? '-' }}
                            </td> -->
                        </tr>
                        @endforeach
                    </table>
                </div>
        </div>

        @if(is_null($w->dasawisma->first()))

        @else
        <div class="row stats-row gy-4 mt-5 pt-5" data-aos="fade-up" data-aos-delay="500">
            <div class="col-lg-12 mt-2">
                <h4 class="text-center">Anggota Keluarga</h4>
            </div>
            <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <span class="material-symbols-outlined"><img src="{{ asset('storage/assets/svgbarcode/bayi.svg') }}" style="width:40px;height:40px;"></span>
                        </div>
                        <div class="stat-content">
                            <h4>Balita</h4>
                            <p class="mb-0">L: {{$w->dasawisma->first()->balita_l}}, P: {{$w->dasawisma->first()->balita_p}}</p>
                        </div>
                    </div>
            </div>
            <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <span class="material-symbols-outlined"><img src="{{ asset('storage/assets/svgbarcode/pus.svg') }}" style="width:40px;height:40px;"></span>
                        </div>
                        <div class="stat-content">
                            <h4>PUS</h4>
                            <p class="mb-0">{{$w->dasawisma->first()->pus}} Pasangan</p>
                        </div>
                    </div>
            </div>
            <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <span class="material-symbols-outlined"><img src="{{ asset('storage/assets/svgbarcode/wus.svg') }}" style="width:40px;height:40px;"></span>
                        </div>
                        <div class="stat-content">
                            <h4>WUS</h4>
                            <p class="mb-0">{{$w->dasawisma->first()->wus}} Pasangan</p>
                        </div>
                    </div>
            </div>
            <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <span class="material-symbols-outlined"><img src="{{ asset('storage/assets/svgbarcode/hamil.svg') }}" style="width:40px;height:40px;"></span>
                        </div>
                        <div class="stat-content">
                            <h4>Hamil</h4>
                            <p class="mb-0">{{$w->dasawisma->first()->ibu_hamil}}</p>
                        </div>
                    </div>
            </div>
            <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <span class="material-symbols-outlined"><img src="{{ asset('storage/assets/svgbarcode/menyusui.svg') }}" style="width:40px;height:40px;"></span>
                        </div>
                        <div class="stat-content">
                            <h4>Menyusui</h4>
                            <p class="mb-0">{{$w->dasawisma->first()->ibu_menyusui}}</p>
                        </div>
                    </div>
            </div>
            <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <span class="material-symbols-outlined"><img src="{{ asset('storage/assets/svgbarcode/lansia.svg') }}" style="width:40px;height:40px;"></span>
                        </div>
                        <div class="stat-content">
                            <h4>Lansia</h4>
                            <p class="mb-0">{{$w->dasawisma->first()->lansia}}</p>
                        </div>
                    </div>
            </div>
            <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <span class="material-symbols-outlined"><img src="{{ asset('storage/assets/svgbarcode/buta.svg') }}" style="width:40px;height:40px;"></span>
                        </div>
                        <div class="stat-content">
                            <h4>Buta</h4>
                            <p class="mb-0">L: {{$w->dasawisma->first()->buta_l}}, P: {{$w->dasawisma->first()->buta_p}}</p>
                        </div>
                    </div>
            </div>
        </div>

         <div class="row stats-row gy-4 mt-5 pt-5" data-aos="fade-up" data-aos-delay="500">
            <div class="col-lg-12">
                <h4 class="text-center">Kriteria Rumah</h4>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                    <div class="stat-icon">
                        <span class="material-symbols-outlined"><img src="{{ asset('storage/assets/svgbarcode/makanan.svg') }}" style="width:40px;height:40px;"></span>
                    </div>
                    <div class="stat-content">
                        <h4>Makanan Pokok</h4>
                        <p class="mb-0">
                            @php
                                    $makanan = $w->dasawisma->first();
                                    $sumberMakanan = [];

                                    if($makanan->beras == 1) $sumberMakanan[] = 'Beras';
                                    if($makanan->non_beras == 1) $sumberMakanan[] = 'Non Beras';
                                @endphp

                                {{ implode(', ', $sumberMakanan) ?: '-' }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <span class="material-symbols-outlined"><img src="{{ asset('storage/assets/svgbarcode/rumah.svg') }}" style="width:40px;height:40px;"></span>
                        </div>
                        <div class="stat-content">
                            <h4>Kriteria Rumah</h4>
                            
                            <p class="mb-0">
                            @php
                                $rumah_sehat =  $w->dasawisma->first();
                                $sumberRumah = [];

                                if($rumah_sehat->rumah_sehat == 1) $sumberRumah[] = ' Sehat';
                                if($rumah_sehat->rumah_tidak_sehat == 1) $sumberRumah[] = 'Kurang Sehat ';
                                if($rumah_sehat->memiliki_tempat_sampah == 1) $sumberRumah[] = 'Memiliki TPS ';
                            @endphp

                            {{ implode(', ', $sumberRumah) ?: '-' }}
                        </p>
                        </div>
                    </div>
            </div>
            <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <span class="material-symbols-outlined"><img src="{{ asset('storage/assets/svgbarcode/wc.svg') }}" style="width:40px;height:40px;"></span>
                        </div>
                        <div class="stat-content">
                            <h4>Jumlah Jamban</h4>
                            <p class="mb-0">{{$w->dasawisma->first()->jumlah_jamban_keluarga}}</p>
                        </div>
                    </div>
            </div>
            <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <span class="material-symbols-outlined"><img src="{{ asset('storage/assets/svgbarcode/water.svg') }}" style="width:40px;height:40px;"></span>
                        </div>
                        <div class="stat-content">
                        <h4>Sumber Air</h4>
                        <p class="mb-0">
                            @php
                                $air = $w->dasawisma->first();
                                $sumberAir = [];

                                if($air->air_pdam == 1) $sumberAir[] = 'PDAM';
                                if($air->air_sumur == 1) $sumberAir[] = 'Air Sumur';
                                if($air->air_sungai == 1) $sumberAir[] = 'Sungai';
                                if($air->air_lainnya == 1) $sumberAir[] = 'Lainnya';
                            @endphp

                            {{ implode(', ', $sumberAir) ?: '-' }}
                        </p>
                    </div>
                    </div>
            </div>
            <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <span class="material-symbols-outlined"><img src="{{ asset('storage/assets/svgbarcode/spal2.svg') }}" style="width:40px;height:40px;"></span>
                        </div>
                        <div class="stat-content">
                            <h4>SPAL</h4>
                            <p class="mb-0">
                                @if($w->dasawisma->first()->memiliki_spal == 1)
                                    Memiliki SPAL
                                @else
                                    Tidak Memiliki SPAL
                                @endif
                        </div>
                    </div>
            </div>
            <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <span class="material-symbols-outlined"><img src="{{ asset('storage/assets/svgbarcode/p4k.svg') }}" style="width:40px;height:40px;"></span>
                        </div>
                        <div class="stat-content">
                            <h4>Stiker P4K</h4>
                            <p class="mb-0">
                                @if($w->dasawisma->first()->memiliki_stiker_p4k == 1)
                                    Menempelkan Stiker P4K
                                @else
                                    Tidak Menempelkan Stiker P4K
                                @endif
                        </div>
                    </div>
            </div>
        </div>
        @endif


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