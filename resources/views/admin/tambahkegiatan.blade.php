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
            <div class="row">
                <div class="col-lg-12" id="informasi-container">
                            <div class="row" >
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h5 class="card-title fw-semibold mb-0">Tambah Kegiatan</h5>
                                        <div>
                                            <a href="/kegiatan" class="btn btn-info">Daftar Kegiatan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <h5 class="card-title fw-semibold card-header">Form Kehadiran</h5>
                                <div class="card-body">
                                    <form action="{{ route('kegiatan.store') }}" method="POST" id="formKegiatan">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label">Tanggal</label>
                                                <input type="date" name="tanggal" class="form-control" required>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Uraian Kegiatan</label>
                                                <textarea name="uraian_kegiatan" class="form-control" required></textarea>
                                            </div>

                                            <hr>

                                            <h5>Daftar Peserta</h5>

                                            <table class="table" id="pesertaTable">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">No</th>
                                                        <th>Nama</th>
                                                        <th>Jabatan</th>
                                                        <th width="10%">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="nomor">1</td>
                                                        <td>
                                                            <input type="text" name="nama[]" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="jabatan[]" class="form-control">
                                                        </td>
                                                        <td>
                                                             <button type="button" class="btn btn-danger btn-sm removeRow">
                                                                <img src="{{ asset('storage/assets/svg/close20.svg') }}">     
                                                            </button> 
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <button type="button" class="btn btn-info" id="addRow">
                                                + Tambah Peserta
                                            </button>

                                            

                                            <button type="submit" class="btn btn-primary">
                                                Simpan
                                            </button>
                                        </form>
                                </div>
            
                            </div>

                </div>
            </div>
            {{-- @endif --}}
            <div id="alertBox" class="alert d-none position-fixed top-0 start-50 translate-middle-x mt-3 shadow alert-primary" style="z-index: 9999; min-width:300px;" role="alert"></div>

        @endsection
