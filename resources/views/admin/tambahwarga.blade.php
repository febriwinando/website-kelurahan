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
                                            <a href="/notulen" class="btn btn-info">Arsip Notulen</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <h5 class="card-title fw-semibold card-header">Form TP-PKK </h5>

                                <div class="card-body">
                                   <form id="formWarga">
                                        @csrf

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label">Dasa Wisma</label>
                                                <input type="text" name="dasa_wisma" class="form-control rounded-pill">
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Nama Kepala Keluarga</label>
                                                <input type="text" name="nama_kepala_keluarga" class="form-control rounded-pill">
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label class="form-label">No Registrasi</label>
                                                <input type="text" name="no_registrasi" class="form-control rounded-pill">
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">No KTP/NIK</label>
                                                <input type="text" name="nik" class="form-control rounded-pill">
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Nama</label>
                                                <input type="text" name="nama" class="form-control rounded-pill">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Jabatan</label>
                                            <input type="text" name="jabatan" class="form-control rounded-pill">
                                        </div>

                                        {{-- Jenis Kelamin --}}
                                        <div class="mb-3">
                                            <label class="form-label">Jenis Kelamin</label><br>
                                            <div class="d-flex gap-3 mt-2">
                                                <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-Laki"><label class="form-check-label">Laki-Laki</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan"><label class="form-check-label">Perempuan</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="tempatLahir" class="form-label">Tempat Lahir</label>
                                                    <select id="tempatLahir" name="tempat_lahir" class="selectpicker form-control" data-live-search="true" title="pilih tempat kelahiran">
                                                        @foreach($kecamatans as $kecamatan)
                                                            <option value="{{ $kecamatan->id }}" data-name="{{ $kecamatan->nama }}" {{ isset($anggota) && $anggota->tempat_lahir == $kecamatan->id ? 'selected' : '' }}>
                                                                {{ $kecamatan->nama }}- {{ $kecamatan->provinsi->nama }}   
                                                            </option>
                                                        @endforeach   
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Tanggal Lahir</label>
                                                <input type="date" name="tanggal_lahir" class="form-control">
                                            </div>
                                        </div>

                                        {{-- Status Perkawinan --}}
                                        <div class="mb-3">
                                            
                                            <labe class="form-label">Status Perkawinan</label><br>
                                            <div class="d-flex gap-3 mt-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status_perkawinan" value="Menikah">
                                                    <label class="form-check-label">Menikah</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status_perkawinan" value="Lajang">
                                                    <label class="form-check-label">Lajang</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status_perkawinan" value="Janda"><label class="form-check-label">Janda</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status_perkawinan" value="Duda"><label class="form-check-label">Duda</label>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Status Dalam Keluarga --}}
                                        <div class="mb-3">
                                            <label class="form-label">Status Dalam Keluarga</label><br>
                                            <div class="d-flex gap-3 mt-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status_dalam_keluarga" value="Kepala Rumah Tangga">
                                                    <label class="form-check-label">Kepala Rumah Tangga </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status_dalam_keluarga" value="Anggota Keluarga">
                                                    <label class="form-check-label">Anggota Keluarga </label>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Agama --}}
                                        <div class="mb-3">
                                            <label class="form-label">Agama</label><br>
                                            <div class="mb-3">
                                                    <select name="agama" id="agama" class="form-select rounded-pill">
                                                        @foreach(['Islam','Kristen','Katholik','Hindu','Budha','Khonghucu','Kepercayaan Lain'] as $agama)
                                                            <option value="{{ $agama }}">{{ $agama }}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Alamat</label>
                                            <textarea name="alamat" class="form-control"></textarea>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-3">
                                                <label class="form-label">Desa</label>
                                                <input type="text" name="desa" class="form-control">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Kecamatan</label>
                                                <input type="text" name="kecamatan" class="form-control">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Kabupaten</label>
                                                <input type="text" name="kabupaten" class="form-control">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Provinsi</label>
                                                <input type="text" name="provinsi" class="form-control">
                                            </div>
                                        </div>

                                        {{-- Pendidikan --}}
                                        <div class="mb-3">
                                            <label class="form-label">Pendidikan</label><br>
                                        <div class="mb-3">
                                            <label for="pendidikan" class="form-label">Pendidikan</label>
                                                <select name="pendidikan" id="pendidikan" class="form-select rounded-pill">
                                                    @foreach(['Tidak Tamat SD','SD/MI','SMP','SMU/SMK','Diploma','S1','S2','S3'] as $pendidikan)
                                                        <option value="{{ $pendidikan }}" >{{ $pendidikan }}</option>
                                                    @endforeach
                                                </select>
                                        </div>

                                        {{-- Pekerjaan --}}
                                        <div class="mb-3">
                                            <label class="form-label">Pekerjaan</label><br>
                                            <!-- @foreach(['Petani','Pedagang','Swasta','Wirausaha','PNS','TNI/Polri','Lainnya'] as $pekerjaan)
                                                <input type="radio" name="pekerjaan" value="{{ $pekerjaan }}"> {{ $pekerjaan }}
                                            @endforeach -->
                                            <select name="pekerjaan" id="pekerjaan" class="form-select rounded-pill">
                                                        <option value="">-- Pilih Pekerjaan --</option>
                                                        <option value="ASN/PNS" {{ isset($anggota) && $anggota->pekerjaan == 'ASN/PNS' ? 'selected' : '' }}>ASN/PNS</option>
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
                                        <div class="mb-3">
                                            <label class="form-label">{{ $label }}</label><br>
                                            <div class="d-flex gap-3 mt-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="{{ $field }}" value="Ya"><label class="form-check-label">Ya</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="{{ $field }}" value="Tidak"><label class="form-check-label">Tidak</label>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                        <div class="mb-3">
                                            <label class="form-label">Jenis Kelompok Belajar</label>
                                            <input type="text" name="jenis_kelompok_belajar" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Jenis Koperasi</label>
                                            <input type="text" name="jenis_koperasi" class="form-control">
                                        </div>

                                        <button type="submit" class="btn btn-primary w-100">
                                            Simpan Data
                                        </button>
                                    </form>
                                </div>
                                
            
                            </div>

                </div>
            </div>
            {{-- @endif --}}
            <div id="alertBox" class="alert d-none position-fixed top-0 start-50 translate-middle-x mt-3 shadow alert-primary" style="z-index: 9999; min-width:300px;" role="alert"></div>

            <script>
                $('#formWarga').submit(function(e){
                    e.preventDefault();

                    $.ajax({
                        url: "{{ route('warga.store') }}",
                        type: "POST",
                        data: $(this).serialize(),
                        success: function(response){
                            alert('Data berhasil disimpan');
                            $('#formWarga')[0].reset();
                        },
                        error: function(xhr){
                            alert('Terjadi kesalahan');
                        }
                    });
                });
            </script>
        @endsection
