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
                                        <h5 class="card-title fw-semibold mb-0">Tambah Data Warga TP-PKK</h5>
                                        <div>
                                            <a href="{{ route('warga.lihat', $no_kk->no_kk) }}" class="btn btn-success">
                                                Daftar Anggota Keluarga {{$no_kk->nama_kepala_keluarga}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <h5 class="card-title fw-semibold card-header">Form TP-PKK </h5>

                                <div class="card-body">
                                   <form id="formTambahAnggotaKK" method="POST" action="{{ isset($warga) ? route('warga.update',$warga->id) : route('warga.tambahanggotakk')}}">
                                        @csrf
                                        @if(isset($warga))
                                            @method('PUT')
                                            <input type="hidden" name="id" id="warga_id">
                                            <!-- <input type="hidden" name="provinsi_id" id="provinsi_id" value="{{ $warga->provinsi ?? '' }}">
                                            <input type="hidden" name="kabupaten_id" id="kabupaten_id" value="{{ $warga->kabupaten ?? '' }}">
                                            <input type="hidden" name="kecamatan_id" id="kecamatan_id" value="{{ $warga->kecamatan ?? '' }}">
                                            <input type="hidden" name="kelurahan_id" id="kelurahan_id" value="{{ $warga->kelurahan ?? '' }}"> -->
                                            
                                        @endif
                                        
                                        @if(isset($warga))
                                        <input type="hidden" id="edit_provinsi" value="{{ $warga->provinsi }}">
                                        <input type="hidden" id="edit_kabupaten" value="{{ $warga->kabupaten }}">
                                        <input type="hidden" id="edit_kecamatan" value="{{ $warga->kecamatan }}">
                                        <input type="hidden" id="edit_kelurahan" value="{{ $warga->kelurahan }}">
                                        <input type="hidden" id="edit_dasa_wisma" value="{{ $warga->dasa_wisma }}">
                                        @endif

                                        @if($no_kk)
                                            <input type="hidden" id="edit_dasa_wisma" value="{{ $no_kk->dasa_wisma }}">
                                        @endif
                                        
                                        <div class="row">
                                            <!-- <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Dasa Wisma</label>
                                                    <input type="text" name="dasa_wisma" value="{{ $warga->dasa_wisma ?? '' }}" class="form-control rounded-pill">
                                                </div>
                                            </div> -->
                                            <div class="col-md-6">
                                                    <label class="form-label">Sub Lingkungan</label>
                                                    <select class="selectpicker form-control"
                                                            id="dasa_wisma"
                                                            data-live-search="true"
                                                            title="Pilih Dasa Wisma" name="dasa_wisma" aria-label="readonly input" readonly>
                                                        @foreach($sublingkungans as $sublingkungan)
                                                            <option value="{{ $sublingkungan->nama_sub_lingkungan }}">{{ $sublingkungan->nama_sub_lingkungan }}</option>
                                                        @endforeach
                                                    </select>
                                                    </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Nama Kepala Keluarga</label>
                                                    <input type="text" name="nama_kepala_keluarga" value="{{ $no_kk->nama_kepala_keluarga ?? '' }}" class="form-control rounded-pill" raria-label="readonly input" eadonly>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">No. Kartu Keluara</label>
                                                    <input type="text" name="no_kk" value="{{ $no_kk->no_kk ?? '' }}" class="form-control rounded-pill" aria-label="readonly input" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <hr>

                                        <div class="row">
                                        
                                            <div class="col-md-6">
                                                    <div class="mb-3">
                                                    <label class="form-label">No Registrasi</label>
                                                    <input type="text" name="no_registrasi" value="{{ $warga->no_registrasi ?? '' }}" class="form-control rounded-pill">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">No KTP/NIK</label>
                                                <input type="text" name="nik" value="{{ $warga->nik ?? '' }}" class="form-control rounded-pill">
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Nama</label>
                                                <input type="text" name="nama" value="{{ $warga->nama ?? '' }}" class="form-control rounded-pill">
                                            </div>
                                        
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Jabatan</label>
                                                    <input type="text" name="jabatan" value="{{ $warga->jabatan ?? '' }}" class="form-control rounded-pill">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                 {{-- Jenis Kelamin --}}
                                                <div class="mb-3">
                                                    <label class="form-label">Jenis Kelamin</label><br>
                                                    <div class="d-flex gap-3 mt-2">
                                                        <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-Laki" {{ isset($warga) && $warga->jenis_kelamin == 'Laki-Laki' ? 'checked' : '' }}><label class="form-check-label">Laki-Laki</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" {{ isset($warga) && $warga->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}><label class="form-check-label">Perempuan</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="tempatLahir" class="form-label">Tempat Lahir</label>
                                                    <select id="tempatLahir" name="tempat_lahir" class="selectpicker form-control" data-live-search="true" title="pilih tempat kelahiran">
                                                        @foreach($kabupatens as $kabupaten)
                                                            <option value="{{ $kabupaten->id }}" data-name="{{ $kabupaten->nama }}" {{ isset($warga) && $warga->tempat_lahir == $kabupaten->id ? 'selected' : '' }}>
                                                                {{ $kabupaten->nama }} - {{ $kabupaten->provinsi->nama }}   
                                                            </option>
                                                        @endforeach   
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                             <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Tanggal Lahir</label>
                                                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', isset($warga) ? $warga->tanggal_lahir?->format('Y-m-d') : '') }}" class="form-control rounded-pill">
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                {{-- Status Perkawinan --}}
                                                <div class="mb-3">
                                                    
                                                    <labe class="form-label">Status Perkawinan</label><br>
                                                    <div class="d-flex gap-3 mt-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status_perkawinan" value="Menikah"
                                                            {{ isset($warga) && $warga->status_perkawinan == 'Menikah' ? 'checked' : '' }}>
                                                            <label class="form-check-label">Menikah</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status_perkawinan" value="Lajang"
                                                            {{ isset($warga) && $warga->status_perkawinan == 'Lajang' ? 'checked' : '' }}>
                                                            <label class="form-check-label">Lajang</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status_perkawinan" value="Janda"
                                                            {{ isset($warga) && $warga->status_perkawinan == 'Janda' ? 'checked' : '' }}>
                                                            <label class="form-check-label">Janda</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status_perkawinan" value="Duda"
                                                            {{ isset($warga) && $warga->status_perkawinan == 'Duda' ? 'checked' : '' }}>
                                                            <label class="form-check-label">Duda</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                {{-- Status Dalam Keluarga --}}
                                                <div class="mb-3">
                                                    <label class="form-label">Status Dalam Keluarga</label><br>
                                                    <div class="d-flex gap-3 mt-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status_dalam_keluarga" value="Kepala Rumah Tangga"
                                                            {{ isset($warga) && $warga->status_dalam_keluarga == 'Kepala Rumah Tangga' ? 'checked' : '' }}>
                                                            <label class="form-check-label">Kepala Rumah Tangga </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status_dalam_keluarga" value="Anggota Keluarga"
                                                            {{ isset($warga) && $warga->status_dalam_keluarga == 'Anggota Keluarga' ? 'checked' : '' }}>
                                                            <label class="form-check-label">Anggota Keluarga </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                {{-- Agama --}}
                                                <div class="mb-3">
                                                    <label class="form-label">Agama</label><br>
                                                    <div class="mb-3">
                                                            <select name="agama" id="agama" class="form-select rounded-pill">
                                                                @foreach(['Islam','Kristen','Katholik','Hindu','Budha','Khonghucu','Kepercayaan Lain'] as $agama)
                                                                    <option value="{{ $agama }}" {{ isset($warga) && $warga->agama == $agama ? 'selected' : '' }}>{{ $agama }}</option>
                                                                @endforeach
                                                            </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Alamat</label>
                                                    <textarea name="alamat" class="form-control rounded-pill"> {{ $warga->alamat ?? '' }} </textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row mb-3">

                                                    <div class="col-md-3">
                                                    <label class="form-label">Provinsi</label>
                                                    <select class="selectpicker form-control"
                                                            id="provinsi"
                                                            data-live-search="true"
                                                            title="Pilih Provinsi" name="provinsi">
                                                        @foreach($provinsis as $provinsi)
                                                            <option value="{{ $provinsi->id }}">{{ $provinsi->nama }}</option>
                                                        @endforeach

                                                    </select>
                                                    </div>


                                                    <div class="col-md-3">
                                                    <label class="form-label">Kabupaten/Kota</label>
                                                    <select class="selectpicker form-control"
                                                            id="kabupaten"
                                                            data-live-search="true"
                                                            title="Pilih Kabupaten" name="kabupaten"
                                                            disabled>
                                                    </select>
                                                    </div>


                                                    <div class="col-md-3">
                                                    <label class="form-label">Kecamatan</label>
                                                    <select class="selectpicker form-control"
                                                            id="kecamatan"
                                                            data-live-search="true"
                                                            title="Pilih Kecamatan" name="kecamatan"
                                                            disabled>
                                                    </select>
                                                    </div>


                                                    <div class="col-md-3">
                                                    <label class="form-label">Desa/Kelurahan</label>
                                                    <select class="selectpicker form-control"
                                                            id="kelurahan"
                                                            data-live-search="true"
                                                            title="Pilih Kelurahan" name="kelurahan"
                                                            disabled>
                                                    </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                {{-- Pendidikan --}}
                                                <div class="mb-3">
                                                    <label for="pendidikan" class="form-label">Pendidikan</label>
                                                    <select name="pendidikan" id="pendidikan" class="form-select rounded-pill">
                                                        <option value="">-- Pilih Pendidikan --</option>
                                                        <option value="SD" {{ isset($warga) && $warga->pendidikan == 'SD' ? 'selected' : '' }}>SD</option>
                                                        <option value="SMP" {{ isset($warga) && $warga->pendidikan == 'SMP' ? 'selected' : '' }}>SMP</option>
                                                        <option value="SMA/SMK" {{ isset($warga) && $warga->pendidikan == 'SMA/SMK' ? 'selected' : '' }}>SMA/SMK</option>
                                                        <option value="S1" {{ isset($warga) && $warga->pendidikan == 'S1' ? 'selected' : '' }}>S1</option>
                                                        <option value="S2" {{ isset($warga) && $warga->pendidikan == 'S2' ? 'selected' : '' }}>S2</option>
                                                        <option value="S3" {{ isset($warga) && $warga->pendidikan == 'S3' ? 'selected' : '' }}>S3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                {{-- Pekerjaan --}}
                                                <div class="mb-3">
                                                    <label class="form-label">Pekerjaan</label><br>
                                                    <select name="pekerjaan" id="pekerjaan" class="form-select rounded-pill">
                                                                <option value="">-- Pilih Pekerjaan --</option>
                                                                <option value="ASN/PNS" {{ isset($warga) && $warga->pekerjaan == 'ASN/PNS' ? 'selected' : '' }}>ASN/PNS</option>
                                                                <option value="TNI/Polri" {{ isset($warga) && $warga->pekerjaan == 'TNI/Polri' ? 'selected' : '' }}>TNI/Polri</option>
                                                                <option value="Pegawai Swasta" {{ isset($warga) && $warga->pekerjaan == 'Pegawai Swasta' ? 'selected' : '' }}>Pegawai Swasta</option>
                                                                <option value="Wiraswasta" {{ isset($warga) && $warga->pekerjaan == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
                                                                <option value="Petani" {{ isset($warga) && $warga->pekerjaan == 'Petani' ? 'selected' : '' }}>Petani</option>
                                                                <option value="Nelayan" {{ isset($warga) && $warga->pekerjaan == 'Nelayan' ? 'selected' : '' }}>Nelayan</option>
                                                                <option value="Guru/Dosen" {{ isset($warga) && $warga->pekerjaan == 'Guru/Dosen' ? 'selected' : '' }}>Guru/Dosen</option>
                                                                <option value="Tenaga Kesehatan" {{ isset($warga) && $warga->pekerjaan == 'Tenaga Kesehatan' ? 'selected' : '' }}>Tenaga Kesehatan</option>
                                                                <option value="Pelajar/Mahasiswa" {{ isset($warga) && $warga->pekerjaan == 'Pelajar/Mahasiswa' ? 'selected' : '' }}>Pelajar/Mahasiswa</option>
                                                                <option value="Ibu Rumah Tangga" {{ isset($warga) && $warga->pekerjaan == 'Ibu Rumah Tangga' ? 'selected' : '' }}>Ibu Rumah Tangga</option>
                                                                <option value="Tidak Bekerja" {{ isset($warga) && $warga->pekerjaan == 'Tidak Bekerja' ? 'selected' : '' }}>Tidak Bekerja</option>
                                                                <option value="Lainnya" {{ isset($warga) && $warga->pekerjaan == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                                            </select>
                                                </div>

                                            </div>
                                            
                                                {{-- Ya Tidak Section --}}
                                                @php
                                                    $yesNoFields = [
                                                        'akseptor_kb' => 'Akseptor KB',
                                                        'aktif_posyandu' => 'Aktif Posyandu',
                                                        'ikut_bkb' => 'Mengikuti BKB',
                                                        'memiliki_tabungan' => 'Memiliki Tabungan',
                                                        'ikut_kelompok_belajar' => 'Ikut Kelompok Belajar',
                                                        'ikut_paud' => 'Ikut PAUD',
                                                        'ikut_koperasi' => 'Ikut Koperasi'
                                                    ];
                                                @endphp

                                                @foreach($yesNoFields as $field => $label)
                                                    <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ $label }}</label><br>

                                                        <div class="d-flex gap-3 mt-2">

                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="{{ $field }}"
                                                                    value="1"
                                                                    {{ isset($warga) && $warga->$field == 1 ? 'checked' : '' }}>
                                                                <label class="form-check-label">Ya</label>
                                                            </div>

                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="{{ $field }}"
                                                                    value="0"
                                                                    {{ isset($warga) && $warga->$field == 0 ? 'checked' : '' }}>
                                                                <label class="form-check-label">Tidak</label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    </div>
                                                @endforeach
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Jenis Kelompok Belajar</label>
                                                    <input type="text" name="jenis_kelompok_belajar" class="form-control rounded-pill">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Jenis Koperasi</label>
                                                    <input type="text" name="jenis_koperasi" class="form-control rounded-pill">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <!-- <button type="submit" class="btn btn-primary w-100">
                                                    Simpan Data
                                                </button> -->
                                                <button type="submit" class="btn btn-primary w-100">
                                                    {{ isset($warga) ? 'Update Data' : 'Simpan Data' }}
                                                </button>
                                            </div>
                                        </div>                                        
                                    </form>
                                </div>
                                
            
                            </div>

                </div>
            </div>
            {{-- @endif --}}
            <div id="alertBox" class="alert d-none position-fixed top-0 start-50 translate-middle-x mt-3 shadow alert-primary" style="z-index: 9999; min-width:300px;" role="alert"></div>            
        @endsection
