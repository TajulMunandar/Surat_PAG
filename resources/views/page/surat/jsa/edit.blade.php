@extends('layouts.index')
@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->
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

        <a href="{{ route('surat-jsa.index') }}" class="mb-3 btn btn-outline-secondary">Kembali</a>

        <form method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" value="{{ $surat_jsa->id }}" name="surat">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Yearly Breakup -->
                    <div class="card overflow-hidden shadow p-2">
                        <div class="card-body p-5">
                            <h5 class="card-title mb-9 fw-semibold">Informasi Umum</h5>
                            <div class="row">
                                <div class="mb-3">
                                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                    <textarea class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" name="pekerjaan" rows="3"
                                        required>{{ old('pekerjaan', $informasi->pekerjaan ?? '') }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="tag_no" class="form-label">Tag No</label>
                                    <input type="text" class="form-control @error('tag_no') is-invalid @enderror"
                                        id="tag_no" name="tag_no" value="{{ old('tag_no', $informasi->tag_no ?? '') }}"
                                        required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <div class="mb-3">
                                        <label for="lokasi_kerja" class="form-label">Lokasi Kerja</label>
                                        <input type="text"
                                            class="form-control @error('lokasi_kerja') is-invalid @enderror"
                                            id="lokasi_kerja" name="lokasi_kerja"
                                            value="{{ old('lokasi_kerja', $informasi->lokasi_kerja ?? '') }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="dibuat_oleh" class="form-label">Dibuat Oleh</label>
                                        <input type="text"
                                            class="form-control @error('dibuat_oleh') is-invalid @enderror" id="dibuat_oleh"
                                            name="dibuat_oleh"
                                            value="{{ old('dibuat_oleh', $informasi->dibuat_oleh ?? '') }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            id="nama" name="nama" value="{{ old('nama', $informasi->nama ?? '') }}"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="seksi" class="form-label">Seksi</label>
                                        <input type="text" class="form-control @error('seksi') is-invalid @enderror"
                                            id="seksi" name="seksi"
                                            value="{{ old('seksi', $informasi->seksi ?? '') }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanda_tangan" class="form-label">Tanda Tangan</label>
                                        <input type="file"
                                            class="form-control @error('tanda_tangan') is-invalid @enderror"
                                            id="tanda_tangan" name="tanda_tangan">
                                        @if ($informasi->tanda_tangan)
                                            <img src="{{ asset('storage/' . $informasi->tanda_tangan) }}"
                                                alt="Tanda Tangan" width="100">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="mb-3">
                                        <label for="nama_pengawas" class="form-label">Nama Pengawas</label>
                                        <input type="text"
                                            class="form-control @error('nama_pengawas') is-invalid @enderror"
                                            id="nama_pengawas" name="nama_pengawas"
                                            value="{{ old('nama_pengawas', $informasi->nama_pengawas ?? '') }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="seksi_pengawas" class="form-label">Seksi Pengawas</label>
                                        <input type="text"
                                            class="form-control @error('seksi_pengawas') is-invalid @enderror"
                                            id="seksi_pengawas" name="seksi_pengawas"
                                            value="{{ old('seksi_pengawas', $informasi->seksi_pengawas ?? '') }}"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                            id="tanggal" name="tanggal"
                                            value="{{ old('tanggal', $informasi->tanggal ?? '') }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ttd_pengawas" class="form-label">TTD Pengawas</label>
                                        <input type="file"
                                            class="form-control @error('ttd_pengawas') is-invalid @enderror"
                                            id="ttd_pengawas" name="ttd_pengawas">
                                        @if ($informasi->ttd_pengawas)
                                            <img src="{{ asset('storage/' . $informasi->ttd_pengawas) }}"
                                                alt="TTD Pengawas" width="100">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <!-- Yearly Breakup -->
                    <div class="card overflow-hidden p-2 shadow">
                        <div class="card-body p-5">
                            <h5 class="card-title mb-9 fw-semibold">Alat Pelindung Diri Yang Diperlukan</h5>
                            <div class="row">
                                <label for="alat" class="form-label">Alat</label>
                                <div class="col-12 mb-3 d-flex flex-wrap">
                                    @foreach (['Sepatu Keselamatan', 'Sarung Tangan', 'Penutup Telinga / Ear Plug', 'Pelindung Telinga', 'SCBA / SABA', 'Topi Keselamatan', 'Kacamata Keselamatan', 'Pelindung Pernafasan', 'Full Body Hamess', 'H2S Detector'] as $alatItem)
                                        <div class="form-check me-4">
                                            <input type="checkbox" class="form-check-input"
                                                id="alat_{{ $loop->index }}" name="alat[]"
                                                value="{{ $alatItem }}"
                                                {{ in_array($alatItem, old('alat', $alat->pluck('alat')->toArray() ?? [])) ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="alat_{{ $loop->index }}">{{ $alatItem }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="pertimbangan_lain" class="form-label">Pertimbangan Lain</label>
                                    <textarea class="form-control @error('pertimbangan_lain') is-invalid @enderror" id="pertimbangan_lain"
                                        name="pertimbangan_lain" rows="3" required>{{ old('pertimbangan_lain', $alat->pertimbangan_lain ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <!-- Yearly Breakup -->
                    <div class="card overflow-hidden shadow p-2">
                        <div class="card-body p-5">
                            <h5 class="card-title mb-9 fw-semibold">Daftar Identifikasi Bahaya dan Pengendalian</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dynamicAddRemove">
                                    <tr>
                                        <th>Langkah Kerja</th>
                                        <th>Bahaya Kecelakaan</th>
                                        <th>Tindakan Kecelakaan</th>
                                        <th>Action</th>
                                    </tr>
                                    {{-- {{ dd($uraian) }} --}}
                                    @if (old('langkah_kerja'))
                                        @foreach (old('langkah_kerja') as $index => $oldLangkahKerja)
                                            <tr>
                                                <td>
                                                    <textarea name="langkah_kerja[]" class="form-control" required>{{ $oldLangkahKerja }}</textarea>
                                                </td>
                                                <td>
                                                    <textarea name="potensi_bahaya[]" class="form-control" required>{{ old('potensi_bahaya.' . $index) }}</textarea>
                                                </td>
                                                <td>
                                                    <textarea name="pengendalian[]" class="form-control" required>{{ old('pengendalian.' . $index) }}</textarea>
                                                </td>
                                                <td><button type="button"
                                                        class="btn btn-danger remove-input-field">Delete</button></td>
                                            </tr>
                                        @endforeach
                                    @elseif ($uraian)
                                        @foreach ($uraian as $uraian_item)
                                            <tr>
                                                <td>
                                                    <textarea name="langkah_kerja[]" class="form-control" required>{{ $uraian_item->langkah_kerja }}</textarea>
                                                </td>
                                                <td>
                                                    <textarea name="bahaya_kecelakaan[]" class="form-control" required>{{ $uraian_item->bahaya_kecelakaan }}</textarea>
                                                </td>
                                                <td>
                                                    <textarea name="tindakan_pencegahan[]" class="form-control" required>{{ $uraian_item->tindakan_pencegahan }}</textarea>
                                                </td>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-danger remove-input-field">Delete</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </table>
                                <button type="button" name="add" id="dynamic-ar"
                                    class="btn btn-outline-primary">Add Item</button>
                            </div>
                            <button class="btn btn-primary mt-4" type="submit">Submit</button>
                            <a href="{{ route('surat-jsa.index') }}" class="btn btn-danger mt-4">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        var i = 0;
        $("#dynamic-ar").click(function() {
            ++i;
            $("#dynamicAddRemove").append(
                '<tr><td><textarea name="langkah_kerja[]" class="form-control" required></textarea></td><td><textarea name="potensi_bahaya[]" class="form-control" required></textarea></td><td><textarea name="pengendalian[]" class="form-control" required></textarea></td><td><button type="button" class="btn btn-danger remove-input-field">Delete</button></td></tr>'
            );
        });
        $(document).on('click', '.remove-input-field', function() {
            $(this).parents('tr').remove();
        });
    </script>
@endsection
