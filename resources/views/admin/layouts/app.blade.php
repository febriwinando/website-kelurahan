<!doctype html>
<html lang="en">

<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Aplikasi Absensi')</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('storage/assets/images/logos/siap.png') }}" />
  {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"> --}}
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
              <span class="hide-menu">TIM PKK</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/anggota" aria-expanded="false">
                <span>
                  <img src="{{ asset('storage/assets/svg/addpeople.svg') }}">
                  {{-- <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon> --}}
                </span>
                <span class="hide-menu">Tambah Anggota Baru</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/daftar-anggota" aria-expanded="false">
                <span>
                  <img src="{{ asset('storage/assets/svg/daftaranggota.svg') }}">
                  {{-- <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon> --}}
                </span>
                <span class="hide-menu">Data Anggota</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/jabatan-anggota" aria-expanded="false">
                <span>
                  <img src="{{ asset('storage/assets/svg/jabatan.svg') }}">

                  {{-- <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon> --}}
                </span>
                <span class="hide-menu">Struktur Jabatan</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
              <span class="hide-menu">Inventaris</span>
            </li>
            {{-- @if(in_array(Auth::user()->level, ['administrator', 'admin_kota'])) --}}
            <li class="sidebar-item">
              <a class="sidebar-link" href="/inventaris/create" aria-expanded="false">
                <span>
                  <img src="{{ asset('storage/assets/svg/addinventory.svg') }}">
                </span>
                <span class="hide-menu">Tambah Barang</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/inventaris" aria-expanded="false">
                <span>
                  <img src="{{ asset('storage/assets/svg/inventory.svg') }}">
                </span>
                <span class="hide-menu">Data Barang</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
              <span class="hide-menu">Notulen</span>
            </li>
            {{-- @if(in_array(Auth::user()->level, ['administrator', 'admin_kota'])) --}}
            <li class="sidebar-item">
              <a class="sidebar-link" href="/notulen/create" aria-expanded="false">
                <span>
                  <img src="{{ asset('storage/assets/svg/addnotulen.svg') }}">
                </span>
                <span class="hide-menu">Buat Catatan Rapat</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/inventaris" aria-expanded="false">
                <span>
                  <img src="{{ asset('storage/assets/svg/notulen.svg') }}">
                </span>
                <span class="hide-menu">Arsip Notulen</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
              <span class="hide-menu">Keuangan</span>
            </li>
            {{-- @if(in_array(Auth::user()->level, ['administrator', 'admin_kota'])) --}}
            <li class="sidebar-item">
              <a class="sidebar-link" href="/inventaris/create" aria-expanded="false">
                <span>
                  <img src="{{ asset('storage/assets/svg/addfinancial.svg') }}">
                </span>
                <span class="hide-menu">Tambah Transaksi</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/inventaris" aria-expanded="false">
                <span>
                  <img src="{{ asset('storage/assets/svg/financial.svg') }}">
                </span>
                <span class="hide-menu">Laporan Keuangan</span>
              </a>
            </li>
            
          </ul>

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
                        class="btn btn-success"><span class="d-none d-md-block">
                          {{-- {{ Auth::user()->opd?->opd }} ({{ Auth::user()->name }}) --}}
                        </span></a> 
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
        window.csrfToken = "{{ csrf_token() }}";
        window.baseUrlJabatan = "{{ url('jabatan-anggota') }}";
    </script>
    <script src="{{ asset('storage/assets/js/app-custom.js') }}"></script>
    {{-- <script>

    const csrf = '{{ csrf_token() }}';
    const baseUrl = "{{ url('jabatan-anggota') }}";

    const form = document.getElementById('formTambahJabatan');
    const btnSubmit = document.getElementById('btnSubmit');
    const jabatanId = document.getElementById('jabatan_id');


    // ================= SUBMIT (STORE + UPDATE) =================
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        let id = jabatanId.value;
        let formData = new FormData(form);

        let url = id ? `${baseUrl}/${id}` : baseUrl;
        let method = id ? 'PUT' : 'POST';
        
        
        fetch(url, {
            method: 'POST', // tetap POST (Laravel spoof method)
            headers: {
                'X-CSRF-TOKEN': csrf,
                'Accept': 'application/json'
            },
            body: (() => {
                if(id) formData.append('_method', 'PUT');
                return formData;
            })()
        })
        .then(res => res.json())
        .then(data => {
            if(data.success){

              if(id){
                  let row = document.getElementById(`row-${id}`);

                  row.children[1].innerText = data.data.nama_jabatan;
                  row.children[2].innerText = data.data.urutan ?? '';
                  row.children[3].innerText = data.data.is_active ? 'Aktif' : 'Tidak Aktif';
              } else {

                  let row = `
                  <tr id="row-${data.data.id}">
                      <td></td>
                      <td>${data.data.nama_jabatan}</td>
                      <td>${data.data.urutan ?? ''}</td>
                      <td>${data.data.is_active ? 'Aktif' : 'Tidak Aktif'}</td>
                      <td>
                          <button class="btn btn-warning btn-sm editBtn" data-id="${data.data.id}">Edit</button>
                          <button class="btn btn-danger btn-sm deleteBtn" data-id="${data.data.id}">Delete</button>
                      </td>
                  </tr>
                  `;

                  document.querySelector('#tabelJabatan tbody')
                          .insertAdjacentHTML('beforeend', row);
              }

              updateRowNumbers(); // ✅ letakkan di sini
              showAlert('success', 'Jabatan berhasil ditambah');
              resetForm();
          }


        })
        .catch(async error => {

          let response = await error.response?.json?.();

          if(response && response.errors){

              let pesan = '';
              Object.values(response.errors).forEach(err => {
                  pesan += err[0] + '<br>';
              });

              showAlert('danger', pesan);

          } else {
              showAlert('danger', 'Terjadi kesalahan server!');
          }

      });

    });

  function updateRowNumbers() {
      const rows = document.querySelectorAll('#tabelJabatan tbody tr');
      rows.forEach((row, index) => {
          row.children[0].innerText = index + 1;
      });
  }


    // ================= EDIT =================
    document.addEventListener('click', function(e){

        if(e.target.classList.contains('editBtn')){

            let id = e.target.dataset.id;

            fetch(`${baseUrl}/${id}/edit`, {
                headers: { 'Accept': 'application/json' }
            })
            .then(res => res.json())
            .then(data => {

                jabatanId.value = data.id;
                document.getElementById('namaJabatan').value = data.nama_jabatan;
                document.getElementById('deskripsi').value = data.deskripsi ?? '';
                document.getElementById('urutan').value = data.urutan ?? '';
                document.getElementById('is_active').value = data.is_active ? 'true' : 'false';

                btnSubmit.innerText = "Update Jabatan";
                btnSubmit.classList.remove('btn-primary');
                btnSubmit.classList.add('btn-success');
                    updateRowNumbers();

            });

        }

    });


    // ================= DELETE =================
    document.addEventListener('click', function(e){

        if(e.target.classList.contains('deleteBtn')){

            if(!confirm('Yakin hapus?')) return;

            let id = e.target.dataset.id;

            fetch(`${baseUrl}/${id}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrf,
                    'Accept': 'application/json'
                },
                body: new URLSearchParams({
                    _method: 'DELETE'
                })
            })
            .then(res => res.json())
            .then(data => {

                if(data.success){
                  document.getElementById(`row-${id}`).remove();
                  updateRowNumbers();
                  showAlert('success', 'Jabatan berhasil dihapus!');
              }


            });

        }

    });


    // ================= RESET FORM =================
    function resetForm(){
        form.reset();
        jabatanId.value = '';
        btnSubmit.innerText = "Tambah Jabatan";
        btnSubmit.classList.remove('btn-success');
        btnSubmit.classList.add('btn-primary');
    }

  function showAlert(type, message) {

    const modalEl = document.getElementById('globalAlertModal');
    const modal = new bootstrap.Modal(modalEl);

    const header = document.getElementById('modalHeader');
    const title = document.getElementById('modalTitle');
    const body = document.getElementById('modalMessage');

    // Reset class warna
    header.className = 'modal-header';

    // let soundId = '';

    switch(type) {
        case 'success':
            header.classList.add('.bg-light', 'text-white');
            title.innerText = 'Berhasil';
            // soundId = 'sound-success';
            break;

        case 'error':
        case 'danger':
            header.classList.add('bg-danger', 'text-white');
            title.innerText = 'Gagal';
            // soundId = 'sound-error';
            break;

        case 'warning':
            header.classList.add('bg-warning');
            title.innerText = 'Peringatan';
            // soundId = 'sound-warning';
            break;

        default:
            title.innerText = 'Informasi';
    }

    body.innerHTML = message;

    modal.show();
}


  </script>
<script>
$(document).ready(function(){

    $('#formTambahAnggota').on('submit', function(e){
        e.preventDefault();

        let id = $('#anggota_id').val();
        let formData = new FormData(this);

        let url = id ? "/anggota/" + id : "{{ route('anggota.store') }}";

        if(id){
            formData.append('_method', 'PUT'); // spoof method
        }

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response){

                if(response.success){

                    showAlert('success', id 
                        ? 'Anggota berhasil diupdate'
                        : 'Anggota berhasil ditambah'
                    );

                    if(!id){
                        $('#formTambahAnggota')[0].reset();
                        $('#imagePreview').attr('src', '').addClass('d-none');
                    }
                }
            },
            error: function(xhr){

                let errors = xhr.responseJSON.errors;
                let html = '<div class="alert alert-danger"><ul>';

                $.each(errors, function(key, value){
                    html += '<li>' + value[0] + '</li>';
                });

                html += '</ul></div>';

                $('#alert-container').html(html);
            }
        });

    });

});
</script>

<script>
$(document).ready(function(){

    $('#formTambahInventaris').on('submit', function(e){
        e.preventDefault();

        let id = $('#inventaris_id').val();
        let formData = new FormData(this);

        let url = id ? "/inventaris/" + id : "{{ route('inventaris.store') }}";

        if(id){
            formData.append('_method', 'PUT'); // spoof method
        }

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response){

                if(response.success){

                    showAlert('success', id 
                        ? 'Inventaris berhasil diupdate'
                        : 'Inventaris berhasil ditambah'
                    );

                    if(!id){
                        $('#formTambahInventaris')[0].reset();
                        $('#imagePreview').attr('src', '').addClass('d-none');
                    }
                }
            },
            error: function(xhr){

                let errors = xhr.responseJSON.errors;
                let html = '<div class="alert alert-danger"><ul>';

                $.each(errors, function(key, value){
                    html += '<li>' + value[0] + '</li>';
                });

                html += '</ul></div>';

                $('#alert-container').html(html);
            }
        });

    });

});
</script>
    <script>
      document.getElementById('imageInput').addEventListener('change', function(event) {

          const input = event.target;
          const preview = document.getElementById('imagePreview');

          if (input.files && input.files[0]) {

              const file = input.files[0];

              // Validasi hanya gambar
              if (!file.type.startsWith('image/')) {
                  alert('File harus berupa gambar');
                  input.value = '';
                  preview.classList.add('d-none');
                  return;
              }

              const reader = new FileReader();

              reader.onload = function(e) {
                  preview.src = e.target.result;
                  preview.classList.remove('d-none');
              };

              reader.readAsDataURL(file);

          } else {
              preview.src = '';
              preview.classList.add('d-none');
          }
      });

      
      </script>

  <script>
      document.addEventListener('click', function(e){

      if(e.target.classList.contains('deleteAnggota')){
          let id = e.target.dataset.id;
          if(!confirm('Apakah anda yakin akan menonaktifkan anggota tersebut?')) return;
          fetch(`/anggota/${id}`, {
              method: 'DELETE',
              headers: {
                  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                  'Accept': 'application/json'
              }
          })
          .then(response => {
            console.log(response.status); // 🔥 lihat statusnya
                return response.json();
              if(!response.ok){
                  throw new Error('Gagal menghapus data');
              }

              return response.json();
          })
          .then(data => {

              if(data.success){

                  // Hapus baris tabel
                  const row = document.getElementById(`row-${id}`);
                  if(row){
                      row.remove();
                  }

                  updateRowNumbers();

                  showAlert('success', 'Data anggota berhasil dihapus.');

              } else {
                  showAlert('error', 'Gagal menghapus data.');
              }

          })
          .catch(error => {
              console.error(error);
              showAlert('error', 'Terjadi kesalahan saat menghapus.');
          });

      }

  });


  // Update nomor urut setelah delete
  function updateRowNumbers() {
      const rows = document.querySelectorAll('#tabelJabatan tbody tr');
      rows.forEach((row, index) => {
          row.children[0].innerText = index + 1;
      });
  }
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {

        const selectJabatan = document.querySelector('select[name="jabatan_id"]');
        const inputNamaJabatan = document.getElementById('nama_jabatan');

        function updateNamaJabatan() {
            const selectedOption = selectJabatan.options[selectJabatan.selectedIndex];
            const nama = selectedOption.getAttribute('data-nama') || '';
            inputNamaJabatan.value = nama;
        }

        // Saat user ganti pilihan
        selectJabatan.addEventListener('change', updateNamaJabatan);

        // Saat halaman edit pertama kali load
        updateNamaJabatan();
    });
  </script> --}}

</body>

</html>