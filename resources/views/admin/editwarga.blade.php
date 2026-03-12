        @php
            use Illuminate\Support\Str;
        @endphp

        @extends('admin.layouts.app') {{-- Pakai layout utama --}}

        @section('title', 'Dashboad Aduan')

        @section('content')
            {{-- <div id="successAlert" class="alert alert-success alert-dismissible fade" role="alert" style="display: none;">
                {{ session('success') }}
            </div> --}}

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            {{-- <div id="alert-container"></div> --}}

            <!-- Modal Alert -->
            <div class="modal fade modal-sm" id="globalAlertModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content">
                    <div class="modal-header align-middle" id="modalHeader">
                        <h5 class="modal-title text-center" id="modalTitle">Notifikasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body" id="modalMessage">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Tutup
                        </button>
                    </div>
                    </div>
                </div>
            </div>


            <div id="errorAlert" class="alert alert-danger alert-dismissible fade" role="alert" style="display: none;">
                @if($errors->any())
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="row">
                <div class="col-lg-12" id="informasi-container">
                            <div class="row" >
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="card-title fw-semibold mb-0">Detail Kegiatan</h5>
                                        <div>
                                            <a href="/kegiatan/create" class="btn btn-info">Tambah Kegiatan</a>
                                            <a href="/kegiatan" class="btn btn-info">Daftar Kegiatan</a>
                                            <button class="btn btn-success" id="btnTambahPeserta">
                                                + Tambah Peserta
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="card-text mb-3 fs-5 mt-2">
                                <span id="pelapor"></span>
                            </div> -->
                            <div class="card">
                                <h5 class="card-title fw-semibold card-header">Daftar Peserta 
                                    
                                </h5>
                                <div class="card-body">
                                    <table class="table table-responsive table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>Nama</th>
                                                <th>Jabatan</th>
                                                @role('administrator', 'admin')
                                                <th width="15%">Aksi</th>
                                                @endrole
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($wargas as $key => $warga)
                                            <tr id="row-{{ $warga->id }}">
                                                <td>{{ $key + 1 }}</td>
                                                <td class="nama">{{ $warga->nama }}</td>
                                                <td class="jabatan">{{ $warga->nik }}</td>
                                                @role('administrator', 'admin')
                                                <td>
                                                    <a href="{{ route('warga.edit', $warga->id) }}" 
                                                            class="btn btn-warning btn-sm">
                                                            Edit
                                                    </a>

                                                    <button class="btn btn-danger btn-sm btnHapusWarga"
                                                            data-id="{{ $warga->id }}">
                                                        Hapus
                                                    </button>
                                                </td>
                                                @endrole
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    
                                </div>
                                
                            </div>

                </div>

            </div>
            
            <div id="alertBox" class="alert d-none position-fixed top-0 start-50 translate-middle-x mt-3 shadow alert-primary" style="z-index: 9999; min-width:300px;" role="alert"></div>

            <div class="modal fade" id="modalEditPeserta">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="formEditPeserta">
                            @csrf
                            <input type="hidden" id="edit_id">

                            <div class="modal-header bg-warning">
                                <h5 class="modal-title">Edit Peserta</h5>
                            </div>

                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>Nama</label>
                                    <input type="text" id="edit_nama" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label>Jabatan</label>
                                    <input type="text" id="edit_jabatan" class="form-control">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-primary" type="submit">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalTambahPeserta">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="formTambahPeserta">
                            @csrf
                            <input type="hidden" id="kegiatan_id" value="{{ $warga->id }}">

                            <div class="modal-header bg-success text-white">
                                <h5 class="modal-title">Tambah Peserta</h5>
                            </div>

                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>Nama</label>
                                    <input type="text" id="tambah_nama" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label>Jabatan</label>
                                    <input type="text" id="tambah_jabatan" class="form-control">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-success" type="submit">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script>
            document.getElementById('btnTambahPeserta')
            .addEventListener('click', function(){
                new bootstrap.Modal(
                    document.getElementById('modalTambahPeserta')
                ).show();
            });
            </script>

            <script>
                document.getElementById('formTambahPeserta')
                .addEventListener('submit', function(e){

                    e.preventDefault();

                    fetch(`/peserta`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            kegiatan_id: document.getElementById('kegiatan_id').value,
                            nama: document.getElementById('tambah_nama').value,
                            jabatan: document.getElementById('tambah_jabatan').value
                        })
                    })
                    .then(res => res.json())
                    .then(data => {

                        if(data.status === 'success'){

                            let peserta = data.data;
                            let tbody = document.querySelector('table tbody');

                            let nomor = tbody.children.length + 1;

                            let newRow = `
                                <tr id="row-${peserta.id}">
                                    <td>${nomor}</td>
                                    <td class="nama">${peserta.nama}</td>
                                    <td class="jabatan">${peserta.jabatan ?? ''}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm btnEditPeserta"
                                            data-id="${peserta.id}"
                                            data-nama="${peserta.nama}"
                                            data-jabatan="${peserta.jabatan ?? ''}">
                                            Edit
                                        </button>

                                        <button class="btn btn-danger btn-sm btnHapusPeserta"
                                            data-id="${peserta.id}">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                            `;

                            tbody.insertAdjacentHTML('beforeend', newRow);

                            showAlert('success', data.message);

                            // Reset form
                            document.getElementById('formTambahPeserta').reset();

                            bootstrap.Modal.getInstance(
                                document.getElementById('modalTambahPeserta')
                            ).hide();

                        } else {
                            showAlert('error', data.message);
                        }

                    })
                    .catch(() => {
                        showAlert('error', 'Terjadi kesalahan server');
                    });

                });
            </script>

            <script>
            document.addEventListener('click', function(e){

                if(e.target.classList.contains('btnEditPeserta')){

                    document.getElementById('edit_id').value = e.target.dataset.id;
                    document.getElementById('edit_nama').value = e.target.dataset.nama;
                    document.getElementById('edit_jabatan').value = e.target.dataset.jabatan;

                    new bootstrap.Modal(document.getElementById('modalEditPeserta')).show();
                }

            });

            document.getElementById('formEditPeserta')
            .addEventListener('submit', function(e){

                e.preventDefault();

                let id = document.getElementById('edit_id').value;

                fetch(`/peserta/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        nama: document.getElementById('edit_nama').value,
                        jabatan: document.getElementById('edit_jabatan').value
                    })
                })
                .then(res => res.json())
                .then(data => {

                    if(data.status === 'success'){

                        // Update table langsung tanpa reload
                        // let row = document.getElementById('row-'+id);
                        // row.querySelector('.nama').innerText = document.getElementById('edit_nama').value;
                        // row.querySelector('.jabatan').innerText = document.getElementById('edit_jabatan').value;

                        // showAlert('success', data.message);

                        // bootstrap.Modal.getInstance(
                        //     document.getElementById('modalEditPeserta')
                        // ).hide();


                        let row = document.getElementById('row-'+id);

                        let newNama = document.getElementById('edit_nama').value;
                        let newJabatan = document.getElementById('edit_jabatan').value;

                        // Update tampilan tabel
                        row.querySelector('.nama').innerText = newNama;
                        row.querySelector('.jabatan').innerText = newJabatan;

                        // 🔥 Update juga data attribute tombol edit
                        let editButton = row.querySelector('.btnEditPeserta');
                        editButton.dataset.nama = newNama;
                        editButton.dataset.jabatan = newJabatan;

                        showAlert('success', data.message);

                        bootstrap.Modal.getInstance(
                            document.getElementById('modalEditPeserta')
                        ).hide();

                    } else {
                        showAlert('error', data.message);
                    }

                })
                .catch(() => {
                    showAlert('error', 'Terjadi kesalahan server');
                });
            });
            </script>
            <script>
                document.addEventListener('click', function(e){

                    if(e.target.classList.contains('btnHapusPeserta')){

                        let id = e.target.dataset.id;

                        if(!confirm('Yakin ingin menghapus peserta ini?')) return;

                        fetch(`/peserta/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(res => res.json())
                        .then(data => {

                            if(data.status === 'success'){

                                document.getElementById('row-'+id).remove();

                                showAlert('success', data.message);

                                // Optional: re-numbering ulang
                                updateNomor();

                            } else {
                                showAlert('error', data.message);
                            }

                        })
                        .catch(() => {
                            showAlert('error', 'Terjadi kesalahan server');
                        });
                    }

                });
                </script>
                <script>
                function updateNomor(){
                    document.querySelectorAll('#pesertaTable tbody tr')
                    .forEach((row, index) => {
                        row.children[0].innerText = index + 1;
                    });
                }
                </script>
        @endsection