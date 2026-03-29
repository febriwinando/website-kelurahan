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
                
                                <form id="formTambahSubLingkungan">
                                        @csrf

                                        <input type="hidden" id="sublingkungan_id" name="id">

                                        <div class="mb-3">
                                            <label class="form-label">Lingkungan</label>
                                            <select id="lingkungan_id"
                                                    name="lingkungan_id"
                                                    class="selectpicker form-control rounded-pill"
                                                    data-live-search="true"
                                                    title="Pilih Lingkungan">

                                                @foreach($lingkungans as $lingkungan)
                                                    <option value="{{ $lingkungan->id }}">
                                                        {{ $lingkungan->nama_lingkungan }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Nama Sub Lingkungan</label>
                                            <input type="text"
                                                class="form-control rounded-pill"
                                                id="nama_sub_lingkungan"
                                                name="nama_sub_lingkungan">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Keterangan</label>
                                            <textarea class="form-control rounded-pill"
                                                    id="keterangan"
                                                    name="keterangan"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Status</label>
                                            <select class="form-select rounded-pill" id="status" name="status">
                                                <option value="true">Aktif</option>
                                                <option value="false">Tidak Aktif</option>
                                            </select>
                                        </div>

                                        <button type="submit"
                                                class="btn btn-primary w-100"
                                                id="btnSubmitSubLingkungan">
                                            Tambah Sub Lingkungan
                                        </button>

                                    </form>


                                </div>
            
                            </div>

                            <div class="card">
                                <h5 class="card-title fw-semibold card-header">Daftar Lingkungan</h5>

                                    <div class="card-body">
                                        <table class="table mt-4 table-hover" id="tabelSubLingkungan">
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
    <!-- <script>

        const csrf = '{{ csrf_token() }}';
        const baseUrlLingkungan = "{{ url('sublingkungan') }}";

        const formLingkungan = document.getElementById('formTambahSubLingkungan');
        const btnSubmitSubLingkungan = document.getElementById('btnSubmitSubLingkungan');
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
                    showAlertSubLingkungan('danger','Gagal menyimpan data');
                    return;
                }

                // ================= UPDATE =================
                if(id){

                    let row = document.getElementById(`row-${id}`);

                    row.children[1].innerText = data.data.nama_sub_lingkungan;
                    row.children[2].innerText = data.data.keterangan ?? '';
                    row.children[3].innerText = data.data.status ? 'Aktif' : 'Tidak Aktif';

                    showAlertSubLingkungan('success','Sub lingkungan berhasil diperbarui');

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

                    document.querySelector('#tabelSubLingkungan tbody')
                    .insertAdjacentHTML('beforeend',row);

                    showAlertSubLingkungan('success','Sub lingkungan berhasil ditambahkan');

                }

                updateRowNumbersLingkungan();
                resetFormLingkungan();

            })

            .catch(error=>{
                console.log(error);
                showAlertSubLingkungan('danger','Terjadi kesalahan server');
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
                    window.scrollTo({
                        top: 0,
                        behavior: "smooth"
                    });
                    lingkunganId.value = data.id;
                    // SET VALUE SELECTPICKER
                    // loadSubLingkungan(data.lingkungan_id, data.lingkungan_id);
                    // $('#lingkungan_id').selectpicker('val', data.lingkungan_id);
                    // $('#lingkungan_id').selectpicker('refresh');
                    // $('#lingkungan_id').selectpicker('val', data.lingkungan_id);
                    document.getElementById('edit_lingkungan_id').value = data.lingkungan_id;
                    let lingkungan_id  = data.lingkungan_id;

                    if(lingkungan_id){
                        loadLingkunganId(lingkungan_id);
                    }
                    document.getElementById('nama_sub_lingkungan').value = data.nama_sub_lingkungan;
                    document.getElementById('keterangan').value = data.keterangan ?? '';
                    document.getElementById('status').value = data.status ? 'true' : 'false';
                    btnSubmitSubLingkungan.innerText = "Update Sub Lingkungan";
                    btnSubmitSubLingkungan.classList.remove('btn-primary');
                    btnSubmitSubLingkungan.classList.add('btn-success');
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
                        showAlertSubLingkungan('success','Data berhasil dihapus');
                    }
                });
            }
        });


        // ================= UPDATE NOMOR TABEL =================
        function updateRowNumbersLingkungan(){

            const rows = document.querySelectorAll('#tabelSubLingkungan tbody tr');

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

            btnSubmitSubLingkungan.innerText = "Tambah Sub Lingkungan";
            btnSubmitSubLingkungan.classList.remove('btn-success');
            btnSubmitSubLingkungan.classList.add('btn-primary');

        }

        function resetSelect(target, placeholder){

            $(target).selectpicker('destroy');

            $(target).html('<option value="">'+placeholder+'</option>');

            $(target).selectpicker({
                liveSearch: true
            });

        }


        // ================= MODAL ALERT =================
        function showAlertSubLingkungan(type,message){

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

        function loadLingkunganId(lingkungan_id, selected=null){

            if(!lingkungan_id) return;

            // resetSelect('#lingkungan_id','Pilih Lingkungan');

            $.get('/lingkunganedit', function(data){

                let html = '<option value="">Pilih Lingkungan</option>';

                data.forEach(function(item){
                    let isSelected = '';

                    if(parseInt(item.id) === parseInt(selected)){
                        isSelected = 'selected';
                        console.log(item.id+" - "+isSelected)
                        html += `<option value="${item.id}" selected> Ya ${item.nama_lingkungan}</option>`;
                    }else{
                        html += `<option value="${item.id}" >${item.nama_lingkungan}</option>`;
                    }
                    
                
                });

                $('#lingkungan_id').selectpicker('destroy');

                $('#lingkungan_id').html(html);

                $('#lingkungan_id').selectpicker({
                    liveSearch:true
                });

                $('#lingkungan_id').selectpicker('val', selected);
            });

        }

    </script> -->

    <script>
        const csrf = '{{ csrf_token() }}';
        const baseUrl = "{{ url('sublingkungan') }}";

        const form = document.getElementById('formTambahSubLingkungan');
        const idField = document.getElementById('sublingkungan_id');
        const btnSubmit = document.getElementById('btnSubmitSubLingkungan');


        /* ===============================
        SUBMIT (CREATE + UPDATE)
        ================================ */

        form.addEventListener('submit', function(e){

            e.preventDefault();

            let id = idField.value;
            let formData = new FormData(form);

            let url = id ? `${baseUrl}/${id}` : baseUrl;

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
                    alert('Gagal menyimpan data');
                    return;
                }

                /* ================= UPDATE ================= */

                if(id){

                    let row = document.getElementById(`row-${id}`);

                    row.children[1].innerText = data.data.nama_sub_lingkungan;
                    row.children[2].innerText = data.data.keterangan ?? '';
                    row.children[3].innerText = data.data.status ? 'Aktif' : 'Tidak Aktif';

                    showAlertSubLingkungan('success','Sub lingkungan berhasil diperbaharui');

                }

                /* ================= CREATE ================= */

                else{

                    let row = `
                    <tr id="row-${data.data.id}">
                        <td></td>
                        <td>${data.data.nama_sub_lingkungan}</td>
                        <td>${data.data.keterangan ?? ''}</td>
                        <td>${data.data.status ? 'Aktif' : 'Tidak Aktif'}</td>
                        <td>

                            <button class="btn btn-warning btn-sm editBtnLingkungan"
                                data-id="${data.data.id}">
                                Edit
                            </button>

                            <button class="btn btn-danger btn-sm deleteBtnLingkungan"
                                data-id="${data.data.id}">
                                Delete
                            </button>

                        </td>
                    </tr>
                    `;

                    document.querySelector('#tabelSubLingkungan tbody')
                        .insertAdjacentHTML('beforeend',row);

                        showAlertSubLingkungan('success','Sub lingkungan berhasil ditambahkan');

                }

                updateRowNumbers();
                resetForm();

            });

        });


        /* ===============================
        EDIT
        ================================ */

        document.addEventListener('click',function(e){

            if(e.target.classList.contains('editBtnLingkungan')){
                // resetSelect('#lingkungan_id','Pilih Lingkungan');
                let id = e.target.dataset.id;

                fetch(`${baseUrl}/${id}/edit`,{
                    headers:{
                        'Accept':'application/json'
                    }
                })

                .then(res=>res.json())

                .then(data=>{

                    window.scrollTo({
                        top:0,
                        behavior:'smooth'
                    });

                    idField.value = data.id;

                    $('#lingkungan_id')
                        .selectpicker('val', String(data.lingkungan_id));
                        // .selectpicker('refresh');
                    document.getElementById('nama_sub_lingkungan').value = data.nama_sub_lingkungan;
                    document.getElementById('keterangan').value = data.keterangan ?? '';
                    document.getElementById('status').value = data.status ? 'true' : 'false';

                    btnSubmit.innerText = "Update Sub Lingkungan";

                    btnSubmit.classList.remove('btn-primary');
                    btnSubmit.classList.add('btn-success');

                });

            }

        });


        function resetSelect(target, placeholder){

            $(target).selectpicker('destroy');

            $(target).html('<option value="">'+placeholder+'</option>');

            $(target).selectpicker({
                liveSearch: true
            });

        }


        /* ===============================
        DELETE
        ================================ */

        document.addEventListener('click',function(e){

            if(e.target.classList.contains('deleteBtnLingkungan')){

                if(!confirm('Yakin hapus data ini?')) return;

                let id = e.target.dataset.id;

                fetch(`${baseUrl}/${id}`,{
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

                        updateRowNumbers();

                    }

                });

            }

        });


        /* ===============================
        UPDATE NOMOR TABEL
        ================================ */

        function updateRowNumbers(){

            const rows = document.querySelectorAll('#tabelSubLingkungan tbody tr');

            rows.forEach((row,index)=>{
                row.children[0].innerText = index + 1;
            });

        }


        /* ===============================
        RESET FORM
        ================================ */

        function resetForm(){

            form.reset();

            idField.value = '';

            $('#lingkungan_id')
                .selectpicker('val','')
                .selectpicker('refresh');

            btnSubmit.innerText = "Tambah Sub Lingkungan";

            btnSubmit.classList.remove('btn-success');
            btnSubmit.classList.add('btn-primary');

        }


        function showAlertSubLingkungan(type,message){

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
    </script>
    @endsection