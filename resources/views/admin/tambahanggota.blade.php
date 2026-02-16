        @php
            use Illuminate\Support\Str;
        @endphp

        @extends('admin.layouts.app') {{-- Pakai layout utama --}}

        @section('title', 'Dashboad Aduan')

        @section('content')
            <div id="successAlert" class="alert alert-success alert-dismissible fade" role="alert" style="display: none;">
                {{ session('success') }}
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

            {{-- @if($messages->isEmpty())
                <div class="alert alert-primary" role="alert">
                    Tidak aduan yang diterima.
                </div>
            @else --}}
            <div class="row">
                <div class="col-lg-9" id="informasi-container">
                    <div class="card">
                        <div class="card-body">
                            <div class="row" >
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="card-title fw-semibold mb-0">Informasi Aduan</h5>
                                        <div>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Teruskan
                                            </button>
                                            <a href="#" class="btn btn-danger">Tolak</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-text mb-3 fs-5 mt-2">
                                <span id="pelapor"></span>
                            </div>
                            <div class="card">
                                <h5 class="card-title fw-semibold card-header">Pesan Aduan: </h5>

                                <div class="card-body">
                                    <form >
                                        @csrf
                                        <div class="mb-3">
                                            <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="namaLengkap" aria-describedby="namaLengkap" name="name">
                                            <div id="namaLengkap" class="form-text">isi berdasarkan data Kartu Tanda Penduduk (KTP)</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1">
                                        </div>
                                        <div class="mb-3 form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
            
                            </div>

                            <div class="card">
                                <h5 class="card-title fw-semibold card-header">Bukti Aduan:</h5>
                                <div class="card-body">
                                    <div class="row" id="bukti-container">
                                    
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="py-6 px-6 text-center">
                <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank"
                    class="pe-1 text-primary text-decoration-underline">AdminMart.com</a>Distributed by <a href="https://themewagon.com/" target="_blank"
                    class="pe-1 text-primary text-decoration-underline">ThemeWagon</a></p>
                </div>
            </div>
            {{-- @endif --}}
            <div id="alertBox" class="alert d-none position-fixed top-0 start-50 translate-middle-x mt-3 shadow alert-primary" style="z-index: 9999; min-width:300px;" role="alert"></div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    {{-- <form id="formTeruskan" method="post" action="{{ route('penanganan.store') }}">
                        @csrf --}}
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Teruskan laporan ke OPD terkait</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="whatsapp_message_id" id="whatsapp_message_id" value="">
                                <input type="hidden" name="aksesaduan_id" id="aksesaduan_id" value="">
                                <input type="text" name="opd_selected" id="opd_selected" value="">

                                <label for="opd" class="form-label">Silahkan pilih OPD:</label>
                                <select id="opd" name="opd" class="selectpicker form-control" data-live-search="true" title="Cari atau pilih OPD...">
                                    {{-- @foreach($opds as $opd)
                                        <option value="{{ $opd->id }}" data-name="{{ $opd->opd }}">
                                            {{ $opd->opd }}
                                        </option>
                                    @endforeach    --}}
                                </select>

                                <h5 class="mt-4">Data Terpilih:</h5>
                                <div id="selectedList" class="mt-2"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </div>
                    {{-- </form> --}}
                </div>
            </div>


            <!-- Model Foto -->
            <div class="modal fade" id="modalBukti" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">

                <div class="modal-content">
                    <div class="modal-header">
                    {{-- <h1 class="modal-title fs-5" id="exampleModalLabel">Teruskan laporan ke OPD terkait</h1> --}}
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                    </div>
                    <div class="modal-body p-0">
                        <img src="" id="modalBuktiImg" class="img-fluid w-100" alt="bukti">
                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button> --}}
                    </div>
                </div>
            </div>
            </div>

        @endsection

        {{-- @section('scripts')
            <script src="{{ asset('storage/assets/js/scriptlapor.js') }}"></script>
        @endsection --}}