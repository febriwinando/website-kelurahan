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

            {{-- @if($messages->isEmpty())
                <div class="alert alert-primary" role="alert">
                    Tidak aduan yang diterima.
                </div>
            @else --}}
            <div class="row">
                <div class="col-lg-12" id="informasi-container">
                            <div class="row" >
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="card-title fw-semibold mb-0">Anggota PKK</h5>
                                        <div>
                                            <a href="/anggota" class="btn btn-info">Tambah Anggota</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-text mb-3 fs-5 mt-2">
                                <span id="pelapor"></span>
                            </div>
                            <div class="card">
                                <h5 class="card-title fw-semibold card-header">Daftar Anggota</h5>
                                <div class="card-body">
                                    <table class="table mt-4" id="tabelJabatan">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Diterima/Dibeli dari</th>
                                                <th>Tanggal Penerimaan/Pembelian</th>
                                                <th>Jumlah</th>
                                                <th>Tempat Penyimpanan</th>
                                                <th>Kondisi</th>
                                                <th>Status</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($inventariss as $key => $inventaris)
                                        <tr id="row-{{ $inventaris->id }}">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $inventaris->nama_barang }}</td>
                                            <td>{{ $inventaris->diterima_dari }}</td>
                                            <td>{{ $inventaris->tanggal_penerimaan }}</td>
                                            <td>{{ $inventaris->jumlah }}</td>
                                            <td>{{ $inventaris->tempat_penyimpanan }}</td>
                                            <td>{{ $inventaris->kondisi }}</td>
                                            <td>{{ $inventaris->status }}</td>
                                            <td>{{ $inventaris->keterangan }}</td>
                                            <td>
                                                <a href="{{ route('inventaris.edit', $inventaris->id) }}" 
                                                    class="btn btn-warning btn-sm">
                                                    Edit
                                                    </a>

                                                {{-- <button class="btn btn-warning btn-sm editinventaris" data-id="{{ $inventaris->id }}">Edit</button> --}}
                                                {{-- <button class="btn btn-danger btn-sm deleteInventaris" data-id="{{ $inventaris->id }}">Nonaktifkan</button> --}}
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>

                                    </table>
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

        @endsection

        {{-- @section('scripts')
            <script src="{{ asset('storage/assets/js/scriptlapor.js') }}"></script>
        @endsection --}}