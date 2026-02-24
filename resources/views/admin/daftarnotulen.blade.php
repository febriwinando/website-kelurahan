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
                                        <h5 class="card-title fw-semibold mb-0">Arsip Notulen</h5>
                                        <div>
                                            <a href="/notulen/create" class="btn btn-info">Buat Catatan Rapat</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-text mb-3 fs-5 mt-2">
                                <span id="pelapor"></span>
                            </div>
                            <div class="card">
                                <h5 class="card-title fw-semibold card-header">Daftar Arsip</h5>
                                <div class="card-body">
                                    <table class="table mt-4" id="tabelJabatan">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Macam</th>
                                                <th>Pimpinan Rapat</th>
                                                <th>Tanggal/Waktu</th>
                                                <th>Jumlah Undangan</th>
                                                <th>Jumlah Hadir</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($notulens as $key => $notulen)
                                        <tr id="row-{{ $notulen->id }}">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $notulen->macam }}</td>
                                            <td>{{ $notulen->pimpinan_rapat }}</td>
                                            <td>{{ \Carbon\Carbon::parse($notulen->tanggal)->format('d-m-Y') }} - 
                                                {{ \Carbon\Carbon::parse($notulen->waktu)->format('H:i') }}</td>
                                            <td>{{ $notulen->jumlah_diundang }}</td>
                                            <td>{{ $notulen->jumlah_hadir }}</td>
                                            <td>
                                                <a href="{{ route('notulen.edit', $notulen->id) }}" 
                                                    class="btn btn-warning btn-sm">
                                                    Edit
                                                    </a>

                                                {{-- <button class="btn btn-warning btn-sm editinventaris" data-id="{{ $notulen->id }}">Edit</button> --}}
                                                {{-- <button class="btn btn-danger btn-sm deleteInventaris" data-id="{{ $notulen->id }}">Nonaktifkan</button> --}}
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>

                </div>
                
            </div>
            {{-- @endif --}}
            <div id="alertBox" class="alert d-none position-fixed top-0 start-50 translate-middle-x mt-3 shadow alert-primary" style="z-index: 9999; min-width:300px;" role="alert"></div>

        @endsection

        {{-- @section('scripts')
            <script src="{{ asset('storage/assets/js/scriptlapor.js') }}"></script>
        @endsection --}}