<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Kerusakan IT</title>
    <style>
        body { font-family: 'Times New Roman', Times, serif; font-size: 12pt; margin: 0; padding: 20px; }
        .header { text-align: center; margin-bottom: 20px; border-bottom: 3px double black; padding-bottom: 10px; }
        .header h1, .header h2 { margin: 0; }
        .header h1 { font-size: 14pt; font-weight: bold; }
        .header h2 { font-size: 12pt; font-weight: normal; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 5px 8px; text-align: left; vertical-align: top; }
        th { background-color: #f0f0f0; }
        .ttd { margin-top: 50px; float: right; text-align: center; width: 200px; }
        @media print {
            @page { margin: 1cm; size: A4; }
            .no-print { display: none; }
        }
    </style>
</head>
<body onload="window.print()">

    <div class="header">
        <h1>PEMERINTAH PROVINSI BENGKULU</h1>
        <h1>SEKRETARIAT DAERAH - BIRO UMUM</h1>
        <h2>Jl. Pembangunan No. 1 Padang Harapan Kota Bengkulu</h2>
    </div>

    <h3 style="text-align: center; text-decoration: underline;">LAPORAN REKAPITULASI KERUSAKAN ASET IT</h3>
    <p style="text-align: center;">Periode: {{ \Carbon\Carbon::parse($startDate)->format('d F Y') }} s/d {{ \Carbon\Carbon::parse($endDate)->format('d F Y') }}</p>

    <table>
        <thead>
            <tr>
                <th style="width: 5%">No</th>
                <th style="width: 15%">Tanggal</th>
                <th style="width: 20%">Pelapor / Unit</th>
                <th style="width: 25%">Keluhan / Masalah</th>
                <th style="width: 20%">Penanganan / Solusi</th>
                <th style="width: 10%">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tickets as $index => $ticket)
            <tr>
                <td style="text-align: center">{{ $index + 1 }}</td>
                <td>{{ $ticket->created_at->format('d/m/Y') }}</td>
                <td>
                    <strong>{{ $ticket->user->name }}</strong><br>
                    <small>({{ $ticket->user->unit_kerja }})</small>
                </td>
                <td>
                    {{ $ticket->judul_laporan }}<br>
                    <small><i>Lokasi: {{ $ticket->lokasi_ruangan }}</i></small>
                </td>
                <td>{{ $ticket->catatan_teknisi ?? '-' }}</td>
                <td style="text-align: center">{{ ucfirst($ticket->status) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center; padding: 20px;">Tidak ada data laporan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="ttd">
        <p>Bengkulu, {{ now()->format('d F Y') }}</p>
        <p>Kepala Bagian Umum,</p>
        <br><br><br>
        <p><strong>(Nama Pejabat)</strong></p>
        <p>NIP. .........................</p>
    </div>

</body>
</html>
