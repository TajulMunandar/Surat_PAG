<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rekap Daftar Hadir</title>
    <style>
        .table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #000;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        .table th {
            font-weight: bold;
        }

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
            font-size: 24px;
        }

        .header-right .logo-text span:last-child {
            color: red;
        }

        .flex-container {
            display: flex;
            justify-content: space-between;
            align-items: stretch;
        }

        .flex-container div {
            width: 50%;
        }

        .flex-container table {
            width: 100%;
            height: 100%;
        }

        td {
            padding: 8px 0;
            /* Adjust the padding as needed */
        }
    </style>
</head>

<body style="padding: 20px;">
    <div class="header-right">
        <img src="{{ asset('assets/images/logos/logo.png') }}" alt="" width="70" height="70">
        <div class="logo-text">
            <span>PERTAMINA</span>
            <span>PERTA ARUN GAS</span>
        </div>
    </div>

    <div style="margin-top: 40px; width: 100%">
        <h2 style="text-align: center; color: green;">ANALISA KESELAMATAN PEKERJAAN (JOB SAFETY ANALYSIS)</h2>
        <div class="flex-container">
            <div>
                <h2>I. INFORMASI UMUM</h2>
                <table>
                    <tr>
                        <td style="font-weight: 600;">Pekerjaan</td>
                        <td>: asd</td>
                    </tr>
                    <tr>
                        <td style="font-weight: 600;">Tag NO</td>
                        <td>: asd</td>
                    </tr>
                    <tr>
                        <td style="font-weight: 600;">Kode / SKS</td>
                        <td>: asd</td>
                    </tr>
                    <tr>
                        <td style="font-weight: 600;">Nama Mata Kuliah</td>
                        <td>: asd</td>
                    </tr>
                    <tr>
                        <td style="font-weight: 600;">Hari / Jam</td>
                        <td>: asd</td>
                    </tr>
                    <tr>
                        <td style="font-weight: 600;">Ruang / Lokasi</td>
                        <td>: asd</td>
                    </tr>
                </table>
            </div>
            <div>
                <table>
                    <tr>
                        <td style="font-weight: 600;">Nama Unit / Kelp. Belajar</td>
                        <td>: asd</td>
                    </tr>
                    <tr>
                        <td style="font-weight: 600;">Dosen</td>
                        <td>: asd</td>
                    </tr>
                    <tr>
                        <td style="font-weight: 600;">Asisten</td>
                        <td>: asd</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <table class="table" style="width: 100%; margin-top: 10%;">
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">NPM</th>
                <th rowspan="2">Nama Mahasiswa/i</th>
                <th colspan="2">Pertemuan dan Tanggal Pertemuan</th>
                <th rowspan="2">Keterangan</th>
            </tr>
            <tr>
                {{-- @for ($i = 1; $i <= $sks; $i++)
                    <th>{{ $i }}</th>
                @endfor --}}
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>asd</td>
                <td>asd</td>
                <td>asd</td>
                <td>asd</td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <div>
        <p>Note:</p>
        <p>
            1. Mahasiswa yang tidak ada namanya dalam daftar ini tidak dibenarkan mengikuti perkuliahan;<br>
            2. Dilarang mencantumkan nama mahasiswa dalam daftar ini tanpa proses uniting.
        </p>
    </div>

    <div style="margin-top: 24px; padding: 0px 5px;">
        <div style="display: flex; justify-content: end; margin-right: 48px;">
            <div style="float: right; text-align: right;">
                Takengon, <span>asd</span> <br>
                Dosen Pengampu<br><br><br><br>
                asd
                <hr style="border-width: 1px; border-color: black; border-style: solid;">
                NIP/NK.asd<br>
            </div>
        </div>
    </div>
</body>

</html>
