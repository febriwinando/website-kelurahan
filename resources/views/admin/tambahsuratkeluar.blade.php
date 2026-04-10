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
                                        <h5 class="card-title fw-semibold mb-0">Surat Keluar</h5>
                                        <div>
                                            <a href="/surat-keluar" class="btn btn-info">Daftar Surat Keluar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <h5 class="card-title fw-semibold card-header">Form Surat Keluar</h5>

                                <div class="card-body">
                                    <form id="formTambahSK" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    @if(isset($sk))
                                                        <input type="hidden" id="notulen_id" value="{{ $sk->id }}">
                                                    @endif
                                                    <label class="form-label">Tanggal Surat</label>
                                                    <input type="date"
                                                        name="tanggal_surat"
                                                        class="form-control rounded-pill"
                                                        value="{{ old('tanggal_surat', isset($sk) ? $sk->tanggal_surat?->format('Y-m-d') : '') }}">

                                                </div>
                                                
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">No. Surat</label>
                                                    <input type="text"
                                                        name="no_surat"
                                                        class="form-control rounded-pill"
                                                        value="{{ $sk->no_surat ?? '' }}">
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Kapada</label>
                                                    <input type="text" class="form-control rounded-pill" name="kepada" value="{{ $sk->kepada ?? '' }}" >
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Perihal</label>
                                                    <textarea class="form-control" name="perihal" style="height: 100px">{{ $sk->perihal ?? '' }}</textarea>
                                                </div>
                                            </div>
                                            <h6>Lampiran</h6>
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Lampiran</label>

                                                   <input type="file"
                                                        class="form-control rounded-pill"
                                                        id="imageInputMulti"
                                                        multiple
                                                        name="lampiran[]"
                                                        accept="image/*">

                                                    <small id="fileCountText" class="text-muted"></small>
                                                    <!-- Preview -->

                                                    <div class="row mt-3" id="imagePreviewContainer">

                                                        {{-- FOTO LAMA (EDIT MODE) --}}
                                                        @if(isset($sk) && $sk->lampiran)
                                                            @foreach($sk->lampiran as $foto)
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
                                            <button type="submit" class="btn btn-primary w-100">
                                                {{ isset($sk) ? 'Update' : 'Tambah' }}
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
