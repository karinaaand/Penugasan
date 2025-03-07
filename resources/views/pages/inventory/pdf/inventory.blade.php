<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penerimaan Barang</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        .header, .supplier, .table { width: 100%; margin-bottom: 10px; }
        .table th, .table td { border: 1px solid #000; padding: 5px; text-align: center; }
        .title { text-align: center; font-weight: bold; font-size: 16px; margin-bottom: 10px; }
        .right { text-align: right; }
    </style>
</head>
<body>

    <table class="header">
        <tr>
            <td><b>Klinik Dokter Hendrik</b><br>Surabaya<br>08987654321</td>
            <td class="right"><b>No. LPB:</b> {{ $no_lpb}}<br><b>Tanggal:</b>{{ $tanggal_transaksi }}</td>
        </tr>
    </table>

    <div class="title">LAPORAN PENERIMAAN BARANG</div>

    <table class="supplier">
        <tr><td><b>PT Obat Maju Jaya</b></td></tr>
        <tr><td>Jl. Sudirman No.15, Surabaya</td></tr>
        <tr><td>081298765432</td></tr>
    </table>

    <table class="table">
        <tr>
            <th>No</th>
            <th>Kode Obat</th>
            <th>Nama Obat</th>
            <th>Jumlah</th>
            <th>Harga Satuan</th>
            <th>Subtotal</th>
        </tr>
        @foreach ($details as $index => $item)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->drug_code ?? '-' }}</td>
            <td>{{ $item->drug_name ?? '-' }}</td>
            <td>{{ $item->quantity }} pcs</td>
            <td>Rp {{ number_format($item->piece_price, 0, ',', '.') }}</td>
            <td>Rp {{ number_format($item->total_price, 0, ',', '.') }}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="5" class="right"><b>Grand Total :</b></td>
            <td><b>Rp {{ number_format($grand_total, 0, ',', '.') }}</b></td>
        </tr>
    </table>

</body>
</html>
