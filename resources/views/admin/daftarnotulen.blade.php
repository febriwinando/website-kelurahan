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
                                @if($notulens->isEmpty())
                                    <h4 class="text-center mt-5 mb-5">
                                        Belum ada arsip notulen ...
                                    </h4>
                                @else
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
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($notulens as $key => $notulen)
                                        <tr id="row-{{ $notulen->id }}">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $notulen->macam }}</td>
                                            <td>{{ $notulen->nama_anggota }}</td>
                                            <td>{{ \Carbon\Carbon::parse($notulen->tanggal)->format('d-m-Y') }} - 
                                                {{ \Carbon\Carbon::parse($notulen->waktu)->format('H:i') }}</td>
                                            <td>{{ $notulen->jumlah_diundang }}</td>
                                            <td>{{ $notulen->jumlah_hadir }}</td>
                                            <td class="status-col">
                                                 @if($notulen->status == 'belum diverifikasi')
                                                    <span class="badge bg-warning p-2 rounded">
                                                        {{ $notulen->status }}
                                                    </span>
                                                @elseif($notulen->status == 'verifikasi ditolak')
                                                    <span class="badge bg-danger p-2 rounded">
                                                        {{ $notulen->status }}
                                                    </span>
                                                @else
                                                    <span class="badge bg-success p-2 rounded">
                                                        {{ $notulen->status }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                    @role('administrator', 'user')
                                                        <a href="{{ route('notulen.edit', $notulen->id) }}" 
                                                        class="btn btn-warning btn-sm">
                                                        Edit
                                                        </a>
                                                    @endrole
                                                    @role('verifikator')
                                                        @if(!in_array($notulen->status, ['terverifikasi', 'verifikasi ditolak']))
                                                        <button 
                                                            class="btn btn-warning btn-sm btnEdit"
                                                            data-id="{{ $notulen->id }}"
                                                            data-macam="{{ $notulen->macam }}"
                                                            data-tanggal="{{ \Carbon\Carbon::parse($notulen->tanggal)->format('d-m-Y')}}"
                                                            data-nama="{{ $notulen->nama_anggota }}"
                                                            data-hadir="{{ $notulen->jumlah_hadir }}"
                                                        >
                                                            Verifikasi
                                                        </button>
                                                        @endif
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
            <div class="modal fade" id="modalEdit" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="formEditNotulen">
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="edit_id" name="id">
                            <div class="modal-header">
                                <h5>Verifikasi Notulen</h5>
                            </div>

                            <div class="modal-body">

                                <div class="mb-2">
                                    <h6 class="fw-light">Apakah anda yakin akan memverifikasi <span id="detailMacam"></span>? yang dilaksanakan pada <span id="detailTanggal"></span>, dipimpin oleh <span id="detailNama"></span> dengan jumlah peserta yang hadir sebanyak <span id="detailHadir"></span> orang</h6>
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
            {{-- @endif --}}
            <div id="alertBox" class="alert d-none position-fixed top-0 start-50 translate-middle-x mt-3 shadow alert-primary" style="z-index: 9999; min-width:300px;" role="alert"></div>

        @endsection

        {{-- @section('scripts')
            <script src="{{ asset('storage/assets/js/scriptlapor.js') }}"></script>
        @endsection --}}