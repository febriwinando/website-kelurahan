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
                                    <form id="formDasawisma">
                                        @csrf

                                        <div class="row">

                                        <div class="col-md-6 mb-3">
                                            <label>No KK</label>
                                            <select name="no_kk" class="form-control" required>
                                                <option value="">Pilih No KK</option>
                                                @foreach($wargas as $warga)
                                                    <option value="{{ $warga->no_kk }}">
                                                        {{ $warga->no_kk }} - {{ $warga->nama_kepala_keluarga }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Nama Keluarga</label>
                                            <input type="text" name="nama_keluarga" class="form-control">
                                        </div>

                                        </div>


                                        <hr>

                                        <h5>Jumlah Anggota Keluarga</h5>

                                        <div class="row">

                                        <div class="col-md-2 mb-3">
                                        <label>Balita</label>
                                        <input type="number" name="balita" class="form-control">
                                        </div>

                                        <div class="col-md-2 mb-3">
                                        <label>PUS</label>
                                        <input type="number" name="pus" class="form-control">
                                        </div>

                                        <div class="col-md-2 mb-3">
                                        <label>WUS</label>
                                        <input type="number" name="wus" class="form-control">
                                        </div>

                                        <div class="col-md-2 mb-3">
                                        <label>Ibu Hamil</label>
                                        <input type="number" name="ibu_hamil" class="form-control">
                                        </div>

                                        <div class="col-md-2 mb-3">
                                        <label>Ibu Menyusui</label>
                                        <input type="number" name="ibu_menyusui" class="form-control">
                                        </div>

                                        <div class="col-md-2 mb-3">
                                        <label>Lansia</label>
                                        <input type="number" name="lansia" class="form-control">
                                        </div>

                                        </div>


                                        <hr>

                                        <h5>Kriteria Rumah</h5>

                                        <div class="row">

                                        <div class="col-md-3">
                                        <label>Sehat</label>
                                        <input type="number" name="rumah_sehat" class="form-control">
                                        </div>

                                        <div class="col-md-3">
                                        <label>Kurang Sehat</label>
                                        <input type="number" name="rumah_kurang_sehat" class="form-control">
                                        </div>

                                        <div class="col-md-3">
                                        <label>Memiliki TPS</label>
                                        <input type="number" name="memiliki_tps" class="form-control">
                                        </div>

                                        <div class="col-md-3">
                                        <label>Pembuangan Sampah</label>
                                        <input type="number" name="pembuangan_sampah" class="form-control">
                                        </div>

                                        </div>


                                        <hr>

                                        <h5>Sumber Air</h5>

                                        <div class="row">

                                        <div class="col-md-3">
                                        <label>PDAM</label>
                                        <input type="number" name="pdam" class="form-control">
                                        </div>

                                        <div class="col-md-3">
                                        <label>Sumur</label>
                                        <input type="number" name="sumur" class="form-control">
                                        </div>

                                        <div class="col-md-3">
                                        <label>Sungai</label>
                                        <input type="number" name="sungai" class="form-control">
                                        </div>

                                        <div class="col-md-3">
                                        <label>Lainnya</label>
                                        <input type="number" name="lainnya_air" class="form-control">
                                        </div>

                                        </div>


                                        <hr>

                                        <h5>Makanan Pokok</h5>

                                        <div class="row">

                                        <div class="col-md-3">
                                        <label>Beras</label>
                                        <input type="number" name="beras" class="form-control">
                                        </div>

                                        <div class="col-md-3">
                                        <label>Non Beras</label>
                                        <input type="number" name="non_beras" class="form-control">
                                        </div>

                                        </div>


                                        <hr>

                                        <button type="submit" class="btn btn-primary">
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
