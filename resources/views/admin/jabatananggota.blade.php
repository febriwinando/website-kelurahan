        @php
            use Illuminate\Support\Str;
        @endphp

        @extends('admin.layouts.app') {{-- Pakai layout utama --}}

        @section('title', 'Dashboad Aduan')

        @section('content')
            {{-- <div id="successAlert" class="alert alert-success alert-dismissible fade" role="alert" style="display: none;">
                {{ session('success') }}
            </div> --}}

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div id="alert-container"></div>


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
            <div class="row">
                <div class="col-lg-12" id="informasi-container">
                    <div class="card">
                        <div class="card-body">
                            <div class="row" >
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="card-title fw-semibold mb-0">Daftar Jabatan Anggota Tim Penggerak PKK</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-text mb-3 fs-5 mt-2">
                                <span id="pelapor"></span>
                            </div>
                            <div class="card">
                                <h5 class="card-title fw-semibold card-header">Tambah Jabatan</h5>

                                <div class="card-body">
                
                                    <form id="formTambahJabatan">
                                        @csrf

                                        <!-- ID untuk mode edit -->
                                        <input type="hidden" id="jabatan_id">

                                        <div class="mb-3">
                                            <label class="form-label">Nama Jabatan</label>
                                            <input type="text" class="form-control" id="namaJabatan" name="nama_jabatan">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi Jabatan</label>
                                            <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Hierarki Jabatan</label>
                                            <select class="form-select" id="urutan" name="urutan">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Status</label>
                                            <select class="form-select" id="is_active" name="is_active">
                                                <option value="true">Aktif</option>
                                                <option value="false">Tidak Aktif</option>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary" id="btnSubmit">
                                            Tambah Jabatan
                                        </button>
                                    </form>

                                </div>
            
                            </div>

                            <div class="card">
                                <h5 class="card-title fw-semibold card-header">Bukti Aduan:</h5>
                                <div class="card-body">
                                    <table class="table mt-4" id="tabelJabatan">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Urutan</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($jabatans as $key => $jabatan)
                                        <tr id="row-{{ $jabatan->id }}">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $jabatan->nama_jabatan }}</td>
                                            <td>{{ $jabatan->urutan }}</td>
                                            <td>{{ $jabatan->is_active ? 'Aktif' : 'Tidak Aktif' }}</td>
                                            <td>
                                                <button class="btn btn-warning btn-sm editBtn" data-id="{{ $jabatan->id }}">Edit</button>
                                                <button class="btn btn-danger btn-sm deleteBtn" data-id="{{ $jabatan->id }}">Delete</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="py-6 px-6 text-center">
                <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank"
                    class="pe-1 text-primary text-decoration-underline">AdminMart.com</a>Distributed by <a href="https://themewagon.com/" target="_blank"
                    class="pe-1 text-primary text-decoration-underline">ThemeWagon</a></p>
                </div>
            </div>
            {{-- @endif --}}
            <div id="alertBox" class="alert d-none position-fixed top-0 start-50 translate-middle-x mt-3 shadow alert-primary" style="z-index: 9999; min-width:300px;" role="alert"></div>

        @endsection

        {{-- @section('scripts')
            <script src="{{ asset('storage/assets/js/scriptlapor.js') }}"></script>
        @endsection --}}