<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rekap Daftar Hadir</title>
    <style>
        .header-table {
            font-weight: 600;
        }

        .text-center {
            text-align: center;
        }

        hr {
            border-top: 2px solid #000;
        }

        .header-right {
            text-align: right;
        }

        .header-right img {
            vertical-align: middle;
        }

        .header-right div {
            display: inline-block;
            vertical-align: middle;
            text-align: left;
            margin-left: 10px;
        }

        .header-right .logo-text {
            font-weight: 600;
            margin-left: 20px;
        }

        .header-right .logo-text span {
            display: block;
        }

        .header-right .logo-text span:first-child {
            font-size: 14px;
        }

        .header-right .logo-text span:last-child {
            color: red;
            font-size: 10px;
        }


        .flex-container div {
            width: 50%;
        }

        .flex-container table {
            width: 100%;
        }

        .info-table {
            margin-right: 20px;
        }

        td {
            padding: 8px 0;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 2px;
            border: 1px solid black;
        }

        .table th p,
        .table td p {
            margin: 0;
        }

        .td1 {
            text-align: justify;
        }
    </style>
</head>

<body style="padding: 20px;">
    <div class="header-right">
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/images/logos/logo.png'))) }}"
            alt="" width="50" height="50">
        <div class="logo-text">
            <span>PERTAMINA</span>
            <span>PERTA ARUN GAS</span>
        </div>
    </div>

    <div style="margin-top: 20px; width: 100%">
        <h2 style="text-align: center; color: green;">ANALISA KESELAMATAN PEKERJAAN (JOB SAFETY ANALYSIS)</h2>
        <h3 style="margin-bottom: 0px"><span style="margin-right: 20px">I. </span>INFORMASI UMUM</h3>
        <div style="margin-bottom: 10px;">
            <table class="info-table" style="width: 100%; height: 10%;">
                <thead style="margin-bottom: 0; ">
                    <tr>
                        <td rowspan="4"
                            style=" vertical-align: top; text-align:justify; width: 32%; padding-right:10%">
                            <span style="font-weight: 600; margin-right: 115px">Pekerjaan</span> :
                            <span
                                style="border-bottom: 1px solid black; line-height: 40px; padding-bottom: 10px">{{ $informasi->pekerjaan }}</span>
                        </td style="font-weight: 600;">
                        <td style=" vertical-align: top; width: 32%; padding-right:10%">
                            <span style=" font-weight: 600; margin-right: 115px">
                                Lokasi Kerja
                            </span>
                            :
                            <span style="border-bottom: 1px solid black; line-height: 40px; padding-bottom: 10px">
                                {{ $informasi->lokasi_kerja }}
                            </span>
                        </td>

                        <td style=" vertical-align: top; width: 32%; padding-right:10%">
                            <span style=" font-weight: 600; margin-right: 35px">
                                Disetujui Oleh Pengawas Area
                            </span>
                            :
                            <span style="line-height: 40px; padding-bottom: 10px">
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td style=" vertical-align: top; width: 32%; padding-right:10%">
                            <span style=" font-weight: 600; margin-right: 125px"> Dibuat oleh </span>
                            :
                            <span style="border-bottom: 1px solid black; line-height: 40px; padding-bottom: 10px">
                                {{ $informasi->dibuat_oleh }}
                            </span>
                        </td>
                        <td style=" vertical-align: top; width: 32%; padding-right:10%">
                            <span style=" font-weight: 600; margin-right: 200px">
                                Nama
                            </span>
                            :
                            <span style="border-bottom: 1px solid black; line-height: 40px; padding-bottom: 10px">
                                {{ $informasi->nama_pengawas }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td style=" vertical-align: top; width: 32%; padding-right:10%">
                            <span style=" font-weight: 600; margin-right: 163px">
                                Nama
                            </span>
                            :
                            <span style="border-bottom: 1px solid black; line-height: 40px; padding-bottom: 10px">
                                {{ $informasi->nama }}
                            </span>
                        </td>
                        <td style=" vertical-align: top; width: 32%; padding-right:10%">
                            <span style=" font-weight: 600; margin-right: 204px">
                                Seksi
                            </span>
                            :
                            <span style="border-bottom: 1px solid black; line-height: 40px; padding-bottom: 10px">
                                {{ $informasi->seksi_pengawas }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td style=" vertical-align: top; width: 32%; padding-right:10%">
                            <span style=" font-weight: 600; margin-right: 168px">
                                Seksi
                            </span>
                            :
                            <span style="border-bottom: 1px solid black; line-height: 40px; padding-bottom: 10px">
                                {{ $informasi->seksi }}
                            </span>
                        </td>
                        <td style=" vertical-align: top; width: 32%; padding-right:10%">
                            <span style=" font-weight: 600; margin-right: 182px">
                                Tanggal
                            </span>
                            :
                            <span style="border-bottom: 1px solid black; line-height: 40px; padding-bottom: 10px">
                                {{ $informasi->tanggal }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td style=" vertical-align: top; width: 32%; padding-right:10%">
                            <span style=" font-weight: 600; margin-right: 115px">
                                Tag NO
                            </span>
                            :
                            <span style="border-bottom: 1px solid black; line-height: 40px; padding-bottom: 10px">
                                {{ $informasi->tag_no }}
                            </span>
                        </td>
                        <td style=" vertical-align: top; width: 32%; padding-right:10%">
                            <span style=" font-weight: 600; margin-right: 107px">
                                Tanda tangan
                            </span>
                            :
                            <span style=" display: inline-block; padding-top: 10%">
                                <img style="bottom"
                                    src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('storage/' . $informasi->tanda_tangan))) }}"
                                    alt="" width="50" height="50">
                                {{-- {{ $informasi->tanggal }} --}}
                            </span>
                        </td>
                        <td style=" vertical-align: top; width: 32%; padding-right:10%">
                            <span style="font-weight: 600; margin-right: 64px">
                                Tanda Tangan Pengawas
                            </span>
                            :
                            <span style="display: inline-block; padding-top: 10%"">
                                <img style="bottom:120px "
                                    src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('storage/' . $informasi->ttd_pengawas))) }}"
                                    alt="" width="100" height="50">
                            </span>
                        </td>
                    </tr>
                </thead>
            </table>
        </div>

        <h3 style="margin-bottom: 0px"><span style="margin-right: 20px">II. </span>ALAT PELINDUNG DIRI YANG DIPERLUKAN
        </h3>
        <div class="container" style="margin-top: 10px;">
            <table style="width: 100%">
                <tbody>
                    <tr>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                    {{ $alat->contains('alat', 'Sepatu Keselamatan') ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexCheckDefault">Sepatu Keselamatan</label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked1"
                                    {{ $alat->contains('alat', 'Sarung Tangan') ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexCheckChecked1">Sarung Tangan</label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked2"
                                    {{ $alat->contains('alat', 'Penutup Telingan / Ear Plug') ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexCheckChecked2">Penutup Telingan / Ear
                                    Plug</label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked3"
                                    {{ $alat->contains('alat', 'Pelindung Mata') ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexCheckChecked3">Pelindung Mata</label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value=""
                                    id="flexCheckChecked4"
                                    {{ $alat->contains('alat', 'SCBA / SABA') ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexCheckChecked4">SCBA / SABA</label>
                            </div>
                        </td>
                        <td rowspan="2">
                            Pertimbangan Lain :
                            @if ($alat->first()->pertimbangan_lain)
                                {{ $alat->first()->pertimbangan_lain }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value=""
                                    id="flexCheckDefault2"
                                    {{ $alat->contains('alat', 'Topi Keselamatan') ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexCheckDefault2">Topi Keselamatan</label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value=""
                                    id="flexCheckChecked6"
                                    {{ $alat->contains('alat', 'Kacamata Keselamatan') ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexCheckChecked6">Kacamata Keselamatan</label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value=""
                                    id="flexCheckChecked7"
                                    {{ $alat->contains('alat', 'Pelindung Pernafasan') ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexCheckChecked7">Pelindung Pernafasan</label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value=""
                                    id="flexCheckChecked8"
                                    {{ $alat->contains('alat', 'Full Body Harness') ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexCheckChecked8">Full Body Harness</label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value=""
                                    id="flexCheckChecked9"
                                    {{ $alat->contains('alat', 'H25 Detector') ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexCheckChecked9">H25 Detector</label>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    <h3 style="padding-top:40px"><span style="margin-right: 20px;">III. </span>URAIAN ANALISA KESELAMATAN PEKERJAAN
    </h3>
    <table class="table" style="width: 100%;">
        <thead>
            <tr>
                <th>No</th>
                <th style="text-align: center; padding:20px">
                    <p style="margin: 0;">Langkah Kerja</p>
                    <p style="margin: 0; color: red; font-weight: 300">(Di isi paling kurang 5 langkah kerja)</p>
                </th>
                <th style="text-align: center">
                    <p style="margin: 0">Bahaya Kecelakaan Potensial</p>
                </th>
                <th style="text-align: center">
                    <p style="margin: 0">Tindakan Pencegahan Kecelakaan</p>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($uraians as $uraian)
                <tr style="text-align: center">
                    <td style=" padding:10px">{{ $loop->iteration }}</td>
                    <td>{{ $uraian->langkah_kerja }}</td>
                    <td>{{ $uraian->bahaya_kecelakaan }}</td>
                    <td>{{ $uraian->tindakan_pencegahan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
