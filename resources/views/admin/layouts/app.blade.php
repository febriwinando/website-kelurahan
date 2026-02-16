<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Aplikasi Absensi')</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('storage/assets/images/logos/logo.png') }}" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('storage/assets/css/styles.min.css') }}" />

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.24.2/dist/bootstrap-table.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="{{ asset('storage/assets/images/logos/siap.png') }}" alt="" style="width:200px;margin-top:10px;" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
              <span class="hide-menu">TIM Anggota PKK</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="form-anggota" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Tambah Angota</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./index.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Daftar Anggota</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/jabatan-anggota" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Daftar Jabatan</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
              <span class="hide-menu">KOLOM ADUAN</span>
            </li>
            @if(in_array(Auth::user()->level, ['administrator', 'admin_kota']))
            <li class="sidebar-item">
              <a class="sidebar-link" href="/laporan-masuk" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:layers-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Aduan Diterima</span>
              </a>
            </li>
            @endif
            <!-- <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-alerts.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:danger-circle-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu"></span>
              </a>
            </li> -->
            @if(in_array(Auth::user()->level, ['administrator', 'admin_opd']))
            <li class="sidebar-item">
              <a class="sidebar-link" href="/diterima-opd" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:bookmark-square-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Disposisi Aduan</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/proses-opd" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:file-text-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Proses Penanganan</span>
              </a>
            </li>
            @endif
            @if(in_array(Auth::user()->level, ['administrator', 'admin_opd', 'admin_kota']))

            <li class="sidebar-item">
              <a class="sidebar-link" href="/selesai-opd" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:file-text-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Selesai</span>
              </a>
            </li>
            @endif
            <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-typography.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:text-field-focus-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Aduan Ditolak</span>
              </a>
            </li>
            <!-- <li class="nav-small-cap">
              <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4" class="fs-6"></iconify-icon>
              <span class="hide-menu">EXTRA</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./icon-tabler.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:sticker-smile-circle-2-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Icons</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:planet-3-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Sample Page</span>
              </a>
            </li> -->
          </ul>
          <!-- <div class="unlimited-access hide-menu bg-primary-subtle position-relative mb-7 mt-7 rounded-3"> 
            <div class="d-flex">
              <div class="unlimited-access-title me-3">
                <h6 class="fw-semibold fs-4 mb-6 text-dark w-75">Upgrade to pro</h6>
                <a href="#" target="_blank"
                  class="btn btn-primary fs-2 fw-semibold lh-sm">Buy Pro</a>
              </div>
              <div class="unlimited-access-img">
                <img src="{{ asset('storage/assets/images/backgrounds/rocket.png') }}" alt="" class="img-fluid">
              </div>
            </div>
          </div> -->
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
        <header class="app-header">
            <nav class="navbar navbar-expand-lg navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item d-block d-xl-none">
                    <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                        <i class="ti ti-menu-2"></i>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                        <i class="ti ti-bell-ringing"></i>
                        <div class="notification bg-primary rounded-circle"></div>
                    </a>
                    </li>
                </ul>
                <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                    {{-- <a href="#" target="_blank"
                        class="btn btn-primary me-2"><span class="d-none d-md-block">Check Pro Version</span> <span class="d-block d-md-none">Pro</span></a>--}}
                    <a target="_blank"
                        class="btn btn-success"><span class="d-none d-md-block">{{ Auth::user()->opd?->opd }} ({{ Auth::user()->name }})</span></a> 
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ asset('storage/assets/images/profile/user-1.jpg') }}" alt="" width="35" height="35" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <div class="message-body">
                            <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                            <i class="ti ti-user fs-6"></i>
                            <p class="mb-0 fs-3">Profil</p>
                            </a>
                            <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                            <i class="ti ti-list-check fs-6"></i>
                            <p class="mb-0 fs-3">Pengaturan</p>
                            </a>
                            <a href="{{ route('logout') }}" 
                              class="btn btn-outline-primary mx-3 mt-2 d-block"
                              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </div>
                        </div>
                    </li>
                    </ul>
                </div>
            </nav>
        </header>
      <!--  Header End -->
        
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>

    {{-- <script src="{{ asset('storage/assets/libs/jquery/dist/jquery.min.js') }}"></script> --}}
    <script src="{{ asset('storage/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('storage/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('storage/assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('storage/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('storage/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('storage/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('storage/assets/js/iconify-icon.min.js') }}"></script>
    <script src="{{ asset('storage/assets/libs/jquery/dist/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('storage/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('storage/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('storage/assets/js/bootstrap-table.min.js') }}"></script>
    <script src="{{ asset('storage/assets/js/bootstrap-select.min.js') }}"></script>
