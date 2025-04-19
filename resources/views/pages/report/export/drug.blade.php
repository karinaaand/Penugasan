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

<table border="1" cellspacing="0" cellpadding="5" style="width: 100%; border-collapse: collapse;">
    <tr>
        <th colspan="7" style="text-align: center; font-size: 18px; background-color: #f2f2f2;">
            DETAIL LAPORAN OBAT
        </th>
    </tr>

    {{-- Bagian Detail Obat --}}
    <tr><th colspan="2" style="background-color: #d9edf7;">DETAIL OBAT</th></tr>
    <tr><td>Nama</td><td>{{ $drug->name }}</td></tr>
    <tr><td>Kode Obat</td><td>{{ $drug->code }}</td></tr>
    <tr><td>Jenis</td><td>{{ $drug->variant()->name }}</td></tr>
    <tr><td>Kategori</td><td>{{ $drug->category()->name }}</td></tr>
    <tr><td>Produsen</td><td>{{ $drug->manufacture()->name }}</td></tr>
    <tr><td>Sisa</td><td>{{ $stock->quantity / $drug->piece_netto }} pcs</td></tr>

    {{-- Spasi kosong --}}
    <tr><td colspan="7">&nbsp;</td></tr>

    {{-- Stok Konversi --}}
    <tr><th colspan="5" style="background-color: #d9edf7;">STOK KONVERSI</th></tr>
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

    {{-- Spasi kosong --}}
    <tr><td colspan="7">&nbsp;</td></tr>

    {{-- Kategori Expired --}}
    <tr><th colspan="3" style="background-color: #d9edf7;">KATEGORI BERDASARKAN EXP DATE</th></tr>
    <tr>
        <th>No</th>
        <th>Waktu Expired</th>
        <th>Jumlah</th>
    </tr>
    @foreach ($details as $number => $item)
    <tr>
        <td>{{ $number + 1 }}</td>
        <td>{{ \Carbon\Carbon::parse($item->expired)->translatedFormat('j F Y') }}</td>
        <td>{{ floor($item->stock / $item->drug()->piece_netto) }}</td>
    </tr>
    @endforeach

    {{-- Spasi kosong --}}
    <tr><td colspan="7">&nbsp;</td></tr>

    {{-- Histori Transaksi --}}
    <tr><th colspan="7" style="background-color: #d9edf7;">HISTORI TRANSAKSI</th></tr>
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
