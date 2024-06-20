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
                <button class="btn btn-primary mb-3 p-2" type="button" data-bs-toggle="modal"
                    data-bs-target="#tambahModal">
                    <i class="ti ti-plus fs-3 me-1"></i> Tambah
                </button>
            </div>
            <div class="col">
                <ul class="nav nav-pills d-flex justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('surat-jsa.index') }}">JSA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('surat-magang.index') }}">Magang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('surat-peminjaman.index') }}">Peminjaman</a>
                    </li>
                </ul>
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
                                <th>Nama Karyawan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jsas as $jsa)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $jsa->users->name }}</td>
                                    <td>
                                        @if ($jsa->informasi_umum->isNotEmpty() && $jsa->alat_pelindung->isNotEmpty() && $jsa->uraian->isNotEmpty())
                                            <a class="btn btn-sm btn-info" href="{{ route('surat-jsa.edit', $jsa->id) }}">
                                                <i class="ti ti-eye"></i> Edit
                                            </a>
                                        @else
                                            <a class="btn btn-sm btn-info" href="{{ route('surat-jsa.show', $jsa->id) }}">
                                                <i class="ti ti-eye"></i> Show
                                            </a>
                                        @endif

                                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $loop->iteration }}">
                                            <i class="ti ti-edit"></i>
                                        </button>
                                        <button data-bs-target="#modalHapus{{ $loop->iteration }}"
                                            class="btn btn-sm btn-danger" data-bs-toggle="modal">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Modal Edit -->
                                <div class="modal fade" id="editModal{{ $loop->iteration }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5">Edit JSA</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('surat-jsa.update', $jsa->id) }}" method="post"
                                                id="editForm">
                                                <div class="modal-body">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="edit_user" class="form-label">Nama Karyawan</label>
                                                        <select class="form-select" name="user_id" id="user_id">
                                                            @foreach ($users as $user)
                                                                @if (old('user_id', $user->id) == $jsa->user_id)
                                                                    <option value="{{ $user->id }}" selected>
                                                                        {{ $user->name }}</option>
                                                                @else
                                                                    <option value="{{ $user->id }}">
                                                                        {{ $user->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        @error('nama_divisi')
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

                                <!-- Modal Hapus -->
                                <div class="modal fade" id="modalHapus{{ $loop->iteration }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5">Hapus JSA</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('surat-jsa.destroy', $jsa->id) }}" method="post"
                                                id="deleteForm">
                                                <div class="modal-body">
                                                    @csrf
                                                    @method('DELETE')
                                                    <p>Apakah Anda yakin ingin menghapus Surat JSA ini?</p>
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
                    <h1 class="modal-title fs-5">Add Surat JSA</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('surat-jsa.store') }}" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Karyawan</label>
                            <select class="form-select" name="user_id" id="user_id">
                                <option disabled selected>Pilih Karyawan</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="jenis" value="1">
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
    </script>
@endpush