<script>
document.getElementById('formTambahJabatan')
.addEventListener('submit', function(e) {

    e.preventDefault();

    let formData = new FormData(this);

    fetch("{{ route('jabatan-anggota.store') }}", {
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {

        let alertContainer = document.getElementById('alert-container');

        if(data.success) {

            alertContainer.innerHTML = `
                <div class="alert alert-success alert-dismissible fade show">
                    ${data.message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            `;

            document.getElementById('formTambahJabatan').reset();

        } else {

            alertContainer.innerHTML = `
                <div class="alert alert-danger alert-dismissible fade show">
                    ${data.message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            `;
        }

    })
    .catch(error => {

        document.getElementById('alert-container').innerHTML = `
            <div class="alert alert-danger alert-dismissible fade show">
                Terjadi kesalahan server!
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `;

    });

});
</script>


    {{-- <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.24.2/dist/bootstrap-table.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script> --}}

{{-- 
    <script>
      $(function () {
        $('.selectpicker').selectpicker();
      });

      // Variabel array untuk simpan data terpilih
      let selectedValues = [];

      // Saat option dipilih
      $('#opd').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
        let selectedVal = $(this).val(); // ambil value yang terpilih
        let selectedText = $(this).find("option[value='"+selectedVal+"']").text();

        if (selectedVal && !selectedValues.includes(selectedVal)) {
          selectedValues.push(selectedVal); // tambah ke array jika belum ada
          renderSelected();
        }
      });
      
      function renderSelected() {
        let container = $("#selectedList");
        container.empty();

        selectedValues.forEach(function(val){
            let text = $("#opd option[value='"+val+"']").text();
            let item = `
                <span class="btn btn-light m-1">
                  ${text}
                  <button type="button" class="btn-close btn-close-dark btn-sm ms-1 remove-item" data-value="${val}"></button>
                </span>`;
            container.append(item);
        });

        // Update hidden input
        $('#opd_selected').val(selectedValues.join(',')); // bisa juga JSON.stringify(selectedValues)

        console.log("render: "+selectedValues);

      }

      $(document).on("click", ".remove-item", function(){
    let value = String($(this).data("value")); // pastikan string
    selectedValues = selectedValues.filter(v => v !== value);
    console.log("hapus: "+value+" - "+selectedValues);

    // kalau mau sekalian unselect dari selectpicker
    $('#opd').find(`option[value='${value}']`).prop('selected', false);
    $('#opd').selectpicker('refresh');

    renderSelected();
});


    </script>

    <script>
          function loadDetail(id) {
              console.log("load 2:"+id);

              $.get("{{ url('/aduan') }}/" + id, function (data) {
                  $('#pelapor').text(toTitleCase(data.nama) + ' | Nomor WhatsApp ' + formatPhone(data.number));
                  $('#aduan-body').text("\""+data.body+"\"");
                  $('#aduan-time').text("Aduan diterima pada " + formatDate(data.created_at));
                  $('#whatsapp_message_id').val(data.id);
                  $('#aksesaduan_id').val(data.aksesaduan_id);

                  $('.btn-terima').attr('data-id', data.id);
                  $('#form-tolak').attr('action', '/opd/tolak/' + data.id);

                  // status check
                  if (data.status == 2) {
                      $('#btnTangani').show();
                      $('.btn-terima').hide();
                      $('#form-tolak').hide();
                  } else if (data.status == 3) {
                      $('#btnTangani').hide();
                      $('#selesai').show();
                      $('.btn-terima').hide();
                      $('#form-tolak').hide();
                  } else {
                      $('#btnTangani').hide();
                      $('.btn-terima').show();
                      $('#form-tolak').show();
                  }

                  // render bukti
                  // $('#bukti-container').empty();
                  // if (data.filepath && data.filepath.length > 0) {
                  //     let buktiHtml = '';
                  //     data.filepath.forEach((path) => {
                  //         buktiHtml += `
                  //             <div class="col-md-6 mb-2">
                  //                 <div class="card position-relative">
                  //                     <img src="/storage/${path}" class="card-img" alt="bukti"
                  //                         data-bs-toggle="modal" data-bs-target="#modalBukti"
                  //                         data-bs-img="/storage/${path}" style="cursor:pointer;">

                  //                     <a href="/storage/${path}" download
                  //                         class="btn btn-sm btn-primary position-absolute"
                  //                         style="left: 10px; bottom: 10px;">
                  //                         <i class="bi bi-file-arrow-down-fill"></i> Download
                  //                     </a>
                  //                 </div>
                  //             </div>`;
                  //     });
                  //     $('#bukti-container').html(buktiHtml);
                  // }

                  $('#bukti-container').empty();

                  if (data.filepath && data.filepath.length > 0) {
                      let imageHtml = '';
                      let videoHtml = '';
                      let docHtml = '';

                      data.filepath.forEach((path, index) => {
                          let mime = data.mimetype[index];
                          let filename = data.filename[index];

                          if (mime && mime.startsWith("image/")) {
                              // Gambar
                              imageHtml += `
                                  <div class="col-md-6 mb-2">
                                      <div class="card position-relative">
                                          <img src="/storage/${path}" class="card-img" alt="${filename}"
                                              data-bs-toggle="modal" data-bs-target="#modalBukti"
                                              data-bs-img="/storage/${path}" style="cursor:pointer;">

                                          <a href="/storage/${path}" download
                                              class="btn btn-sm btn-primary position-absolute"
                                              style="left: 10px; bottom: 10px;">
                                              <i class="bi bi-file-arrow-down-fill"></i>
                                          </a>
                                      </div>
                                  </div>`;
                          } else if (mime && mime.startsWith("video/")) {
                              // Video
                              videoHtml += `
                                  <div class="col-md-6 mb-2">
                                      <div class="card position-relative">
                                          <video controls class="card-img" style="max-height:300px;">
                                              <source src="/storage/${path}" type="${mime}">
                                              Browser kamu tidak mendukung video.
                                          </video>
                                          <a href="/storage/${path}" download
                                              class="btn btn-sm btn-primary position-absolute"
                                              style="left: 10px; bottom: 10px;">
                                              <i class="bi bi-file-arrow-down-fill"></i>
                                          </a>
                                      </div>
                                  </div>`;
                          } else {
                              // Dokumen (pdf, word, dll)
                              docHtml += `
                                  <div class="col-md-12 mb-2">
                                      <div class="card p-3 d-flex flex-row justify-content-between align-items-center">
                                          <div>
                                              <i class="bi bi-file-earmark-text me-2"></i> ${filename}
                                          </div>
                                          <a href="/storage/${path}" download
                                              class="btn btn-sm btn-primary">
                                              <i class="bi bi-file-arrow-down-fill"></i>
                                          </a>
                                      </div>
                                  </div>`;
                          }
                      });

                      $('#bukti-container').html(`
                          <div class="row">${imageHtml}</div>
                          <div class="row mt-3">${videoHtml}</div>
                          <div class="row mt-3">${docHtml}</div>
                      `);
                  }


                  // render timeline tanggal_penanganan
                $('#timeline-container').empty();

                if (data.penanganan.length > 0) {
                  data.penanganan.forEach(function(p) {
                      let tgl = p.tanggal_penanganan; // array dari penanganan

                      let labels = {
                            kirim_opd: 'Dikirim ke',
                            terima_opd: 'Diterima oleh',
                            selesai_opd: 'Selesai ditangani oleh'
                        };

                        Object.entries(tgl).forEach(([key, val]) => {
                            let item = `
                                <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                                    <div class="d-flex w-100 justify-content-between">
                                        <p class="mb-1"><span class="fw-bold">${labels[key] ?? key}</span> ${p.opd.opd}</p>
                                        <small>${formatDate(val)}</small>
                                    </div>
                            `;

                            // Tampilkan petugas dan catatan hanya jika selesai_opd
                            if(key === 'selesai_opd') {
                                let petugas = (p.petugas_positions || []).map(pos => pos.jabatan).join(', ');
                                item += `
                                    <p class="mb-1"><span class="fw-bold">Petugas yang melaksanakan: </span>${petugas || '-'}</p>
                                    <p class="mb-1"><span class="fw-bold">Keterangan: </span>${p.catatan_penanganan || '-'}</p>
                                `;

                                // Tampilkan bukti_penanganan
                                // if(p.bukti_penanganan && p.bukti_penanganan.length > 0) {
                                //     let buktiHtml = '<p class="mb-1">Bukti Penanganan:</p><ul>';
                                //     p.bukti_penanganan.forEach(file => {
                                //         let url = '/storage/' + file.path; // path dari database
                                //         buktiHtml += `<li><a href="${url}" target="_blank">${file.name}</a></li>`;
                                //     });
                                //     buktiHtml += '</ul>';
                                //     item += buktiHtml;
                                // }
                            }
                            item += `</a>`; // tutup <a>
                            $('#timeline-container').append(item);
                        });
                  });
              } else {
                  $('#timeline-container').append('<p>Tidak ada penanganan.</p>');
              }

                  var modalBukti = document.getElementById('modalBukti');
                  modalBukti.addEventListener('show.bs.modal', function (event) {
                      var img = event.relatedTarget;
                      var src = img.getAttribute('data-bs-img');
                      var modalImg = document.getElementById('modalBuktiImg');
                      modalImg.src = src;
                  });
              });
          }
      $(document).ready(function () {


          // ketika item diklik
          $(document).on('click', '.aduan-item', function () {
              $('.aduan-item').removeClass('active');
              $(this).addClass('active');
              let id = $(this).data('id');
              loadDetail(id);
          });

          // otomatis load data pertama
          let firstId = $('.aduan-item').first().data('id');
          if (firstId) {
              loadDetail(firstId);
          }
      });

      

      function formatPhone(num) {
          // hapus @c.us
          num = num.replace('@c.us', '');

          // tambah +
          if (!num.startsWith('+')) {
              num = '+' + num;
          }

          // pisahkan sesuai pola (2)-(3)-(4)-(4)
          return num.replace(/(\+62)(\d{3})(\d{4})(\d{4})/, '$1-$2-$3-$4');
      }

      function toTitleCase(str) {
          return str
              .toLowerCase()
              .split(' ')
              .map(word => word.charAt(0).toUpperCase() + word.slice(1))
              .join(' ');
      }

      function formatDate(dateString) {
          const date = new Date(dateString);

          // Nama hari, tanggal, bulan, tahun
          const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
          const formattedDate = new Intl.DateTimeFormat('id-ID', options).format(date);

          // Jam & menit
          const hours = date.getHours().toString().padStart(2, '0');
          const minutes = date.getMinutes().toString().padStart(2, '0');

          return `${formattedDate} pada pukul ${hours}:${minutes} WIB`;
      }

      document.addEventListener("DOMContentLoaded", function() {
        // kalau ada pesan sukses dari session
        @if(session('success'))
            let successAlert = document.getElementById('successAlert');
            successAlert.style.display = 'block';
            successAlert.classList.add('show');

            setTimeout(() => {
                successAlert.classList.remove('show');
                successAlert.style.display = 'none';
            }, 3000);
        @endif

        // kalau ada pesan error dari validator
        @if($errors->any())
            let errorAlert = document.getElementById('errorAlert');
            errorAlert.style.display = 'block';
            errorAlert.classList.add('show');

            setTimeout(() => {
                errorAlert.classList.remove('show');
                errorAlert.style.display = 'none';
            }, 3000);
        @endif
    });

    $(document).ready(function () {
      // pakai event delegation supaya tetap jalan meski tombol diganti lewat loadDetail
      $(document).on('click', '.btn-terima', function (e) {
          e.preventDefault();
          let id = $(this).data('id');
          let btn = $(this);

          $.ajax({
              url: "{{ route('terima.opd') }}",
              type: "POST",
              data: {
                  _token: "{{ csrf_token() }}",
                  id: id
              },

              success: function (res) {
                  if (res.success) {
                      btn.hide();
                      btn.siblings('form').hide();
                      $('#btnTangani').show();

                      $('#successAlert').html(res.message).show().addClass('show');
                      setTimeout(function () {
                          $('#successAlert').fadeOut();
                      }, 3000);

                      // ==== Refresh daftar pelapor ====
                      let listGroup = $('.list-group.list-group-flush');
                      listGroup.empty();

                      if (res.penanganans.length === 0) {
                          // kosong → tampilkan pesan di kanan, bukan hapus seluruh container
                          $('#pelapor').text('');
                          $('#aduan-body').text('');
                          $('#aduan-time').text('');
                          $('#bukti-container').html(`
                              <div class="alert alert-primary" role="alert">
                                  Tidak ada disposisi aduan yang diterima.
                              </div>
                          `);
                      } else {
                          res.penanganans.forEach(function(p, index) {
                              listGroup.append(`
                                  <li class="list-group-item aduan-item ${index === 0 ? 'active' : ''}"
                                      data-id="${p.whatsapp_message.id}">
                                      ${p.whatsapp_message.nama}
                                  </li>
                              `);
                          });

                          // rebind klik event
                          $('.aduan-item').off('click').on('click', function() {
                              $('.aduan-item').removeClass('active');
                              $(this).addClass('active');
                              let id = $(this).data('id');
                              loadDetail(id);
                          });

                          // otomatis tampilkan detail item pertama
                          let firstId = res.penanganans[0].whatsapp_message.id;
                          console.log("load 1:"+firstId);
                          loadDetail(firstId);
                      }
                  }
              },

              error: function (xhr) {
                  let msg = "Terjadi kesalahan!";
                  if (xhr.responseJSON && xhr.responseJSON.message) {
                      msg = xhr.responseJSON.message;
                  }
                  $('#errorAlert').html(msg).show().addClass('show');
              }
          });
        });
    });

    </script> --}}

</body>

</html>