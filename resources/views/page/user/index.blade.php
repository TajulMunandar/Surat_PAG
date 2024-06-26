@extends('layouts.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif (session()->has('failed'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('failed') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
        <!--  Row 1 -->
        <div class="row">
            <div class="col">
                <button class="btn btn-primary mb-3 p-2" data-bs-toggle="modal" data-bs-target="#tambahModal">
                    <i class="ti ti-plus fs-3 me-1"></i> Tambah
                </button>
            </div>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <table id="myTable" class="table responsive nowrap table-bordered table-striped align-middle"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>No Karyawan</th>
                                <th>Role</th>
                                <th>Divisi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->no_karyawan }}</td>
                                    <td>
                                        @if ($user->role === 1)
                                            <span class="badge p-2 bg-black">Super Admin</span>
                                        @elseif ($user->role === 2)
                                            <span class="badge p-2 bg-secondary">Admin</span>
                                        @else
                                            <span class="badge p-2 bg-info">Karyawan</span>
                                        @endif
                                    </td>
                                    <td>{{ $user->divisi->nama_divisi }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $loop->iteration }}"
                                            onclick="setEditForm('{{ route('user.update', $user->id) }}', '{{ $user->name }}', '{{ $user->role }}', '{{ $user->divisi_id }}')">
                                            <i class="ti ti-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalHapus{{ $loop->iteration }}"
                                            onclick="setDeleteForm('{{ route('user.destroy', $user->id) }}', '{{ $user->name }}')">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                        <button class="btn btn-sm btn-dark" data-bs-toggle="modal"
                                            data-bs-target="#modalResetPassword{{ $loop->iteration }}">
                                            <i class="ti ti-lock"></i>
                                        </button>
                                    </td>
                                </tr>

                                {{-- Modal Edit --}}
                                <div class="modal fade" id="editModal{{ $loop->iteration }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5">Edit User</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('user.update', $user->id) }}" method="post"
                                                id="editForm">
                                                <div class="modal-body">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="edit_name" class="form-label">Nama</label>
                                                        <input type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            name="name" id="edit_name"
                                                            value="{{ old('name', $user->name) }}" required>
                                                        @error('name')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_role" class="form-label">Role</label>
                                                        <select class="form-control @error('role') is-invalid @enderror"
                                                            name="role" id="edit_role" required>
                                                            <option value="1"
                                                                {{ old('role', $user->role) == '1' ? 'selected' : '' }}>
                                                                Superadmin
                                                            </option>
                                                            <option value="2"
                                                                {{ old('role', $user->role) == '2' ? 'selected' : '' }}>
                                                                Admin
                                                            </option>
                                                            <option value="3"
                                                                {{ old('role', $user->role) == '3' ? 'selected' : '' }}>
                                                                Karyawan
                                                            </option>
                                                        </select>
                                                        @error('role')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_no_karyawan" class="form-label">No Karyawan</label>
                                                        <input type="text"
                                                            class="form-control @error('no_karyawan') is-invalid @enderror"
                                                            name="no_karyawan" id="edit_no_karyawan"
                                                            value="{{ old('no_karyawan', $user->no_karyawan) }}" required>
                                                        @error('no_karyawan')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_divisi_id" class="form-label">Divisi</label>
                                                        <select
                                                            class="form-control @error('divisi_id') is-invalid @enderror"
                                                            name="divisi_id" id="edit_divisi_id" required>
                                                            @foreach ($divisis as $divisi)
                                                                <option value="{{ $divisi->id }}"
                                                                    {{ old('divisi_id', $user->divisi_id) == $divisi->id ? 'selected' : '' }}>
                                                                    {{ $divisi->nama_divisi }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('divisi_id')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- End Modal Edit --}}

                                {{-- Modal Hapus --}}
                                <div class="modal fade" id="modalHapus{{ $loop->iteration }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5">Hapus User</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('user.destroy', $user->id) }}" method="post"
                                                id="deleteForm">
                                                <div class="modal-body">
                                                    @csrf
                                                    @method('DELETE')
                                                    <p>Apakah Anda yakin ingin menghapus user ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- End Modal Hapus --}}


                                <div class="modal fade" id="modalResetPassword{{ $loop->iteration }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('user.resetPasswordAdmin') }}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Password Baru</label>
                                                        <div id="pwd1" class="input-group">
                                                            <input type="password"
                                                                class="form-control border-end-0 @error('password') is-invalid @enderror"
                                                                name="password" id="password"
                                                                value="{{ old('password') }}" required>
                                                            <span class="input-group-text cursor-pointer">
                                                                <i class="ti ti-eye-off" id="togglePassword"></i>
                                                            </span>
                                                            @error('password')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="password2" class="form-label">Konfirmasi Password
                                                            Baru</label>
                                                        <div id="pwd2" class="input-group">
                                                            <input type="password"
                                                                class="form-control border-end-0 @error('password2') is-invalid @enderror"
                                                                name="password2" id="password2"
                                                                value="{{ old('password2') }}" required>
                                                            <span class="input-group-text cursor-pointer">
                                                                <i class="ti ti-eye-off" id="togglePassword"></i>
                                                            </span>
                                                            @error('password2')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    {{-- Modal Tambah --}}
    <div class="modal fade" id="tambahModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Add User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('user.store') }}" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                id="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" id="password" required>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select @error('role') is-invalid @enderror" name="role" id="role"
                                required>
                                <option value="1" {{ old('role') == '1' ? 'selected' : '' }}>Superadmin
                                </option>
                                <option value="2" {{ old('role') == '2' ? 'selected' : '' }}>Admin</option>
                                <option value="3" {{ old('role') == '3' ? 'selected' : '' }}>Karyawan
                                </option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="no_karyawan" class="form-label">No Karyawan</label>
                            <input type="text" class="form-control @error('no_karyawan') is-invalid @enderror"
                                name="no_karyawan" id="no_karyawan" value="{{ old('no_karyawan') }}" required>
                            @error('no_karyawan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="divisi_id" class="form-label">Divisi</label>
                            <select class="form-select @error('divisi_id') is-invalid @enderror" name="divisi_id"
                                id="divisi_id" required>
                                @foreach ($divisis as $divisi)
                                    <option value="{{ $divisi->id }}">{{ $divisi->nama_divisi }}</option>
                                @endforeach
                            </select>
                            @error('divisi_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End Modal Tambah --}}
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                // "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
                "scrollX": true,
                "language": {
                    "search": "",
                    "searchPlaceholder": "Search...",
                    "decimal": ",",
                    "thousands": "."
                }
            });
            $(document).ready(function() {
                $('.dataTables_filter input[type="search"]').css({
                    "marginBottom": "10px"
                });
                $('.dataTables_paginate ').css({
                    "marginTop": "10px"
                });
            });
        });

        const input1 = document.querySelector("#pwd1 input");
        const eye1 = document.querySelector("#pwd1 .ti-eye-off");

        eye1.addEventListener("click", () => {
            if (input1.type === "password") {
                input1.type = "text";

                eye1.classList.remove("ti-eye-off");
                eye1.classList.add("ti-eye-check");
            } else {
                input1.type = "password";

                eye1.classList.remove("ti-eye-check");
                eye1.classList.add("ti-eye-off");
            }
        });

        const input2 = document.querySelector("#pwd2 input");
        const eye2 = document.querySelector("#pwd2 .ti-eye-off");

        eye2.addEventListener("click", () => {
            if (input2.type === "password") {
                input2.type = "text";

                eye2.classList.remove("ti-eye-off");
                eye2.classList.add("ti-eye-check");
            } else {
                input2.type = "password";

                eye2.classList.remove("ti-eye-check");
                eye2.classList.add("ti-eye-off");
            }
        });
    </script>
@endpush
