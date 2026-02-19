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

                    <div class="card">
                        <div class="card-body">
                            <div class="row" >
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h5 class="card-title fw-semibold mb-0">Tambah Anggota</h5>
                                        <div>
                                            {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Teruskan
                                            </button> --}}
                                            <a href="/daftar-anggota" class="btn btn-info">Daftar Anggota</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <h5 class="card-title fw-semibold card-header">Form Anggota </h5>
                                <div class="card-body">
                                    <form id="formTambahAnggota">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control rounded-pill" name="nama">
                                        </div>
                                        <div class="mb-3">
                                            <label>Jabatan</label>
                                            <select name="jabatan_id" class="form-control rounded-pill">
                                                <option value="">-- Pilih Jabatan --</option>
                                                @foreach($jabatans as $jabatan)
                                                    <option value="{{ $jabatan->id }}">
                                                        {{ $jabatan->nama_jabatan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                         <div class="mb-3">
                                            <label>Jabatan</label>
                                            <select name="nama_jabatan" class="form-control rounded-pill">
                                                <option value="">-- NAMA Jabatan --</option>
                                                @foreach($jabatans as $jabatan)
                                                    <option value="{{ $jabatan->nama_jabatan }}">
                                                        {{ $jabatan->nama_jabatan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Jenis Kelamin</label>
                                            <div class="d-flex gap-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" 
                                                        name="jenis_kelamin" value="Perempuan" checked>
                                                    <label class="form-check-label">Perempuan</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" 
                                                        name="jenis_kelamin" value="Laki-laki">
                                                    <label class="form-check-label">Laki-laki</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="tempatLahir" class="form-label">Tempat Lahir:</label>
                                            <select id="tempatLahir" name="tempat_lahir" class="selectpicker form-control" data-live-search="true" title="pilih tempat kelahiran">
                                                @foreach($kecamatans as $kecamatan)
                                                    <option value="{{ $kecamatan->id }}" data-name="{{ $kecamatan->nama }}">
                                                        {{ $kecamatan->nama }}- {{ $kecamatan->provinsi->nama }}
                                                    </option>
                                                @endforeach   
                                            </select>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label">Tanggal Lahir</label>
                                            <input type="date" class="form-control rounded-pill" name="tanggal_lahir">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Status Perkawinan</label>
                                            <div class="d-flex gap-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" 
                                                        name="status_perkawinan" value="Kawin" checked>
                                                    <label class="form-check-label">Kawin</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" 
                                                        name="status_perkawinan" value="Tidak Kawin">
                                                    <label class="form-check-label">Tidak Kawin</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Alamat</label>
                                            <input type="text" class="form-control rounded-pill" name="alamat">
                                        </div>
                                        <div class="mb-3">
                                            <label for="pendidikan">Pendidikan</label>
                                            <select name="pendidikan" id="pendidikan" class="form-select rounded-pill">
                                                <option value="">-- Pilih Pendidikan --</option>
                                                <option value="SD">SD</option>
                                                <option value="SMP">SMP</option>
                                                <option value="SMA/SMK">SMA/SMK</option>
                                                <option value="S1">S1</option>
                                                <option value="S2">S2</option>
                                                <option value="S3">S3</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="pekerjaan">Pekerjaan</label>
                                            <select name="pekerjaan" id="pekerjaan" class="form-select rounded-pill">
                                                <option value="">-- Pilih Pekerjaan --</option>
                                                <option value="asn">ASN/PNS</option>
                                                <option value="tni_polri">TNI/Polri</option>
                                                <option value="pegawai_swasta">Pegawai Swasta</option>
                                                <option value="wiraswasta">Wiraswasta</option>
                                                <option value="petani">Petani</option>
                                                <option value="nelayan">Nelayan</option>
                                                <option value="guru_dosen">Guru/Dosen</option>
                                                <option value="tenaga_kesehatan">Tenaga Kesehatan</option>
                                                <option value="pelajar_mahasiswa">Pelajar/Mahasiswa</option>
                                                <option value="ibu_rumah_tangga">Ibu Rumah Tangga</option>
                                                <option value="tidak_bekerja">Tidak Bekerja</option>
                                                <option value="lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Status Anggota</label>
                                            <div class="d-flex gap-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" 
                                                        name="status" value="Aktif" checked>
                                                    <label class="form-check-label">Aktif</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" 
                                                        name="status" value="Tidak Aktif">
                                                    <label class="form-check-label">Tidak Aktif</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label>Keterangan</label>
                                            <textarea class="form-control" name="keterangan"></textarea>
                                        </div>
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
                                                    src=""
                                                    alt="Preview Gambar"
                                                    class="img-thumbnail d-none"
                                                    style="max-height: 300px;">
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </form>
                                </div>
            
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            {{-- @endif --}}
            <div id="alertBox" class="alert d-none position-fixed top-0 start-50 translate-middle-x mt-3 shadow alert-primary" style="z-index: 9999; min-width:300px;" role="alert"></div>

        @endsection
