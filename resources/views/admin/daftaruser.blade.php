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

            {{-- <div id="alert-container"></div> --}}

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


            <div id="errorAlert" class="alert alert-danger alert-dismissible fade" role="alert" style="display: none;">
                @if($errors->any())
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="row">
                <div class="col-lg-12" id="informasi-container">
                            <div class="row" >
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="card-title fw-semibold mb-0">Pengguna</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <h5 class="card-title fw-semibold card-header">Tambah Pengguna</h5>

                                <div class="card-body">
                                    <form id="formTambahPengguna">
                                        @csrf
                                        <div class="row">
                                        <div class="col-md-6">
                                            <!-- ID untuk mode edit -->
                                            <input type="hidden" id="jabatan_id">
                                            <div class="mb-3">
                                                <label class="form-label">Nama Pengguna</label>
                                                <input type="text" class="form-control rounded-pill" id="name" name="name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control rounded-pill" id="email" name="email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Level</label>
                                                <select id="level" name="level" class="form-control rounded-pill">
                                                    <option selected>Pilih Level</option>
                                                    <option value="ketua">Ketua</option>
                                                    <option value="verifikator">Verifikator</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="kepling">Kepling</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Status</label>
                                                <select class="form-control rounded-pill" id="status" name="status">
                                                    <option selected>Pilih Status</option>

                                                    <option value="active">Aktif</option>
                                                    <option value="inactive">Tidak Aktif</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Password</label>
                                                <input type="password" class="form-control rounded-pill" id="password" name="password">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Entri Ulang Password</label>
                                                <input type="password" class="form-control rounded-pill" id="repassword" name="repassword">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100" id="btnSubmit">
                                            Tambah Pengguna
                                        </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card">
                                <h5 class="card-title fw-semibold card-header">Daftar Pengguna</h5>
                                @if($users->isEmpty())
                                    <h4 class="text-center mt-5 mb-5">
                                        Tidak ada daftar pengguna ...
                                    </h4>
                                @else
                                <div class="card-body">
                                    <table class="table mt-4 table-responsive table-hover w-100" id="tabelPengguna">
                                        <thead class="table-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Level Pengguna</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $key => $user)
                                        <tr id="row-{{ $user->id }}">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->level }}</td>
                                            <td class="status-col">
                                                 @if($user->status == 'inactive')
                                                    <span class="badge bg-danger p-2 rounded">
                                                        {{ $user->status }}
                                                    </span>
                                                @else
                                                    <span class="badge bg-success p-2 rounded">
                                                        {{ $user->status }}
                                                    </span>
                                                @endif
                                            </td>
                                            @role('administrator', 'admin')
                                            <td>
                                                <button 
                                                        class="btn btn-warning btn-sm btnEditPengguna"
                                                        data-id="{{ $user->id }}"
                                                        data-name="{{ $user->name }}"
                                                        data-level="{{ $user->level }}"
                                                        data-email="{{ $user->email }}"
                                                        data-status="{{ $user->status }}"
                                                    >
                                                        Edit
                                                    </button>
                                                    <a href="{{ route('pengguna.area', $user->id) }}" 
                                                            class="btn btn-warning btn-sm">
                                                            Lihat
                                                        </a>
                                            </td>
                                            @endrole
                                        </tr>
                                        @endforeach
                                        </tbody>

                                    </table>
                                </div>
                                @endif
                            </div>
                </div>
            </div>

            <div class="modal fade" id="modalEditPengguna" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="formEditPengguna" autocomplete="off" >
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="edit_id">
                            <div class="modal-header">
                                <h5>Edit Pengguna</h5>
                            </div>
                            <div class="modal-body">

                                <div class="mb-2">
                                    <label class="form-label">Nama</label>
                                    <input type="text" id="edit_name" name="name" class="form-control rounded-pill">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Email</label>
                                    <input type="text" id="edit_email" name="email" class="form-control rounded-pill">
                                </div>

                                <div class="mb-2">
                                    <label class="form-label">Level Pegguna</label>
                                    <select id="edit_level" class="form-control rounded-pill">
                                        <option value="verifikator">Verifikator</option>
                                        <option value="admin">Admin</option>
                                        <option value="kepling">Kepling</option>
                                        <option value="ketua">Ketua</option>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Status User</label>
                                    <select id="edit_status" class="form-control rounded-pill">
                                        <option value="active">Aktif</option>
                                        <option value="inactive">Tidak Aktif</option>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Password</label>
                                    <input type="password" id="edit_password" name="password" class="form-control rounded-pill" autocomplete="new-password">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">
                                    Simpan
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            {{-- @endif --}}
            <div id="alertBox" class="alert d-none position-fixed top-0 start-50 translate-middle-x mt-3 shadow alert-primary" style="z-index: 9999; min-width:300px;" role="alert"></div>

        @endsection