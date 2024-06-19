@extends('layouts.index')
@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Yearly Breakup -->
                    <div class="card overflow-hidden p-2">
                        <div class="card-body p-5">
                            <h5 class="card-title mb-9 fw-semibold">Informasi Umum</h5>
                            <form action="#" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                        <textarea class="form-control" id="pekerjaan" name="pekerjaan" rows="3" required></textarea>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="tag_no" class="form-label">Tag No</label>
                                        <input type="text" class="form-control" id="tag_no" name="tag_no" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label for="lokasi_kerja" class="form-label">Lokasi Kerja</label>
                                        <input type="text" class="form-control" id="lokasi_kerja" name="lokasi_kerja"
                                            required>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="dibuat_oleh" class="form-label">Dibuat Oleh</label>
                                        <input type="text" class="form-control" id="dibuat_oleh" name="dibuat_oleh"
                                            required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" required>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="seksi" class="form-label">Seksi</label>
                                        <input type="text" class="form-control" id="seksi" name="seksi" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label for="tanda_tangan" class="form-label">Tanda Tangan</label>
                                        <input type="text" class="form-control" id="tanda_tangan" name="tanda_tangan"
                                            required>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="nama_pengawas" class="form-label">Nama Pengawas</label>
                                        <input type="text" class="form-control" id="nama_pengawas" name="nama_pengawas"
                                            required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label for="seksi_pengawas" class="form-label">Seksi Pengawas</label>
                                        <input type="text" class="form-control" id="seksi_pengawas" name="seksi_pengawas"
                                            required>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label for="ttd_pengawas" class="form-label">TTD Pengawas</label>
                                        <input type="text" class="form-control" id="ttd_pengawas" name="ttd_pengawas"
                                            required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <!-- Yearly Breakup -->
                    <div class="card overflow-hidden p-2">
                        <div class="card-body p-5">
                            <h5 class="card-title mb-9 fw-semibold">Alat Pelindung Diri Yang Diperlukan</h5>
                            <form action="#" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="alat" class="form-label">Alat</label>
                                        <input type="text" class="form-control" id="alat" name="alat"
                                            required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="pertimbangan_lain" class="form-label">Pertimbangan Lain</label>
                                        <textarea class="form-control" id="pertimbangan_lain" name="pertimbangan_lain" rows="3" required></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" id="tanggal" name="tanggal"
                                            required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <!-- Yearly Breakup -->
                    <div class="card overflow-hidden p-2">
                        <div class="card-body p-5">
                            <h5 class="card-title mb-9 fw-semibold">Uraian Analisa Keselamatan Pekerjaan</h5>
                            <form action="" method="POST">
                                @csrf
                                <div id="uraianAnalisaKeselamatan" class="pe-4">
                                    <div class="uraian-item row mb-3">
                                        <div class="col-3 mb-3">
                                            <label for="langkah_kerja" class="form-label">Langkah Kerja</label>
                                            <input type="text" class="form-control" id="langkah_kerja"
                                                name="langkah_kerja[]" required>
                                        </div>
                                        <div class="col-3 mb-3">
                                            <label for="bahaya_kecelakaan" class="form-label">Bahaya Kecelakaan</label>
                                            <input type="text" class="form-control" id="bahaya_kecelakaan"
                                                name="bahaya_kecelakaan[]" required>
                                        </div>
                                        <div class="col-3 mb-3">
                                            <label for="tindakan_pencegahan" class="form-label">Tindakan
                                                Pencegahan</label>
                                            <input type="text" class="form-control" id="tindakan_pencegahan"
                                                name="tindakan_pencegahan[]" required>
                                        </div>
                                        <div class="col-2 mb-3">
                                            <label for="tanggal" class="form-label">Tanggal</label>
                                            <input type="date" class="form-control" id="tanggal" name="tanggal[]"
                                                required>
                                        </div>
                                        <div class="col-1 mb-3 d-flex align-items-end ">
                                            <button type="button" class="btn btn-danger remove-item me-1">
                                                <i class="ti ti-minus fs-3"></i>
                                            </button>
                                            <button type="button" class="btn btn-primary add-item">
                                                <i class="ti ti-plus fs-3"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success mt-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
