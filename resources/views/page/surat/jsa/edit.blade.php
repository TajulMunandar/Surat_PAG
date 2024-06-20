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

        <form method="POST" action="{{ route('surat-jsa-detail.update', $surat_jsa->id) }}" enctype="multipart/form-data">
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
                                        name="pertimbangan_lain" rows="3"> {{ $alat->pertimbangan_lain }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <!-- Yearly Breakup -->
                    <div class="card overflow-hidden shadow p-2">
                        <div class="card-body p-5">
                            <h5 class="card-title mb-9 fw-semibold">Uraian Analisa Keselamatan Pekerjaan</h5>
                            <div id="uraianAnalisaKeselamatan" class="pe-4">
                                <div class="uraian-item row mb-3">
                                    <div class="col-3 mb-3">
                                        <label for="langkah_kerja" class="form-label">Langkah Kerja</label>
                                        <input type="text"
                                            class="form-control @error('langkah_kerja.*') is-invalid @enderror"
                                            id="langkah_kerja" name="langkah_kerja[]" required>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <label for="bahaya_kecelakaan" class="form-label">Bahaya Kecelakaan</label>
                                        <input type="text"
                                            class="form-control @error('bahaya_kecelakaan.*') is-invalid @enderror"
                                            id="bahaya_kecelakaan" name="bahaya_kecelakaan[]" required>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <label for="tindakan_pencegahan" class="form-label">Tindakan Pencegahan</label>
                                        <input type="text"
                                            class="form-control @error('tindakan_pencegahan.*') is-invalid @enderror"
                                            id="tindakan_pencegahan" name="tindakan_pencegahan[]" required>
                                    </div>
                                    <div class="col-1 mb-3 d-flex align-items-end">
                                        <button type="button" class="btn btn-danger remove-item me-1">
                                            <i class="ti ti-minus fs-3"></i>
                                        </button>
                                        <button type="button" class="btn btn-primary add-item">
                                            <i class="ti ti-plus fs-3"></i>
                                        </button>
                                    </div>
                                </div>
                                @foreach ($uraians as $uraian)
                                    <div class="uraian-item row mb-3">
                                        <div class="col-3 mb-3">
                                            <input type="text"
                                                class="form-control @error('langkah_kerja.*') is-invalid @enderror"
                                                name="langkah_kerja[]" value="{{ $uraian->langkah_kerja }}" required>
                                        </div>
                                        <div class="col-4 mb-3">
                                            <input type="text"
                                                class="form-control @error('bahaya_kecelakaan.*') is-invalid @enderror"
                                                name="bahaya_kecelakaan[]" value="{{ $uraian->bahaya_kecelakaan }}"
                                                required>
                                        </div>
                                        <div class="col-4 mb-3">
                                            <input type="text"
                                                class="form-control @error('tindakan_pencegahan.*') is-invalid @enderror"
                                                name="tindakan_pencegahan[]" value="{{ $uraian->tindakan_pencegahan }}"
                                                required>
                                        </div>
                                        <div class="col-1 mb-3 d-flex align-items-end">
                                            <button type="button" class="btn btn-danger remove-item me-1">
                                                <i class="ti ti-minus fs-3"></i>
                                            </button>
                                            <button type="button" class="btn btn-primary add-item">
                                                <i class="ti ti-plus fs-3"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </div>
                    </div>
                </div>
        </form>
    </div>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('uraianAnalisaKeselamatan').addEventListener('click', function(e) {
            if (e.target.closest('.add-item')) {
                const uraianItem = e.target.closest('.uraian-item');
                const newItem = uraianItem.cloneNode(true);
                newItem.querySelectorAll('input').forEach(input => input.value = '');
                document.getElementById('uraianAnalisaKeselamatan').appendChild(newItem);
            }

            if (e.target.closest('.remove-item')) {
                const uraianItems = document.querySelectorAll('.uraian-item');
                if (uraianItems.length > 1) {
                    e.target.closest('.uraian-item').remove();
                } else {
                    alert('Minimal harus ada satu uraian.');
                }
            }
        });
    });
</script>
