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

            <div id="alert-container"></div>

            <!-- Modal Alert -->
            <div class="modal fade modal-sm" id="globalAlertModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content">
                    <div class="modal-header" id="modalHeader">
                        <h5 class="modal-title" id="modalTitle">Notifikasi</h5>
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
                                        <h5 class="card-title fw-semibold mb-0">Lingkungan</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-text mb-3 fs-5 mt-2">
                                <span id="pelapor"></span>
                            </div>
                            <div class="card">
                                <h5 class="card-title fw-semibold card-header">Tambah Sub Lingkungan</h5>

                                <div class="card-body">
                
                                    <form id="formTambahLingkungan">
                                        @csrf
                                        <!-- ID untuk mode edit -->
                                        <input type="hidden" id="sublingkungan_id">

                                        <div class="mb-3">
                                            <label class="form-label">Lingkungan</label>
                                            <select id="lingkungan_id" name="lingkungan_id" class="selectpicker form-control" data-live-search="true" title="Pilih Lingkungan">
                                                @foreach($lingkungans as $lingkungan)
                                                    <option value="{{ $lingkungan->id }}" data-name="{{ $lingkungan->nama_lingkungan}}">
                                                        {{ $lingkungan->nama_lingkungan}} 
                                                        </option>
                                                @endforeach   
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Nama Sub Lingkungan</label>
                                            <input type="text" class="form-control" id="nama_sub_lingkungan" name="nama_sub_lingkungan">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi Lingkungan</label>
                                            <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Status</label>
                                            <select class="form-select" id="status" name="status">
                                                <option value="true">Aktif</option>
                                                <option value="false">Tidak Aktif</option>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary" id="btnSubmitLingkungan">
                                            Tambah Sub Lingkungan
                                        </button>
                                    </form>

                                </div>
            
                            </div>

                            <div class="card">
                                <h5 class="card-title fw-semibold card-header">Daftar Lingkungan</h5>

                                    <div class="card-body">
                                        <table class="table mt-4 table-hover" id="tabelLingkungan">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Keterangan</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($sublingkungans as $key => $lingkungan)
                                            <tr id="row-{{ $lingkungan->id }}">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $lingkungan->nama_sub_lingkungan }}</td>
                                                <td>{{ $lingkungan->keterangan }}</td>
                                                <td>{{ $lingkungan->status ? 'Aktif' : 'Tidak Aktif' }}</td>
                                                <td>
                                                    <button class="btn btn-warning btn-sm editBtnLingkungan" data-id="{{ $lingkungan->id }}">Edit</button>
                                                    <button class="btn btn-danger btn-sm deleteBtnLingkungan" data-id="{{ $lingkungan->id }}">Delete</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                @if($sublingkungans->isEmpty())
                                    <h4 class="text-center mt-5 mb-5">
                                        daftar sub lingkungan belum tersedia ...
                                    </h4>
                            
                                @endif
                            </div>
                </div>

            </div>
            {{-- @endif --}}
            <div id="alertBox" class="alert d-none position-fixed top-0 start-50 translate-middle-x mt-3 shadow alert-primary" style="z-index: 9999; min-width:300px;" role="alert"></div>
    <script>

        const csrf = '{{ csrf_token() }}';
        const baseUrlLingkungan = "{{ url('sublingkungan') }}";

        const formLingkungan = document.getElementById('formTambahLingkungan');
        const btnSubmitLingkungan = document.getElementById('btnSubmitLingkungan');
        const lingkunganId = document.getElementById('sublingkungan_id');


        // ================= SUBMIT (CREATE + UPDATE) =================
        formLingkungan.addEventListener('submit', function(e) {

            e.preventDefault();

            let id = lingkunganId.value;
            let formData = new FormData(formLingkungan);

            let url = id ? `${baseUrlLingkungan}/${id}` : baseUrlLingkungan;

            if(id){
                formData.append('_method','PUT');
            }

            fetch(url,{
                method:'POST',
                headers:{
                    'X-CSRF-TOKEN': csrf,
                    'Accept':'application/json'
                },
                body:formData
            })

            .then(res=>res.json())
            .then(data=>{

                if(!data.success){
                    showAlertLingkungan('danger','Gagal menyimpan data');
                    return;
                }

                // ================= UPDATE =================
                if(id){

                    let row = document.getElementById(`row-${id}`);

                    row.children[1].innerText = data.data.nama_sub_lingkungan;
                    row.children[2].innerText = data.data.keterangan ?? '';
                    row.children[3].innerText = data.data.status ? 'Aktif' : 'Tidak Aktif';

                    showAlertLingkungan('success','Sub lingkungan berhasil diperbarui');

                }

                // ================= CREATE =================
                else{

                    let row = `
                    <tr id="row-${data.data.id}">
                        <td></td>
                        <td>${data.data.nama_sub_lingkungan}</td>
                        <td>${data.data.keterangan ?? ''}</td>
                        <td>${data.data.status ? 'Aktif' : 'Tidak Aktif'}</td>
                        <td>
                            <button class="btn btn-warning btn-sm editBtnLingkungan" data-id="${data.data.id}">
                                Edit
                            </button>

                            <button class="btn btn-danger btn-sm deleteBtnLingkungan" data-id="${data.data.id}">
                                Delete
                            </button>
                        </td>
                    </tr>
                    `;

                    document.querySelector('#tabelLingkungan tbody')
                    .insertAdjacentHTML('beforeend',row);

                    showAlertLingkungan('success','Sub lingkungan berhasil ditambahkan');

                }

                updateRowNumbersLingkungan();
                resetFormLingkungan();

            })

            .catch(error=>{
                console.log(error);
                showAlertLingkungan('danger','Terjadi kesalahan server');
            });

        });


        // ================= EDIT =================
        document.addEventListener('click',function(e){

            if(e.target.classList.contains('editBtnLingkungan')){

                let id = e.target.dataset.id;

                fetch(`${baseUrlLingkungan}/${id}/edit`,{
                    headers:{
                        'Accept':'application/json'
                    }
                })

                .then(res=>res.json())
                .then(data=>{

                    lingkunganId.value = data.id;

                    // $('#lingkungan_id').val(data.lingkungan_id);
                    // $('#lingkungan_id').selectpicker('refresh');

                    loadLingkungan( data.lingkungan_id);
                    document.getElementById('nama_sub_lingkungan').value = data.nama_sub_lingkungan;
                    document.getElementById('keterangan').value = data.keterangan ?? '';
                    document.getElementById('status').value = data.status ? 'true' : 'false';

                    btnSubmitLingkungan.innerText = "Update Sub Lingkungan";
                    btnSubmitLingkungan.classList.remove('btn-primary');
                    btnSubmitLingkungan.classList.add('btn-success');

                });

            }

        });


        // ================= DELETE =================
        document.addEventListener('click',function(e){

            if(e.target.classList.contains('deleteBtnLingkungan')){

                if(!confirm('Yakin hapus data ini ?')) return;

                let id = e.target.dataset.id;

                fetch(`${baseUrlLingkungan}/${id}`,{
                    method:'POST',
                    headers:{
                        'X-CSRF-TOKEN':csrf,
                        'Accept':'application/json'
                    },
                    body:new URLSearchParams({
                        _method:'DELETE'
                    })
                })

                .then(res=>res.json())
                .then(data=>{

                    if(data.success){

                        document.getElementById(`row-${id}`).remove();

                        updateRowNumbersLingkungan();

                        showAlertLingkungan('success','Data berhasil dihapus');

                    }

                });

            }

        });


        // ================= UPDATE NOMOR TABEL =================
        function updateRowNumbersLingkungan(){

            const rows = document.querySelectorAll('#tabelLingkungan tbody tr');

            rows.forEach((row,index)=>{
                row.children[0].innerText = index + 1;
            });

        }


        // ================= RESET FORM =================
        function resetFormLingkungan(){

            formLingkungan.reset();

            lingkunganId.value = '';

            $('#lingkungan_id').val('');
            $('#lingkungan_id').selectpicker('refresh');

            btnSubmitLingkungan.innerText = "Tambah Sub Lingkungan";
            btnSubmitLingkungan.classList.remove('btn-success');
            btnSubmitLingkungan.classList.add('btn-primary');

        }


        // ================= MODAL ALERT =================
        function showAlertLingkungan(type,message){

            const modalEl = document.getElementById('globalAlertModal');
            const modal = new bootstrap.Modal(modalEl);

            const header = document.getElementById('modalHeader');
            const title = document.getElementById('modalTitle');
            const body = document.getElementById('modalMessage');

            header.className = 'modal-header';

            switch(type){

                case 'success':
                    header.classList.add('bg-success','text-white');
                    title.innerText = 'Berhasil';
                break;

                case 'danger':
                    header.classList.add('bg-danger','text-white');
                    title.innerText = 'Gagal';
                break;

                case 'warning':
                    header.classList.add('bg-warning');
                    title.innerText = 'Peringatan';
                break;

                default:
                    title.innerText = 'Informasi';
            }

            body.innerHTML = message;

            modal.show();

        }

        function loadLingkungan(lingkungan_id, selected=null){

            resetSelect('#kelurahan','Pilih Kelurahan');
                    console.log(lingkungan_id);

            if(!lingkungan_id) return;

            $.get('/lingkungan/' + lingkungan_id, function(data){

                let html = '<option value="">Pilih Lingkungan</option>';

                data.forEach(function(item){
                    let isSelected = '';

                    if(selected && item.id == selected){
                        isSelected = 'selected';
                    }
                    console.log(item.id);
                    html += `<option value="${item.id}" ${isSelected}>${item.nama_lingkungan}</option>`;
                });

                $('#lingkungan_id').selectpicker('destroy');

                $('#lingkungan_id').html(html);

                $('#lingkungan_id').selectpicker({
                    liveSearch:true
                });

                if(selected){
                    $('#lingkungan_id').selectpicker('val', selected);
                }

            });

        }

    </script>

    @endsection