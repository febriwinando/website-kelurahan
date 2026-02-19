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
                                    <form id="formTambahAnggota" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($anggota))
                                            <input type="hidden" id="anggota_id" value="{{ $anggota->id }}">
                                        @endif

                                        <div class="mb-3">
                                            <label class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control rounded-pill" name="nama" value="{{ $anggota->nama ?? '' }}">
                                        </div>
                                        <div class="mb-3">
                                            <label>Jabatan</label>
                                            <select name="jabatan_id" class="form-control rounded-pill">
                                                <option value="">-- Pilih jabatan --</option>
                                                
                                                @foreach($jabatans as $jabatan)
                                                    <option value="{{ $jabatan->id }}"
                                                        {{ isset($anggota) && $anggota->jabatan_id == $jabatan->id ? 'selected' : '' }}>
                                                        {{ $jabatan->nama_jabatan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                         <div class="mb-3">
                                            <label>Jabatan</label>
                                            <select name="nama_jabatan" class="form-control rounded-pill">
                                                <option value="">-- Pilih jabatan --</option>
                                                @foreach($jabatans as $jabatan)
                                                    <option value="{{ $jabatan->nama_jabatan }}" {{ isset($anggota) && $anggota->nama_jabatan == $jabatan->nama_jabatan ? 'selected' : '' }}>
                                                        {{ $jabatan->nama_jabatan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Jenis Kelamin</label>
                                            <div class="d-flex gap-3">
                                                <div class="d-flex gap-3">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan"
                                                        {{ isset($anggota) ? ($anggota->jenis_kelamin == 'Perempuan' ? 'checked' : '') : 'checked' }}> Perempuan

                                                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki"
                                                        {{ isset($anggota) && $anggota->jenis_kelamin == 'Laki-laki' ? 'checked' : '' }}> Laki-laki
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="tempatLahir" class="form-label">Tempat Lahir:</label>
                                            <select id="tempatLahir" name="tempat_lahir" class="selectpicker form-control" data-live-search="true" title="pilih tempat kelahiran">
                                                @foreach($kecamatans as $kecamatan)
                                                    <option value="{{ $kecamatan->id }}" data-name="{{ $kecamatan->nama }}" {{ isset($anggota) && $anggota->tempat_lahir == $kecamatan->id ? 'selected' : '' }}>
                                                        {{ $kecamatan->nama }}- {{ $kecamatan->provinsi->nama }}
                                                        
                            
                                                    </option>
                                                @endforeach   
                                            </select>
                                            
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label">Tanggal Lahir</label>
                                            <input type="date" class="form-control rounded-pill" name="tanggal_lahir" value="{{ $anggota->tanggal_lahir ?? '' }}" >
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Status Perkawinan</label>
                                            <div class="d-flex gap-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" 
                                                        name="status_perkawinan" value="Kawin" {{ isset($anggota) ? ($anggota->status_perkawinan == 'Kawin' ? 'checked' : '') : 'checked' }}>
                                                    <label class="form-check-label">Kawin</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" 
                                                        name="status_perkawinan" value="Tidak Kawin" {{ isset($anggota) && $anggota->status_perkawinan == 'Tidak Kawin' ? 'checked' : '' }}>
                                                    <label class="form-check-label">Tidak Kawin</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Alamat</label>
                                            <input type="text" class="form-control rounded-pill" name="alamat" value="{{ $anggota->alamat ?? '' }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="pendidikan">Pendidikan</label>
                                            <select name="pendidikan" id="pendidikan" class="form-select rounded-pill">
                                                <option value="">-- Pilih Pendidikan --</option>
                                                <option value="SD" {{ isset($anggota) && $anggota->pendidikan == 'SD' ? 'selected' : '' }}>SD</option>
                                                <option value="SMP" {{ isset($anggota) && $anggota->pendidikan == 'SMP' ? 'selected' : '' }}>SMP</option>
                                                <option value="SMA/SMK" {{ isset($anggota) && $anggota->pendidikan == 'SMA/SMK' ? 'selected' : '' }}>SMA/SMK</option>
                                                <option value="S1" {{ isset($anggota) && $anggota->pendidikan == 'S1' ? 'selected' : '' }}>S1</option>
                                                <option value="S2" {{ isset($anggota) && $anggota->pendidikan == 'S2' ? 'selected' : '' }}>S2</option>
                                                <option value="S3" {{ isset($anggota) && $anggota->pendidikan == 'S3' ? 'selected' : '' }}>S3</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="pekerjaan">Pekerjaan</label>
                                            <select name="pekerjaan" id="pekerjaan" class="form-select rounded-pill">
                                                <option value="">-- Pilih Pekerjaan --</option>
                                                <option value="aASN/PNSsn" {{ isset($anggota) && $anggota->pekerjaan == 'ASN/PNS' ? 'selected' : '' }}>ASN/PNS</option>
                                                <option value="TNI/Polri" {{ isset($anggota) && $anggota->pekerjaan == 'TNI/Polri' ? 'selected' : '' }}>TNI/Polri</option>
                                                <option value="Pegawai Swasta" {{ isset($anggota) && $anggota->pekerjaan == 'Pegawai Swasta' ? 'selected' : '' }}>Pegawai Swasta</option>
                                                <option value="Wiraswasta" {{ isset($anggota) && $anggota->pekerjaan == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
                                                <option value="Petani" {{ isset($anggota) && $anggota->pekerjaan == 'Petani' ? 'selected' : '' }}>Petani</option>
                                                <option value="Nelayan" {{ isset($anggota) && $anggota->pekerjaan == 'Nelayan' ? 'selected' : '' }}>Nelayan</option>
                                                <option value="Guru/Dosen" {{ isset($anggota) && $anggota->pekerjaan == 'Guru/Dosen' ? 'selected' : '' }}>Guru/Dosen</option>
                                                <option value="Tenaga Kesehatan" {{ isset($anggota) && $anggota->pekerjaan == 'Tenaga Kesehatan' ? 'selected' : '' }}>Tenaga Kesehatan</option>
                                                <option value="Pelajar/Mahasiswa" {{ isset($anggota) && $anggota->pekerjaan == 'Pelajar/Mahasiswa' ? 'selected' : '' }}>Pelajar/Mahasiswa</option>
                                                <option value="Ibu Rumah Tangga" {{ isset($anggota) && $anggota->pekerjaan == 'Ibu Rumah Tangga' ? 'selected' : '' }}>Ibu Rumah Tangga</option>
                                                <option value="Tidak Bekerja" {{ isset($anggota) && $anggota->pekerjaan == 'Tidak Bekerja' ? 'selected' : '' }}>Tidak Bekerja</option>
                                                <option value="Lainnya" {{ isset($anggota) && $anggota->pekerjaan == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Status Anggota</label>
                                            <div class="d-flex gap-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" 
                                                        name="status" value="Aktif" {{ isset($anggota) ? ($anggota->status == 'Aktif' ? 'checked' : '') : 'checked' }}>
                                                    <label class="form-check-label">Aktif</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" 
                                                        name="status" value="Nonaktif" {{ isset($anggota) && $anggota->status == 'Nonaktif' ? 'checked' : '' }}>
                                                    <label class="form-check-label">Tidak Aktif</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label>Keterangan</label>
                                            <textarea class="form-control" name="keterangan" >{{ $anggota->keterangan ?? '' }}</textarea>
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
                                                    src="{{ isset($anggota) && $anggota->foto_profil ? asset('storage/'.$anggota->foto_profil) : '' }}"
                                                    alt="Preview Gambar"
                                                    class="img-thumbnail {{ isset($anggota) && $anggota->foto_profil ? '' : 'd-none' }}"
                                                    style="max-height: 300px;">
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
