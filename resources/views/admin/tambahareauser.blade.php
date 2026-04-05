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
                                        <h5 class="card-title fw-semibold mb-0">Pembagian Area Petugas</h5>
                                        <div>
                                            <a href="/dasawisma" class="btn btn-info">Data Datawisma</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <h5 class="card-title fw-semibold card-header">Form Pembagian Area </h5>
                                <div class="card-body">
                                    <form id="formAreaUser">
                                        @csrf

                                        <input type="hidden" id="user_id" name="user_id">

                                        <!-- USER -->
                                         <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="mb-2">
                                                        <label class="form-label">Pengguna</label>
                                                        <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control rounded-pill" readonly>
                                                        
                                                        <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="mb-2">
                                                        <label class="form-label">Level Pengguna</label>
                                                        <input type="text" id="level" name="level" value="{{ $user->level }}" class="form-control rounded-pill" readonly>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                         </div>
                                        <!-- MULTI AREA -->
                                        <div class="mb-3">
                                            <label class="form-label">Area SubLingkungan</label>
                                            <select class="selectpicker form-control"
                                                    id="sub_lingkungan_id"
                                                    name="sub_lingkungan_id[]"
                                                    multiple
                                                    data-live-search="true">
                                                @foreach($sublingkungans as $sub)
                                                    <option value="{{ $sub->id }}"
                                                        {{ in_array($sub->id, $selected) ? 'selected' : '' }}>
                                                        {{ $sub->nama_sub_lingkungan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary w-100">
                                            Simpan Area
                                        </button>
                                    </form>
                                </div>
            
                            </div>

                </div>
            </div>
            {{-- @endif --}}
            <div id="alertBox" class="alert d-none position-fixed top-0 start-50 translate-middle-x mt-3 shadow alert-primary" style="z-index: 9999; min-width:300px;" role="alert"></div>

        @endsection
