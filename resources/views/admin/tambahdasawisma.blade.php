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
                                        <h5 class="card-title fw-semibold mb-0">Notulen Rapat</h5>
                                        <div>
                                            <a href="/dasawisma" class="btn btn-info">Data Datawisma</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <h5 class="card-title fw-semibold card-header">Form Notulen </h5>
                                <div class="card-body">
                                    <form id="formDasawisma">
                                        @csrf
                                        @if(isset($dasa))
                                            <input type="hidden" name="dasa_id" id="dasa_id" value="{{ $dasa->id }}">
                                        @endif

                                        <div class="row">

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">No KK</label>
                                            <select name="no_kk" class="selectpicker form-control rounded-pill no_kk_insert" id="no_kk" data-live-search="true" required>
                                                <option value="">Pilih No KK</option>
                                                @foreach($wargas as $warga)
                                                    <option value="{{ $warga->no_kk }}" data-nama="{{ $warga->nama_kepala_keluarga }}" {{ isset($dasa) && $warga->no_kk == $dasa->no_kk ? 'selected' : '' }}>
                                                        {{ $warga->no_kk }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Nama Kepala Keluarga</label>
                                            <input type="text" name="nama_keluarga" id="nama_keluarga" class="form-control rounded-pill" value="{{ $dasa->nama_keluarga ?? '' }}" readonly>
                                        </div>

                                        </div>

                                        <hr>

                                        <h5>Jumlah Anggota Keluarga</h5>

                                        <div class="row">
                                            <div class="col-md-2 mb-3">
                                                <label class="form-label">PUS</label>
                                                <input type="number" name="pus" class="form-control rounded-pill" value="{{ $dasa->pus ?? '0' }}">
                                            </div>

                                            <div class="col-md-2 mb-3">
                                                <label class="form-label">WUS</label>
                                                <input type="number" name="wus" class="form-control rounded-pill" value="{{ $dasa->wus ?? '0' }}">
                                            </div>

                                            <div class="col-md-2 mb-3">
                                                <label class="form-label">Ibu Hamil</label>
                                                <input type="number" name="ibu_hamil" class="form-control rounded-pill" value="{{ $dasa->ibu_hamil ?? '0' }}">
                                            </div>

                                            <div class="col-md-2 mb-3">
                                                <label class="form-label">Ibu Menyusui</label>
                                                <input type="number" name="ibu_menyusui" class="form-control rounded-pill" value="{{ $dasa->ibu_menyusui ?? '0' }}">
                                            </div>

                                            <div class="col-md-2 mb-3">
                                                <label class="form-label">Lansia</label>
                                                <input type="number" name="lansia" class="form-control rounded-pill" value="{{ $dasa->lansia ?? '0' }}">
                                            </div>
                                            <hr>
                                            <h6>Balita</h6>
                                             <div class="col-md-2 mb-3">
                                                <label class="form-label">Laki-laki</label>
                                                <input type="number" name="balita_l" class="form-control rounded-pill" value="{{ $dasa->balita_l ?? '0' }}">
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label class="form-label">Perempuan</label>
                                                <input type="number" name="balita_p" class="form-control rounded-pill" value="{{ $dasa->balita_p ?? '0' }}">
                                            </div>
                                            <hr>
                                             <h6>Buta</h6>
                                            <div class="col-md-2 mb-3">
                                                <label class="form-label">Laki-Laki</label>
                                                <input type="number" name="buta_l" class="form-control rounded-pill" value="{{ $dasa->buta_l ?? '0' }}">
                                            </div>
                                             <div class="col-md-2 mb-3">
                                                <label class="form-label">Perempuan</label>
                                                <input type="number" name="buta_p" class="form-control rounded-pill" value="{{ $dasa->buta_p ?? '0' }}">
                                            </div>

                                        </div>


                                        <hr>

                                        <h5>Kriteria Rumah</h5>

                                        <div class="row">
                                            <div class="col-md-3 mb-2">
                                                <label class="form-label">
                                                    <input type="checkbox" name="rumah_sehat" value="1"  {{ isset($dasa) && $dasa->rumah_sehat ? 'checked' : '' }}>
                                                    Sehat
                                                </label>
                                            </div>

                                            <div class="col-md-3 mb-2">
                                                <label class="form-label">
                                                    <input type="checkbox" name="rumah_kurang_sehat" value="1"  {{ isset($dasa) && $dasa->rumah_kurang_sehat ? 'checked' : '' }}>
                                                    Kurang Sehat
                                                </label>
                                            </div>

                                            <div class="col-md-3 mb-2">
                                                <label class="form-label">
                                                    <input type="checkbox" name="memiliki_tps" value="1" {{ isset($dasa) && $dasa->memiliki_spal ? 'checked' : '' }}>
                                                    Memiliki TPS
                                                </label>
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <label class="form-label">
                                                    <input type="checkbox" name="pembuangan_sampah" value="1" {{ isset($dasa) && $dasa->memiliki_tempat_sampah ? 'checked' : '' }}   >
                                                    Pembuangan Sampah
                                                </label>
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <label class="form-label">
                                                    <input type="checkbox" name="memiliki_spal" value="1" {{ isset($dasa) && $dasa->memiliki_spal ? 'checked' : '' }}   >
                                                    Memiliki SPAL
                                                </label>
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <label class="form-label">
                                                    <input type="checkbox" name="memiliki_stiker_p4k" value="1" {{ isset($dasa) && $dasa->memiliki_stiker_p4k ? 'checked' : '' }}   >
                                                    Menempel Stiker P4K
                                                </label>
                                            </div>

                                        </div>


                                        <hr>

                                        <h5>Sumber Air</h5>

                                        <div class="row">

                                            <div class="col-md-3">
                                                <label class="form-label">
                                                    <input type="checkbox" name="pdam" value="1"  {{ isset($dasa) && $dasa->air_pdam ? 'checked' : '' }}    >
                                                    PDAM
                                                </label>
                                            </div>

                                            <div class="col-md-3">
                                                <label class="form-label">
                                                    <input type="checkbox" name="sumur" value="1" {{ isset($dasa) && $dasa->air_sumur ? 'checked' : '' }}  >
                                                    Sumur
                                                </label>
                                            </div>

                                            <div class="col-md-3">
                                                <label class="form-label">
                                                    <input type="checkbox" name="sungai" value="1" {{ isset($dasa) && $dasa->air_sungai ? 'checked' : '' }}  >
                                                    Sungai
                                                </label>
                                            </div>

                                            <div class="col-md-3">
                                                <label class="form-label">
                                                    <input type="checkbox" name="lainnya_air" value="1" {{ isset($dasa) && $dasa->air_lainnya ? 'checked' : '' }}  >
                                                    Lainnya
                                                </label>
                                            </div>

                                        </div>

                                        <hr>

                                        <h5>Makanan Pokok</h5>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label">
                                                    <input type="checkbox" name="beras" value="1" {{ isset($dasa) && $dasa->beras ? 'checked' : '' }}>
                                                    Beras
                                                </label>
                                            </div>

                                            <div class="col-md-3">
                                                <label class="form-label">
                                                    <input type="checkbox" name="non_beras" value="1" {{ isset($dasa) && $dasa->non_beras ? 'checked' : '' }}>
                                                    Non Beras
                                                </label>
                                            </div>
                                        </div>


                                        <hr>
                                        <h5>Kegiatan Warga</h5>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label">
                                                    <input type="checkbox" name="up2k" value="1" {{ isset($dasa) && $dasa->beras ? 'checked' : '' }}>
                                                    UP2K
                                                </label>
                                            </div>

                                            <div class="col-md-3">
                                                <label class="form-label">
                                                    <input type="checkbox" name="pemanfaatan_tanaman_pekarangan" value="1" {{ isset($dasa) && $dasa->pemanfaatan_tanaman_pekarangan ? 'checked' : '' }}>
                                                    Pemanfaatan Tanaman Pekarangan
                                                </label>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">
                                                    <input type="checkbox" name="industri_rumah_tangga" value="1" {{ isset($dasa) && $dasa->industri_rumah_tangga ? 'checked' : '' }}>
                                                    Industri Rumah Tangga
                                                </label>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">
                                                    <input type="checkbox" name="kesehatan_lingkungan" value="1" {{ isset($dasa) && $dasa->kesehatan_lingkungan ? 'checked' : '' }}>
                                                    Kesehatan Lingkungan
                                                </label>
                                            </div>
                                        </div>

                                        <hr>

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

            
        @endsection
