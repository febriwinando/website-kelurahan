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
                                        <h5 class="card-title fw-semibold mb-0">Tambah Inventaris</h5>
                                        <div>
                                            <a href="/inventaris" class="btn btn-info">Daftar Inventaris</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <h5 class="card-title fw-semibold card-header">Form Inventaris</h5>
                                <div class="card-body">
                                    <form id="formTambahInventaris" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($inventaris))
                                            <input type="hidden" id="inventaris_id" value="{{ $inventaris->id }}">
                                        @endif

                                        <div class="mb-3">
                                            <label class="form-label">Nama Barang</label>
                                            <input type="text" class="form-control rounded-pill" name="nama_barang" value="{{ $inventaris->nama_barang ?? '' }}">
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label">Diterima/Dibeli dari:</label>
                                            <input type="text" class="form-control rounded-pill" name="diterima_dari" value="{{ $inventaris->diterima_dari ?? '' }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Tanggal Penerimaan/Pembelian</label>
                                            <input type="date" class="form-control rounded-pill" name="tanggal_penerimaan" value="{{ $inventaris->tanggal_penerimaan ?? '' }}" >
                                        </div>
                                        {{-- {{ $inventaris->tanggal_penerimaan }} --}}
                                        <div class="mb-3">
                                            <label class="form-label">Jumlah</label>
                                            <input type="number" class="form-control rounded-pill" name="jumlah" value="{{ $inventaris->jumlah ?? '' }}" >
                                        </div>

                                        <div class="mb-3">
                                            <label for="tempat_penyimpanan">Tempat Penyimpanan</label>
                                            <select name="tempat_penyimpanan" id="tempat_penyimpanan" class="form-select rounded-pill">
                                                <option value="">-- Pilih tempat penyimpanan --</option>
                                                <option value="Tempat 1" {{ isset($inventaris) && $inventaris->tempat_penyimpanan == 'Tempat 1' ? 'selected' : '' }}>Tempat 1</option>
                                                <option value="Tempat 2" {{ isset($inventaris) && $inventaris->tempat_penyimpanan == 'Tempat 2' ? 'selected' : '' }}>Tempat 2</option>
                                                <option value="Tempat 3" {{ isset($inventaris) && $inventaris->tempat_penyimpanan == 'Tempat 3' ? 'selected' : '' }}>Tempat 3</option>
                                            </select>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="kondisi">Kondisi</label>
                                            <select name="kondisi" id="kondisi" class="form-select rounded-pill">
                                                <option value="">-- Kondisi Inventaris --</option>
                                                <option value="Baik" {{ isset($inventaris) && $inventaris->kondisi == 'Baik' ? 'selected' : '' }}>Baik</option>
                                                <option value="Kurang Baik" {{ isset($inventaris) && $inventaris->kondisi == 'Kurang Baik' ? 'selected' : '' }}>Kurang Baik</option>
                                                <option value="Rusak Ringan" {{ isset($inventaris) && $inventaris->kondisi == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                                                <option value="Rusak Berat" {{ isset($inventaris) && $inventaris->kondisi == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                                        
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="status">Status</label>
                                            <select name="status" id="status" class="form-select rounded-pill">
                                                <option value="">-- Status Inventaris --</option>
                                                <option value="Tersedia" {{ isset($inventaris) && $inventaris->status == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                                                <option value="Dipinjam" {{ isset($inventaris) && $inventaris->status == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                                                <option value="Perbaikan" {{ isset($inventaris) && $inventaris->status == 'Perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                                                <option value="Dihapus" {{ isset($inventaris) && $inventaris->status == 'Dihapus' ? 'selected' : '' }}>Dihapus</option>
                                        
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label>Keterangan</label>
                                            <textarea class="form-control" name="keterangan" >{{ $inventaris->keterangan ?? '' }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Upload Foto Inventaris</label>

                                            <input type="file"
                                                class="form-control"
                                                id="imageInput"
                                                name="foto_inventaris"
                                                accept="image/*">

                                            <!-- Preview -->
                                            <div class="mt-3">
                                                <img id="imagePreview"
                                                    src="{{ isset($inventaris) && $inventaris->foto_inventaris ? asset('storage/'.$inventaris->foto_inventaris) : '' }}"
                                                    alt="Preview Gambar"
                                                    class="img-thumbnail {{ isset($inventaris) && $inventaris->foto_inventaris ? '' : 'd-none' }}"
                                                    style="max-height: 300px;">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">
                                            {{ isset($inventaris) ? 'Update' : 'Tambah' }}
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
