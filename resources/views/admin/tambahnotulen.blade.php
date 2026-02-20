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
                {{-- <div id="alert-container"></div> --}}

                            <div class="row" >
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h5 class="card-title fw-semibold mb-0">Notulen Rapat</h5>
                                        <div>
                                            {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Teruskan
                                            </button> --}}
                                            <a href="/daftar-anggota" class="btn btn-info">Arsip Notulen</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <h5 class="card-title fw-semibold card-header">Form Notulen </h5>
                                <div class="card-body">
                                    <form id="formTambahAnggota" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($anggota))
                                            <input type="hidden" id="anggota_id" value="{{ $anggota->id }}">
                                        @endif
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Tanggal</label>
                                                    <input type="date" class="form-control rounded-pill" name="tanggal" value="{{ $anggota->tanggal ?? '' }}" >
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Waktu</label>
                                                    <input type="time" class="form-control rounded-pill" name="waktu" value="{{ $anggota->waktu ?? '' }}" >
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Tempat</label>
                                                    <input type="text" class="form-control rounded-pill" name="tempat" value="{{ $anggota->tempat ?? '' }}" >
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Macam</label>
                                                    <input type="text" class="form-control rounded-pill" name="macam" value="{{ $anggota->macam ?? '' }}" >
                                                </div>
                                            </div>
                                            <hr>
                                            <h6>Uraian Jalannya Rapat</h6>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="pimpinanRapat" class="form-label">Tempat Lahir:</label>
                                                    <select id="pimpinanRapat" name="pimpinan_rapat" class="selectpicker form-control" data-live-search="true" title="pilih pemimpin rapat">
                                                        @foreach($anggotas as $anggota)
                                                            <option value="{{ $anggota->id }}" data-name="{{ $anggota->nama }}">
                                                                {{ $anggota->nama }} - {{ $anggota->nama_jabatan }}
                                                            </option>
                                                        @endforeach   
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Jumlah Yang Diundang</label>
                                                    <input type="number" class="form-control rounded-pill" name="jumlah_diundang" value="{{ $anggota->jumlah_diundang ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Jumlah Hadir</label>
                                                    <input type="number" class="form-control rounded-pill" name="jumlah_hadir" value="{{ $anggota->jumlah_hadir ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Jumlah Tidak Hadir</label>
                                                    <input type="number" class="form-control rounded-pill" name="jumlah_tidak_hadir" value="{{ $anggota->jumlah_tidak_hadir ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Susunan Acara</label>
                                                    <textarea class="form-control" name="susunan_acara" style="height: 200px">{{ $anggota->susunan_acara ?? '' }}</textarea>
                                                </div>
                                            </div>
                                             <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Keputusan</label>
                                                    <textarea class="form-control" name="keputusan" style="height: 200px">{{ $anggota->keputusan ?? '' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Lain-lain</label>
                                                    <textarea class="form-control" name="lain_lain" style="height: 200px">{{ $anggota->lain_lain ?? '' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Penutup</label>
                                                    <textarea class="form-control" name="penutup" style="height: 200px">{{ $anggota->penutup ?? '' }}</textarea>
                                                </div>
                                            </div>
                                            <hr>

                                            <h6>Dokumentasi Kegiatan</h6>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Foto</label>

                                                    <input type="file"
                                                        class="form-control"
                                                        id="imageInput"
                                                        name="foto"
                                                        accept="image/*">

                                                    <!-- Preview -->
                                                    <div class="mt-3">
                                                        <img id="imagePreview"
                                                            src="{{ isset($anggota) && $anggota->foto_profil ? asset('storage/'.$anggota->foto_profil) : '' }}"
                                                            alt="Preview Gambar"
                                                            class="img-thumbnail {{ isset($anggota) && $anggota->foto_profil ? '' : 'd-none' }}"
                                                            style="max-height: 300px;">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                            <button type="submit" class="btn btn-primary">
                                                {{ isset($anggota) ? 'Update' : 'Tambah' }}
                                            </button>
                                        

                                        {{-- <button type="submit" class="btn btn-primary">Tambah</button> --}}
                                    </form>
                                </div>
            
                            </div>

                </div>
            </div>
            {{-- @endif --}}
            <div id="alertBox" class="alert d-none position-fixed top-0 start-50 translate-middle-x mt-3 shadow alert-primary" style="z-index: 9999; min-width:300px;" role="alert"></div>

        @endsection
