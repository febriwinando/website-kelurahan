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
                                            <a href="/keuangan" class="btn btn-info">Laporan Keuangan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <h5 class="card-title fw-semibold card-header">Form Inventaris</h5>
                                <div class="card-body">
                                    <form action="{{ route('keuangan.storeMultiple') }}" method="POST">
                                        @csrf 
                                        <input type="hidden" name="kegiatan_id"> 
                                        <table class="table" id="transaksiTable"> 
                                            <thead> 
                                                <tr> 
                                                    <th>Jenis</th> 
                                                    <th>Tanggal</th> 
                                                    <th style="display:none">Invoice</th> 
                                                    <th>Uraian</th> 
                                                    <th>Jumlah</th> 
                                                    <th></th> 
                                                </tr> 
                                            </thead> 
                                            <tbody> 
                                                <tr> 
                                                    <td> 
                                                        <select name="jenis[]" class="form-control rounded-pill"> 
                                                            <option value="pemasukan">Pemasukan</option> 
                                                            <option value="pengeluaran">Pengeluaran</option> 
                                                        </select> 
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control rounded-pill" name="tanggal[]" >
                                                    </td> 
                                                    <td style="display:none">
                                                        <input type="text" class="form-control rounded-pill" name="invoice[]" value="-">

                                                    </td>
                                                    <td> 
                                                        <input type="text" name="uraian[]" class="form-control rounded-pill"> 
                                                    </td> 
                                                    <td> 
                                                        <input type="number" name="jumlah[]" class="form-control rounded-pill"> 
                                                    </td> 
                                                    <td> 
                                                            <button type="button" class="btn btn-danger btn-sm" onclick="hapusBaris(this)">
                                                                <img src="{{ asset('storage/assets/svg/close20.svg') }}">     
                                                            </button> 
                                                    </td> 
                                                </tr> 
                                            </tbody> 
                                        </table> 
                                        <button type="button" class="btn btn-info" onclick="tambahBaris()">+ Tambah Baris</button> 
                                        <button type="submit" class="btn btn-primary"> Simpan Semua </button> 
                                    </form>
                                </div>
            
                            </div>

                </div>
            </div>
            {{-- @endif --}}
            <div id="alertBox" class="alert d-none position-fixed top-0 start-50 translate-middle-x mt-3 shadow alert-primary" style="z-index: 9999; min-width:300px;" role="alert"></div>

        @endsection
