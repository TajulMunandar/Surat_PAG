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

                <button class="btn btn-primary mb-3 p-2">
                    <i class="ti ti-plus fs-3 me-1"></i> Tambah
                </button>
            </div>
            <div class="col">
                <ul class="nav nav-pills d-flex justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/dashboard/surat-jsa">JSA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Magang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Peminjaman</a>
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
                                <th>Name</th>
                                <th>Serial Number</th>
                                <th>Qty</th>
                                <th>Deskripsi</th>
                                <th>Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>asep</td>
                                <td>asep</td>
                                <td>asep</td>
                                <td>asep</td>
                                <td>asep</td>
                                <td>
                                    <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editModal">
                                        <i class="ti ti-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editModal">
                                        <i class="ti ti-edit"></i>
                                    </button>
                                    <button data-bs-target="#modalHapus" class="btn btn-sm btn-danger"
                                        data-bs-toggle="modal">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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
