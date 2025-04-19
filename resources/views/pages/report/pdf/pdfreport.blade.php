<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Stok Obat</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Laporan Stok Obat</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Obat</th>
                <th>Nama Obat</th>
                <th>Stok</th>
                <th>Expired Terdekat</th>
                <th>Expired Terbaru</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($warehouses as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->data->code }}</td>
                <td>{{ $item->data->name }}</td>
                <td>{{ floor($item->quantity / $item->data->piece_netto) }} pcs</td>
                <td>{{ \Carbon\Carbon::parse($item->oldest)->translatedFormat('j F Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($item->latest)->translatedFormat('j F Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
