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
                                            <a href="/keuangan/create" class="btn btn-info">Tambah Transaksi</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-text mb-3 fs-5 mt-2">
                                <span id="pelapor"></span>
                            </div>
                            <div class="card">
                                <h5 class="card-title fw-semibold card-header">Daftar Arsip</h5>
                                @if($keuangans->isEmpty())
                                    <h4 class="text-center mt-5 mb-5">
                                        Belum ada arsip notulen ...
                                    </h4>
                                @else
                                <div class="card-body">
                                    <table class="table mt-4 table-striped-columns" id="tabelTransaksi">
                                        <thead class="table-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Transaksi</th>
                                                <th>Tanggal</th>
                                                <th>Invoice</th>
                                                <th>Nilai (Rp)</th>
                                                @role('administrator', 'user')
                                                <th>Aksi</th>
                                                @endrole
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($keuangans as $key => $keuangan)
                                        <tr id="row-{{ $keuangan->id }}">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $keuangan->jenis }}</td>
                                            <td>{{ $keuangan->tanggal->isoFormat('dddd, D MMMM Y') }}</td>
                                            <td>{{ $keuangan->invoice }}</td>
                                            <td>Rp {{ number_format($keuangan->jumlah, 0, ',', '.') }}</td>
                                            @role('administrator', 'user')
                                            <td>
                                                <button 
                                                        class="btn btn-warning btn-sm btnEdit"
                                                        data-id="{{ $keuangan->id }}"
                                                        data-jenis="{{ $keuangan->jenis }}"
                                                        data-tanggal="{{ $keuangan->tanggal->format('Y-m-d') }}"
                                                        data-invoice="{{ $keuangan->invoice }}"
                                                        data-jumlah="{{ $keuangan->jumlah }}"
                                                    >
                                                        Edit
                                                    </button>
                                            </td>
                                            @endrole
                                            
                                            @role('verifikator')
                                            <td>
                                                @if(!in_array($keuangan->status, ['terverifikasi', 'verifikasi ditolak']))
                                                    <button 
                                                        class="btn btn-warning btn-sm btnVerifikasi"
                                                        data-id="{{ $keuangan->id }}"
                                                        data-jenis="{{ $keuangan->jenis }}"
                                                        data-tanggal="{{ $keuangan->tanggal->isoFormat('dddd, D MMMM Y') }}"
                                                        data-invoice="{{ $keuangan->invoice }}"
                                                        data-jumlah="Rp {{ number_format($keuangan->jumlah, 0, ',', '.') }}"
                                                    >
                                                        Verifikasi
                                                    </button>
                                                @endif
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

            <div class="modal fade" id="modalVerifikasi" tabindex="-1">
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
                                    <h6 class="fw-light">Apakah anda yakin akan memverifikasi <span class="fw-semibold" id="detaiJenis"></span> tersebut? yang dilaksanakan pada <span class="fw-semibold" id="detailTanggal"></span>, Nomor Invoice: <span class="fw-semibold" id="detailInvoice"></span> sebesar: <span class="fw-semibold" id="detailJumlah"></span></h6>
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

            <div class="modal fade" id="modalEdit" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="formEdit">
                            @csrf
                            @method('PUT')

                            <input type="hidden" id="edit_id">

                            <div class="modal-header">
                                <h5>Edit Transaksi</h5>
                            </div>

                            <div class="modal-body">

                                <div class="mb-2">
                                    <label>Jenis</label>
                                    <select id="edit_jenis" class="form-control">
                                        <option value="pemasukan">Pemasukan</option>
                                        <option value="pengeluaran">Pengeluaran</option>
                                    </select>
                                </div>

                                <div class="mb-2">
                                    <label>Tanggal</label>
                                    <input type="date" id="edit_tanggal" class="form-control">
                                </div>

                                <div class="mb-2">
                                    <label>Invoice</label>
                                    <input type="text" id="edit_invoice" class="form-control">
                                </div>

                                <div class="mb-2">
                                    <label>Jumlah</label>
                                    <input type="number" id="edit_jumlah" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">
                                    Simpan
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