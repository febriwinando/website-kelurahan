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
                                        <h5 class="card-title fw-semibold mb-0">TP-PKK</h5>
                                        <div>
                                            <a href="/warga/create" class="btn btn-info">Tambah TP-PKK</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-text mb-3 fs-5 mt-2">
                                <span id="pelapor"></span>
                            </div>
                            <div class="card">
                                <h5 class="card-title fw-semibold card-header">Daftar TP-PKK</h5>
                                <div class="card-body">
                                    @if($wargas->isEmpty())
                                    <h4 class="text-center mt-5 mb-5">
                                        Data TP-PKK belum tersedia ...
                                    </h4>
                                    @else
                                    <div class="card-body">
                                        <table class="table mt-4 table-responsive table-hover" id="tabelJabatan">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>No</th>
                                                    <th>No. Registrasi</th>
                                                    <th>Kepala Keluarga</th>
                                                    <th>No. KK</th>
                                                    <th>Dasa Wisma</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($wargas as $key => $warga)
                                            <tr id="row-{{ $warga->id }}">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $warga->no_registrasi }}</td>
                                                <td>{{ $warga->nama_kepala_keluarga }}</td>
                                                <td>{{ $warga->no_kk }}</td>
                                                <td>{{ $warga->dasa_wisma }}</td>
                                                <td>
                                                    @role('administrator', 'user')
                                                        <a href="{{ route('warga.edit', $warga->id) }}" 
                                                            class="btn btn-warning btn-sm">
                                                            Edit
                                                        </a>
                                                    @endrole
                                                        
                                                    @role('verifikator')
                                                        <a href="{{ route('warga.edit', $warga->id) }}" 
                                                            class="btn btn-warning btn-sm">
                                                            Buka
                                                        </a>
                                                    @endrole
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                    @endif
                                    
                                </div>
                                
                            </div>

                </div>

            </div>
            
            <div id="alertBox" class="alert d-none position-fixed top-0 start-50 translate-middle-x mt-3 shadow alert-primary" style="z-index: 9999; min-width:300px;" role="alert"></div>

            <div class="modal fade" id="modalVerifikasiKegiatan" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="formUpdateKegiatan">
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="kegiatanId" name="id">
                            <div class="modal-header">
                                <h5>Verifikasi Notulen</h5>
                            </div>

                            <div class="modal-body">

                                <div class="mb-2">
                                    <h6 class="fw-light">Apakah anda yakin akan memverifikasi <span id="detailUraian"></span>? yang dilaksanakan pada <span id="detailTanggal"></span></h6>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">
                                    Ya
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        @endsection