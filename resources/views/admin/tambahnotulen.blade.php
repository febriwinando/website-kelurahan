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
                                            <a href="/notulen" class="btn btn-info">Arsip Notulen</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <h5 class="card-title fw-semibold card-header">Form Notulen </h5>
                                <div class="card-body">
                                    <form id="formTambahNotulen" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    @if(isset($notulen))
                                                        <input type="hidden" id="notulen_id" value="{{ $notulen->id }}">
                                                    @endif
                                                    <label class="form-label">Tanggal</label>
                                                    <input type="date"
                                                        name="tanggal"
                                                        class="form-control rounded-pill"
                                                        value="{{ old('tanggal', isset($notulen) ? $notulen->tanggal?->format('Y-m-d') : '') }}">

                                                </div>
                                                
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Waktu</label>
                                                    <input type="time"
                                                        name="waktu"
                                                        class="form-control rounded-pill"
                                                        value="{{ old('waktu', isset($notulen) ? $notulen->waktu?->format('H:i') : '') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Tempat</label>
                                                    <input type="text" class="form-control rounded-pill" name="tempat" value="{{ $notulen->tempat ?? '' }}" >
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Macam</label>
                                                    <input type="text" class="form-control rounded-pill" name="macam" value="{{ $notulen->macam ?? '' }}" >
                                                </div>
                                            </div>
                                            <hr>
                                            <h6>Uraian Jalannya Rapat</h6>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="pimpinanRapat" class="form-label">Pemimpin Rapat:</label>
                                                    <select id="pimpinanRapat" name="pimpinan_rapat" class="selectpicker form-control" data-live-search="true" title="pilih pemimpin rapat">
                                                        @foreach($anggotas as $anggota)
                                                            <option value="{{ $anggota->id }}" data-name="{{ $anggota->nama }}">
                                                                {{ $anggota->nama }}
                                                            </option>
                                                        @endforeach   
                                                    </select>
                                                </div>

                                                <input type="hidden" name="pimpinan_rapat_nama" id="pimpinan_rapat_nama"
                                                    value="{{ $anggota->pimpinan_rapat ?? '' }}">
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Jumlah Yang Diundang</label>
                                                    <input type="number" class="form-control rounded-pill" name="jumlah_diundang" value="{{ $notulen->jumlah_diundang ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Jumlah Hadir</label>
                                                    <input type="number" class="form-control rounded-pill" name="jumlah_hadir" value="{{ $notulen->jumlah_hadir ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Jumlah Tidak Hadir</label>
                                                    <input type="number" class="form-control rounded-pill" name="jumlah_tidak_hadir" value="{{ $notulen->jumlah_tidak_hadir ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Susunan Acara</label>
                                                    <textarea class="form-control" name="susunan_acara" style="height: 200px">{{ $notulen->susunan_acara ?? '' }}</textarea>
                                                </div>
                                            </div>
                                             <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Keputusan</label>
                                                    <textarea class="form-control" name="keputusan" style="height: 200px">{{ $notulen->keputusan ?? '' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Lain-lain</label>
                                                    <textarea class="form-control" name="lain_lain" style="height: 200px">{{ $notulen->lain_lain ?? '' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Penutup</label>
                                                    <textarea class="form-control" name="penutup" style="height: 200px">{{ $notulen->penutup ?? '' }}</textarea>
                                                </div>
                                            </div>
                                            <hr>

                                            <h6>Dokumentasi Kegiatan</h6>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Foto</label>

                                                   <input type="file"
                                                        class="form-control"
                                                        id="imageInputMulti"
                                                        multiple
                                                        name="foto_dokumentasi[]"
                                                        accept="image/*">

                                                    <small id="fileCountText" class="text-muted"></small>
                                                    <!-- Preview -->

                                                    <div class="row mt-3" id="imagePreviewContainer">

                                                        {{-- FOTO LAMA (EDIT MODE) --}}
                                                        @if(isset($notulen) && $notulen->foto_dokumentasi)
                                                            @foreach($notulen->foto_dokumentasi as $foto)
                                                                <div class="col-md-4 mb-3 preview-item old-photo">
                                                                    <div class="position-relative">
                                                                        <img src="{{ asset('storage/'.$foto) }}"
                                                                            class="img-thumbnail w-100"
                                                                            style="height:150px; object-fit:cover;">

                                                                        <button type="button"
                                                                            class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1 remove-old"
                                                                            data-path="{{ $foto }}">
                                                                            ×
                                                                        </button>

                                                                        <input type="hidden" name="old_photos[]" value="{{ $foto }}">
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif

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
