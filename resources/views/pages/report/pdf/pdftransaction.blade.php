<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Transaksi</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .text-right {
            text-align: right;
        }
    </style>
</head>
<body>

    <h2>Laporan Transaksi</h2>

    @if($transactions->isEmpty())
        <p style="text-align: center; margin-top: 20px;">Tidak ada data transaksi.</p>
    @else
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Transaksi</th>
                <th>Tanggal</th>
                <th>Jenis</th>
                <th class="text-right">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $i => $item)
                @php
                    $amount = match ($item->variant) {
                        'LPB' => $item->outcome,
                        'LPK' => $item->details()->sum('total_price'), // <- ini PAKAI method dengan ()
                        'Checkout' => $item->income,
                        'Retur' => 0,
                        'Trash' => -$item->loss,
                        default => null,
                    };


                @endphp
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $item->code }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}</td>
                    <td>{{ $item->variant }}</td>
                    <td class="text-right">
                        {{ $amount !== null ? 'Rp ' . number_format($amount, 0, ',', '.') : '-' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif

</body>
</html>
