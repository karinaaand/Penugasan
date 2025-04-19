<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Detail Obat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            text-transform: uppercase;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th, td {
            border: 0.5px solid #555;
            padding: 6px 8px;
            text-align: center;
        }

        th {
            background-color: #f0f0f0;
        }

        td:first-child, th:first-child {
            text-align: left;
        }

        tr:nth-child(even) td {
            background-color: #fafafa;
        }

        .section-title {
            background-color: #dcdcdc;
            font-weight: bold;
            text-align: center;
        }

        .signature {
            width: 100%;
            margin-top: 50px;
            text-align: center;
        }

        .signature p {
            margin: 60px 0 0 0;
        }
    </style>
</head>
<body>

<h2>Laporan Detail Obat</h2>

@php
    function getStatus(string $variant)
    {
        return match ($variant) {
            'LPB' => 'Masuk',
            'LPK' => 'Klinik',
            'Checkout' => 'Keluar',
            'Trash' => 'Buang',
            'Retur' => 'Retur',
            default => 'Tidak diketahui',
        };
    }
@endphp

{{-- DETAIL OBAT --}}
<table>
    <tr><th colspan="2" class="section-title">Detail Obat</th></tr>
    <tr><td>Nama</td><td>{{ $drug->name }}</td></tr>
    <tr><td>Kode Obat</td><td>{{ $drug->code }}</td></tr>
    <tr><td>Jenis</td><td>{{ optional($drug->variant())->name }}</td></tr>
    <tr><td>Kategori</td><td>{{ optional($drug->category())->name }}</td></tr>
    <tr><td>Produsen</td><td>{{ optional($drug->manufacture())->name }}</td></tr>
    <tr><td>Sisa</td><td>{{ $stock->quantity / $drug->piece_netto }} pcs</td></tr>
</table>

{{-- STOK KONVERSI --}}
<table>
    <tr><th colspan="5" class="section-title">Stok Konversi</th></tr>
    <tr>
        <th>No</th>
        <th>Nama Packaging Obat</th>
        <th>Margin</th>
        <th>Stok Konversi</th>
        <th>Harga Jual</th>
    </tr>
    @foreach ($drug->repacks() as $number => $item)
    <tr>
        <td>{{ $number + 1 }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->margin }}%</td>
        <td>{{ floor($stock->quantity / $item->quantity) }}</td>
        <td>{{ 'Rp ' . number_format($item->price, 0, ',', '.') }}</td>
    </tr>
    @endforeach
</table>

{{-- EXP DATE --}}
<table>
    <tr><th colspan="3" class="section-title">Kategori Berdasarkan Exp Date</th></tr>
    <tr>
        <th>No</th>
        <th>Waktu Expired</th>
        <th>Jumlah</th>
    </tr>
    @foreach ($details as $number => $item)
    <tr>
        <td>{{ $number + 1 }}</td>
        <td>{{ \Carbon\Carbon::parse($item->expired)->translatedFormat('j F Y') }}</td>
        <td>{{ floor($item->stock / optional($item->drug())->piece_netto) }}</td>
    </tr>
    @endforeach
</table>

{{-- HISTORI TRANSAKSI --}}
<table>
    <tr><th colspan="7" class="section-title">Histori Transaksi</th></tr>
    <tr>
        <th>No</th>
        <th>Jenis Packaging Obat</th>
        <th>Margin</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Status</th>
        <th>Subtotal</th>
    </tr>
    @foreach ($transactions as $number => $item)
    <tr>
        <td>{{ $number + 1 }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->margin }}%</td>
        <td>{{ 'Rp ' . number_format($item->piece_price, 0, ',', '.') }}</td>
        <td>{{ $item->quantity }}</td>
        <td>{{ getStatus($item->transaction->variant) }}</td>
        <td>{{ 'Rp ' . number_format($item->total_price, 0, ',', '.') }}</td>
    </tr>
    @endforeach
</table>
</body>
</html>
