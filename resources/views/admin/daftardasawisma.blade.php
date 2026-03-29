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
                                        <h5 class="card-title fw-semibold mb-0">Data Barang</h5>
                                        <div>
                                            <a href="/dasawisma/create" class="btn btn-info">Pendataan Dasawisma</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-text mb-3 fs-5 mt-2">
                                <span id="pelapor"></span>
                            </div>
                            <div class="card">
                                <h5 class="card-title fw-semibold card-header">Daftar Barang</h5>
                                @if($dasas->isEmpty())
                                    <h4 class="text-center mt-5 mb-5">
                                        Belum ada data inventaris ...
                                    </h4>
                                @else
                                <div class="card-body">
                                    <table class="table mt-4 table-responsive table-hover w-100" id="tabelJabatan">
                                        <thead class="table-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Kepala Keluarga</th>
                                                <th>No. KK</th>
                                                @role('administrator', 'admin','kepling')
                                                <th>Aksi</th>
                                                @endrole
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($dasas as $key => $dasa)
                                        <tr id="row-{{ $dasa->id }}">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $dasa->nama_keluarga }}</td>
                                            <td>{{ $dasa->no_kk }}</td>
                                            
                                            @role('administrator', 'admin', 'kepling')
                                                <td>
                                                    <a href="{{ route('dasawisma.edit', $dasa->id) }}" 
                                                        class="btn btn-warning btn-sm">
                                                        Edit
                                                        </a>
                                                </td>
                                            @endrole
                                            
                                        </tr>
                                        @endforeach
                                        </tbody>

                                    </table>
                                </div>
                                @endif
                            </div>

                </div>

            </div>
            
            <div id="alertBox" class="alert d-none position-fixed top-0 start-50 translate-middle-x mt-3 shadow alert-primary" style="z-index: 9999; min-width:300px;" role="alert"></div>

        @endsection

        {{-- @section('scripts')
            <script src="{{ asset('storage/assets/js/scriptlapor.js') }}"></script>
        @endsection --}}