@extends('layouts.index')
@section('content')
    <div class="container-fluid">
        <div class="col">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif (session()->has('error'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

        <a href="{{ route('surat-peminjaman.index') }}" class="mb-3 btn btn-outline-secondary">Kembali</a>

        <form action="{{ route('surat-peminjaman-detail.store') }}" method="POST">
            @csrf
            <input type="hidden" value="{{ $surat_peminjaman->id }}" name="surat">
            <!-- Informasi Umum Peminjaman Form -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-hidden shadow p-2">
                        <div class="card-body p-5">
                            <h5 class="card-title mb-9 fw-semibold">Informasi Umum Peminjaman</h5>
                            <div class="row">
                                <div class="mb-3">
                                    <label for="nama_pemakai" class="form-label">Nama Pemakai</label>
                                    <input type="text" class="form-control @error('nama_pemakai') is-invalid @enderror"
                                        id="nama_pemakai" name="nama_pemakai" required>
                                </div>
                                <div class="mb-3">
                                    <label for="no_pegawai" class="form-label">No Pegawai</label>
                                    <input type="text" class="form-control @error('no_pegawai') is-invalid @enderror"
                                        id="no_pegawai" name="no_pegawai" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                        id="tempat_lahir" name="tempat_lahir" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                        id="tanggal_lahir" name="tanggal_lahir" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                                    <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror"
                                        id="tanggal_masuk" name="tanggal_masuk" required>
                                </div>
                                <div class="mb-3">
                                    <label for="jabatan" class="form-label">Jabatan</label>
                                    <input type="text" class="form-control @error('jabatan') is-invalid @enderror"
                                        id="jabatan" name="jabatan" required>
                                </div>
                                <div class="mb-3">
                                    <label for="unit_kerja" class="form-label">Unit Kerja</label>
                                    <input type="text" class="form-control @error('unit_kerja') is-invalid @enderror"
                                        id="unit_kerja" name="unit_kerja" required>
                                </div>
                                <div class="mb-3">
                                    <label for="no_telpon" class="form-label">No Telpon</label>
                                    <input type="text" class="form-control @error('no_telpon') is-invalid @enderror"
                                        id="no_telpon" name="no_telpon" required>
                                </div>
                                <div class="mb-3">
                                    <label for="divisi_id" class="form-label">Divisi</label>
                                    <select class="form-select @error('divisi_id') is-invalid @enderror" id="divisi_id"
                                        name="divisi_id" required>
                                        @foreach ($divisis as $divisi)
                                            <option value="{{ $divisi->id }}">{{ $divisi->nama_divisi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Type Of Services Form -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-hidden shadow p-2">
                        <div class="card-body p-5">
                            <h5 class="card-title mb-9 fw-semibold">Type of Services</h5>
                            <div class="row">
                                <label for="software" class="form-label">Software</label>
                                <div class="col-12 mb-3 d-flex">
                                    <div class="form-check me-4">
                                        <input type="checkbox" class="form-check-input" id="software1" name="software[]"
                                            value="SAP GUI">
                                        <label class="form-check-label" for="software1">SAP GUI</label>
                                    </div>
                                    <div class="form-check me-4">
                                        <input type="checkbox" class="form-check-input" id="software2" name="software[]"
                                            value="New / Modification Program/System">
                                        <label class="form-check-label" for="software2">New / Modification
                                            Program/System</label>
                                    </div>
                                    <div class="form-check me-4">
                                        <input type="checkbox" class="form-check-input" id="software3" name="software[]"
                                            value="Authorization/TCode">
                                        <label class="form-check-label" for="software3">Authorization/TCode</label>
                                    </div>
                                    <div class="form-check me-4">
                                        <input type="checkbox" class="form-check-input" id="software4" name="software[]"
                                            value="PC standard Software">
                                        <label class="form-check-label" for="software4">PC standard Software</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="hardware" class="form-label">Hardware</label>
                                <div class="col-12 mb-3 d-flex">
                                    <div class="form-check me-4">
                                        <input type="checkbox" class="form-check-input" id="hardware1" name="hardware[]"
                                            value="Server">
                                        <label class="form-check-label" for="hardware1">Server</label>
                                    </div>
                                    <div class="form-check me-4">
                                        <input type="checkbox" class="form-check-input" id="hardware2" name="hardware[]"
                                            value="PC">
                                        <label class="form-check-label" for="hardware2">PC</label>
                                    </div>
                                    <div class="form-check me-4">
                                        <input type="checkbox" class="form-check-input" id="hardware3" name="hardware[]"
                                            value="Laptop">
                                        <label class="form-check-label" for="hardware3">Laptop</label>
                                    </div>
                                    <div class="form-check me-4">
                                        <input type="checkbox" class="form-check-input" id="hardware4" name="hardware[]"
                                            value="Printer/Scanner">
                                        <label class="form-check-label" for="hardware4">Printer/Scanner</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check me-4 mb-2">
                                <input type="checkbox" class="form-check-input" id="software_other" name="software[]"
                                    value="other">
                                <label class="form-check-label" for="software_other">Other</label>
                            </div>
                            <textarea class="form-control d-none mt-3" id="software_other_text" name="other" rows="2"
                                placeholder="Please specify"></textarea>
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="data_komunikasi"
                                    name="data_komunikasi" value="data_komunikasi">
                                <label class="form-check-label" for="data_komunikasi">Data Communication</label>
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="user_id" name="user_id"
                                    value="phone">
                                <label class="form-check-label" for="user_id">User ID - Lampirkan Form-124 permintaan
                                    User ID -</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description Of Service Form -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-hidden shadow p-2">
                        <div class="card-body p-5">
                            <h5 class="card-title mb-9 fw-semibold">Description Of Service</h5>
                            <div class="row">
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="attachment" class="form-label">Attachment</label>
                                    <input type="text" class="form-control @error('attachment') is-invalid @enderror"
                                        id="attachment" name="attachment" required>
                                </div>
                                <div class="mb-3">
                                    <label for="justification" class="form-label">Justification</label>
                                    <textarea class="form-control @error('justification') is-invalid @enderror" id="justification" name="justification"
                                        required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Status Peminjaman Form -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-hidden shadow p-2">
                        <div class="card-body p-5">
                            <h5 class="card-title mb-9 fw-semibold">Status Peminjaman</h5>
                            <div class="row">
                                <div class="mb-3">
                                    <label for="request_by" class="form-label">Request By</label>
                                    <input type="date" class="form-control @error('request_by') is-invalid @enderror"
                                        id="request_by" name="request_by" required>
                                </div>
                                <div class="mb-3">
                                    <label for="fungsi" class="form-label">Dept / Fungsi</label>
                                    <input type="text" class="form-control @error('fungsi') is-invalid @enderror"
                                        id="fungsi" name="fungsi" required>
                                </div>
                                <div class="mb-3">
                                    <label for="it_recommendation" class="form-label">IT Recommendation</label>
                                    <div class="col d-flex ">
                                        <div class="form-check me-3 fs-3">
                                            <input
                                                class="form-check-input @error('it_recommendation') is-invalid @enderror"
                                                type="radio" name="it_recommendation" id="accepted" value="accepted"
                                                required>
                                            <label class="form-check-label" for="accepted">Accepted</label>
                                        </div>
                                        <div class="form-check fs-3">
                                            <input
                                                class="form-check-input @error('it_recommendation') is-invalid @enderror"
                                                type="radio" name="it_recommendation" id="not_accepted"
                                                value="not_accepted" required>
                                            <label class="form-check-label" for="not_accepted">Not Accepted</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="reason" class="form-label">Reason</label>
                                    <textarea class="form-control @error('reason') is-invalid @enderror" id="reason" name="reason" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="approved1" class="form-label">Approved By 1</label>
                                    <select class="form-select @error('approved1') is-invalid @enderror" id="approved1"
                                        name="approved1" required>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="approve2" class="form-label">Approved By 2</label>
                                    <select class="form-select @error('approve2') is-invalid @enderror" id="approve2"
                                        name="approve2" required>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="assigned_to" class="form-label">Assigned To</label>
                                    <input type="date" class="form-control @error('assigned_to') is-invalid @enderror"
                                        id="assigned_to" name="assigned_to" required>
                                </div>
                                <div class="mb-3">
                                    <label for="priority" class="form-label">Priority</label>
                                    <div class="form-check me-3 mb-1">
                                        <input class="form-check-input @error('priority') is-invalid @enderror"
                                            type="radio" name="priority" id="priority1" value="1" required>
                                        <label class="form-check-label" for="priority1">1</label>
                                    </div>
                                    <div class="form-check me-3 mb-1">
                                        <input class="form-check-input @error('priority') is-invalid @enderror"
                                            type="radio" name="priority" id="priority2" value="2" required>
                                        <label class="form-check-label" for="priority2">2</label>
                                    </div>
                                    <div class="form-check me-3 mb-1">
                                        <input class="form-check-input @error('priority') is-invalid @enderror"
                                            type="radio" name="priority" id="priority3" value="3" required>
                                        <label class="form-check-label" for="priority3">3</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="action" class="form-label">Action</label>
                                    <textarea class="form-control @error('action') is-invalid @enderror" id="action" name="action" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Aksi Peminjaman Form -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-hidden shadow p-2">
                        <div class="card-body p-5">
                            <h5 class="card-title mb-9 fw-semibold">Aksi Peminjaman</h5>
                            <div class="row">
                                <div class="mb-3">
                                    <label for="estimasi_kerja" class="form-label">Estimated Work</label>
                                    <input type="text"
                                        class="form-control @error('estimasi_kerja') is-invalid @enderror"
                                        id="estimasi_kerja" name="estimasi_kerja" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_mulai" class="form-label">Start Date</label>
                                    <input type="date"
                                        class="form-control @error('tanggal_mulai') is-invalid @enderror"
                                        id="tanggal_mulai" name="tanggal_mulai" required>
                                </div>
                                <div class="mb-3">
                                    <label for="completed_by" class="form-label">Completed By</label>
                                    <input type="text"
                                        class="form-control @error('completed_by') is-invalid @enderror"
                                        id="completed_by" name="completed_by" required>
                                </div>
                                <div class="mb-3">
                                    <label for="expense_amount" class="form-label">Expense Amount</label>
                                    <input type="number"
                                        class="form-control @error('expense_amount') is-invalid @enderror"
                                        id="expense_amount" name="expense_amount" required>
                                </div>
                                <div class="mb-3">
                                    <label for="completion_date" class="form-label">Completion Date</label>
                                    <input type="date"
                                        class="form-control @error('completion_date') is-invalid @enderror"
                                        id="completion_date" name="completion_date" required>
                                </div>
                                <div class="mb-3">
                                    <label for="user_acceptance" class="form-label">User Acceptance</label>
                                    <input type="date"
                                        class="form-control @error('user_acceptance') is-invalid @enderror"
                                        id="user_acceptance" name="user_acceptance" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

<script>
    // JavaScript untuk menangani visibilitas textarea saat checkbox "Other" dipilih
    document.addEventListener('DOMContentLoaded', function() {
        const checkboxOther = document.getElementById('software_other');
        const textareaOther = document.getElementById('software_other_text');

        // Sembunyikan textareaOther secara default
        textareaOther.style.display = 'none';

        // Tambahkan event listener untuk checkboxOther
        checkboxOther.addEventListener('change', function() {
            if (checkboxOther.checked) {
                textareaOther.style.display = 'block';
                textareaOther.classList.remove('d-none'); // Hapus kelas d-none jika ada
                textareaOther.setAttribute('required',
                    ''); // Tambahkan atribut required jika diperlukan validasi
            } else {
                textareaOther.style.display = 'none';
                textareaOther.classList.add(
                    'd-none'); // Tambahkan kelas d-none untuk menyembunyikan textarea
                textareaOther.removeAttribute(
                    'required'); // Hapus atribut required jika tidak diperlukan validasi
            }
        });
    });
</script>
