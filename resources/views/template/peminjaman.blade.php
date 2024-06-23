<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumen Baru</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 0;
        }

        .table th,
        .table td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .text-bold {
            font-weight: bold;
        }

        .header {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body style="padding: 10px; border: 1px solid">
    <div>
        <div class="header">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 20%; text-align: center; padding: 20px;">
                            <p style="margin: 0;">#CSR</p>
                        </th>
                        <th style="width: 60%; text-align: center;">
                            <p style="margin: 0;"><span style="border-bottom: 1px solid black;">Please Send Complete
                                    Data
                                    To
                                    GS & IT</span></p>
                            <p style="margin: 0;">Silahkan Dikirim ke Fungsi GS&IT Apabila Sudah diisi dan Disetujui</p>
                        </th>
                        <th style="width: 20%; text-align: center; padding: 20px;">
                            <p style="margin: 0;">Received Date</p>
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
        <div style="margin-top: 10px; width: 100%;">
            <table class="info-table" style="width: 100%; height: 10%;">
                <thead style="margin-bottom: 0;">
                    <tr>
                        <td style="vertical-align: top; text-align: justify; width: 32%; padding-right: 10%;">
                            <span style="font-weight: 600; margin-right: 90px">Nama Pemakai</span> :
                            <span
                                style="border-bottom: 1px solid black; line-height: 30px; padding-bottom: 10px">{{ $informasi->nama_pemakai }}</span>
                        </td>
                        <td style="vertical-align: top; width: 32%; padding-right: 10%;">
                            <span style="font-weight: 600; margin-right: 115px">Nama Divisi</span> :
                            <span
                                style="border-bottom: 1px solid black; line-height: 30px; padding-bottom: 10px">{{ $informasi->divisi->nama_divisi }}</span>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="vertical-align: top; text-align: justify; width: 50%; padding-right: 10%;">
                            <span style="font-weight: 600; margin-right: 115px">No Pegawai</span> :
                            <span
                                style="border-bottom: 1px solid black; line-height: 30px; padding-bottom: 10px">{{ $informasi->no_pegawai }}</span>
                        </td>
                        <td style="vertical-align: top; text-align: justify; width: 50%; padding-right: 10%;">
                            <span style="font-weight: 600; margin-right: 125px">Unit Kerja</span> :
                            <span
                                style="border-bottom: 1px solid black; line-height: 30px; padding-bottom: 10px">{{ $informasi->unit_kerja }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; text-align: justify; width: 50%; padding-right: 10%;">
                            <span style="font-weight: 600; margin-right: 100px">Tempat Lahir</span> :
                            <span
                                style="border-bottom: 1px solid black; line-height: 30px; padding-bottom: 10px">{{ $informasi->tempat_lahir }}</span>
                        </td>
                        <td style="vertical-align: top; text-align: justify; width: 50%; padding-right: 10%;">
                            <span style="font-weight: 600; margin-right: 113px">No Telphone</span> :
                            <span
                                style="border-bottom: 1px solid black; line-height: 30px; padding-bottom: 10px">{{ $informasi->no_telpon }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; text-align: justify; width: 50%; padding-right: 10%;">
                            <span style="font-weight: 600; margin-right: 100px">Tanggal Lahir</span> :
                            <span
                                style="border-bottom: 1px solid black; line-height: 30px; padding-bottom: 10px">{{ $informasi->tanggal_lahir }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; text-align: justify; width: 50%; padding-right: 10%;">
                            <span style="font-weight: 600; margin-right: 93px">Tanggal Masuk</span> :
                            <span
                                style="border-bottom: 1px solid black; line-height: 30px; padding-bottom: 10px">{{ $informasi->tanggal_masuk }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; text-align: justify; width: 50%; padding-right: 10%;">
                            <span style="font-weight: 600; margin-right: 140px">Jabatan</span> :
                            <span
                                style="border-bottom: 1px solid black; line-height: 30px; padding-bottom: 10px">{{ $informasi->jabatan }}</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="margin-top: 20px; margin-left: 40px">
            <table style="width: 100%">
                <tbody>
                    <tr>
                        <td style="vertical-align: top; width: 50%;" rowspan="10">TYPE OF SERVICE</td>
                        <td colspan="2">Software / application</td>
                    </tr>
                    <tr style="height: 50px;"></tr>
                    <tr style="padding-top: 50px;">
                        <td></td>
                        <td style="width: 50%">
                            <div class="form-check" style="position: relative;">
                                <input class="form-check-input" type="checkbox" style="position: absolute"
                                    {{ $TOS->contains('software', 'SAP GUI') ? 'checked' : '' }}>
                                <label style="margin-left: 20px">SAP GUI</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 5%"></td>
                        <td colspan="3">
                            <div class="form-check" style="position: relative;">
                                <input class="form-check-input" type="checkbox" style="position: absolute"
                                    {{ $TOS->contains('software', 'New / Modification Program/System') ? 'checked' : '' }}>
                                <label style="margin-left: 20px">New / Modification Program/System</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 5%"></td>
                        <td colspan="3">
                            <div class="form-check" style="position: relative;">
                                <input class="form-check-input" type="checkbox" style="position: absolute"
                                    {{ $TOS->contains('software', 'Authorization/TCode') ? 'checked' : '' }}>
                                <label style="margin-left: 20px">Authorization/Tcode</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 5%"></td>
                        <td colspan="3">
                            <div class="form-check" style="position: relative;">
                                <input class="form-check-input" type="checkbox" style="position: absolute"
                                    {{ $TOS->contains('software', 'PC standard Software') ? 'checked' : '' }}>
                                <label style="margin-left: 20px">PC Standard Software</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 5%"></td>
                        @php
                            $other_hardware = $TOS->pluck('hardware')->filter(function ($item) {
                                return !in_array($item, ['Server', 'PC', 'Laptop', 'Printer/Scanner', null]);
                            });
                        @endphp
                        <td>
                            <div class="form-check" style="position: relative;">
                                <input class="form-check-input" type="checkbox" style="position: absolute"
                                    {{ $other_hardware->isNotEmpty() ? 'checked' : '' }}>
                                <label style="margin-left: 20px">Other</label><br>
                                <span
                                    style="border-bottom: 1px solid">{{ $other_hardware->isNotEmpty() ? $other_hardware->first() : '' }}</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">Hardware</td>
                    </tr>
                    <tr>
                        <td style="width: 30%">
                            <div class="form-check" style="position: relative;">
                                <input class="form-check-input" type="checkbox" style="position: absolute"
                                    {{ $TOS->contains('hardware', 'Server') ? 'checked' : '' }}>
                                <label style="margin-left: 20px">Server</label>
                            </div>
                        </td>
                        <td style="width: 30%">
                            <div class="form-check" style="position: relative;">
                                <input class="form-check-input" type="checkbox" style="position: absolute"
                                    {{ $TOS->contains('hardware', 'PC') ? 'checked' : '' }}>
                                <label style="margin-left: 20px">PC</label>
                            </div>
                        </td>
                        <td style="width: 10%">
                            <div class="form-check" style="position: relative;">
                                <input class="form-check-input" type="checkbox" style="position: absolute"
                                    {{ $TOS->contains('hardware', 'Laptop') ? 'checked' : '' }}>
                                <label style="margin-left: 20px; margin-right: 30px">Laptop</label>
                            </div>
                        </td>
                        <td style="width: 30%">
                            <div class="form-check" style="position: relative;">
                                <input class="form-check-input" type="checkbox" style="position: absolute"
                                    {{ $TOS->contains('hardware', 'Printer/Scanner') ? 'checked' : '' }}>
                                <label style="margin-left: 20px">Printer/Scanner</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="form-check" style="position: relative;">
                                <input class="form-check-input" type="checkbox" style="position: absolute"
                                    {{ $TOS->contains('data_komunikasi', 'data_komunikasi') ? 'checked' : '' }}>
                                <label style="margin-left: 20px">Data Komunikasi</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="5">
                            <div class="form-check" style="position: relative;">
                                <input class="form-check-input" type="checkbox" style="position: absolute"
                                    {{ $TOS->contains('user_id', 'user_id') ? 'checked' : '' }}>
                                <label class="form-check-label" style="margin-left: 20px">User ID - Lampirkan Form-124
                                    Permintaan User ID</label>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="margin-top: 20px; margin-left: 40px">
            <table style="width: 100%;">
                <tbody>
                    <tr>
                        <td style="vertical-align: top; max-width: 100%; text-align: justify;">
                            <span style="font-weight: 600;">Description
                                Of Services :</span> <span
                                style="border-bottom: 1px solid black; line-height: 20px">{{ $DOS->deskripsi }}</span>
                            <span style="font: 600; position: relative;">
                                <input type="checkbox" style="position: absolute;"
                                    {{ $DOS->attachment ? 'checked' : '' }}>
                                <label style="margin-left: 15px" class="form-check-label"
                                    for="flexCheckDefault">Attachment</label>
                            </span>
                            <span style="">__</span>
                            <span>Page</span>
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
        <div style="margin-top: 20px; margin-left: 40px">
            <table style="width: 100%">
                <tbody>
                    <td style="vertical-align: top; max-width: 100%; text-align: justify; line-height: 20px">
                        <span style="font-weight: 600;">JUSTIFICATION :</span> <span
                            style="border-bottom: 1px solid black;">{{ $DOS->justification }}</span>
                    </td>
                    <tr style="height: 50px;"></tr>
                </tbody>
            </table>
        </div>
        <div style="margin-top: 20px;" class="header">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 30%; vertical-align: top; text-align: center;">
                            <span style="font-weight: 600">Request By / Date</span>
                            <span style="font-weight: 600a">{{ $status_peminjaman->request_by }}</span>
                        </th>
                        <th style="width: 50%; text-align: center; vertical-align: top;">
                            <span style="font-weight: 600">Dept / fungsi</span><br>
                            <span style="font-weight: 600a">{{ $status_peminjaman->fungsi }}</span>
                        </th>
                        <th style="width: 50%; text-align: center; vertical-align: top;">
                            <span style="font-weight: 600">Approve by supv/Asman/Manager</span>
                            <span style="font-weight: 600 a">{{ $approved1->name }}</span>
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
        <h4 style="margin: 0; text-align: center;"><span style="border-bottom: 1px solid black">FOR IT USE ONLY
            </span>
        </h4>
        <div style=" margin-topt: 40px; margin-left: 10px ">
            <h5 style="font-weight: 600; margin-bottom: 5px;">IT RECOMMENDATION</h5>
            <table style="margin-left: 40px; margin-top: 0; width: 100%">
                <tbody>
                    <tr style="margin-left: 40px">
                        <td style="width: 25% padding: 5px; vertical-align: top;">
                            <div class="form-check" style="position: relative;">
                                <input class="form-check-input" type="checkbox" style="position: absolute;"
                                    {{ $status_peminjaman->it_recommendation == 'accepted' ? 'checked' : '' }}>
                                <label style="margin-left: 20px;">Accepted</label>
                            </div>
                        </td>
                        <td style="width: 25% padding: 5px; vertical-align: top;">
                            <div class="form-check" style="position: relative;">
                                <input class="form-check-input" type="checkbox" style="position: absolute;"
                                    {{ $status_peminjaman->it_recommendation == 'not_accepted' ? 'checked' : '' }}>
                                <label style="margin-left: 20px;">Not Accepted</label>
                            </div>
                        </td>
                        <td
                            style="vertical-align: top;width: 50%; max-width: 40%; padding-right: 15%; text-align: justify;">
                            <span style="font-weight: 600; margin-top: 20px; ">Reason :</span>
                            <span
                                style="border-bottom: 1px solid black; width: 30%; ">{{ $status_peminjaman->reason }}
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div style="margin-top: 30px;" class="header">
                <table class="table" style="width: 100%;">
                    <thead>
                        <tr>
                            <th style="width: 30%; vertical-align: top; text-align: center;">
                                <span style="font-weight: 600;">Assigned by / Date</span><br>
                                <span style="font-weight: 600;">{{ $status_peminjaman->assigned_to }}</span>
                            </th>
                            <th style="width: 40%; text-align: center; vertical-align: top;">
                                <span style="font-weight: 600;">Approve by supv/Asman/Manager</span><br>
                                <span style="font-weight: 600;">{{ $approve2->name }}</span>
                            </th>
                            <th style="width: 30%; text-align: center; vertical-align: top;">
                                <div style="display: flex; align-items: center;">
                                    <span style="font-weight: 600; font-size: 12px;">PRIORITY</span>
                                    <table style="border-collapse: collapse; width: 100%; text-align: center">
                                        <tr style="border: none;">
                                            <td style="border: none; width: 33%; position: relative">
                                                <input class="form-check-input" style="position: absolute"
                                                    type="checkbox" id="priority1"
                                                    {{ $status_peminjaman->priority == '1' ? 'checked' : '' }}>
                                                <label class="form-check-label" style="margin-left: 30px"
                                                    for="priority1">1</label>
                                            </td>
                                            <td style="border: none; width: 33%; position: relative">
                                                <input class="form-check-input" type="checkbox" id="priority2"
                                                    style="position: absolute"
                                                    {{ $status_peminjaman->priority == '2' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="priority2"
                                                    style="margin-left: 30px">2</label>
                                            </td>
                                            <td style="border: none; width: 33%; position: relative">
                                                <input class="form-check-input" type="checkbox" id="priority3"
                                                    style="position: absolute"
                                                    {{ $status_peminjaman->priority == '3' ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="priority3"style="margin-left: 30px">3</label>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div style="margin-top: 20px; ">
                <table style="width: 100%;">
                    <tbody>
                        <tr>
                            <td style="vertical-align: top; max-width: 100%; text-align: justify;">
                                <span style="font-weight: 600;">Action :</span> <span
                                    style="border-bottom: 1px solid black; line-height: 20px">{{ $status_peminjaman->action }}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <hr>
            <div style="margin-top: 30px; width: 100%;">
                <table class="info-table" style="width: 100%; height: 10%;">
                    <thead style="margin-bottom: 0;">
                        <tr>
                            <td style="vertical-align: top; text-align: justify; width: 32%; padding-right: 10%;">
                                <span style="font-weight: 600; margin-right: 70px">Estimated Work</span> :
                                <span
                                    style="border-bottom: 1px solid black; line-height: 30px; padding-bottom: 10px">{{ $aksi->estimasi_kerja }}</span>
                            </td>
                            <td style="vertical-align: top; width: 32%; padding-right: 10%;">
                                <span style="font-weight: 600; margin-right: 50px; font-size: 12px">Est Expense
                                    Amount(US$)</span>
                                :
                                <span
                                    style="border-bottom: 1px solid black; line-height: 30px; padding-bottom: 10px">{{ $aksi->expense_amount }}</span>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="vertical-align: top; text-align: justify; width: 50%; padding-right: 10%;">
                                <span style="font-weight: 600; margin-right: 113px">Start Date</span> :
                                <span
                                    style="border-bottom: 1px solid black; line-height: 30px; padding-bottom: 10px">{{ $aksi->tanggal_mulai }}</span>
                            </td>
                            <td style="vertical-align: top; text-align: justify; width: 50%; padding-right: 10%;">
                                <span style="font-weight: 600; margin-right: 70px">Completion Date</span> :
                                <span
                                    style="border-bottom: 1px solid black; line-height: 30px; padding-bottom: 10px">{{ $aksi->completion_date }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; text-align: justify; width: 50%; padding-right: 10%;">
                                <span style="font-weight: 600; margin-right: 88px">Completed by</span> :
                                <span
                                    style="border-bottom: 1px solid black; line-height: 30px; padding-bottom: 10px">{{ $aksi->completed_by }}</span>
                            </td>
                            <td style="vertical-align: top; text-align: justify; width: 50%; padding-right: 10%;">
                                <span style="font-weight: 600; margin-right: 73px">User Acceptance</span> :
                                <span
                                    style="border-bottom: 1px solid black; line-height: 30px; padding-bottom: 10px">{{ $aksi->user_acceptance }}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
