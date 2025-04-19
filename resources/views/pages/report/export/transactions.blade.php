<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Transaksi</th>
            <th>Tanggal</th>
            <th>Jenis</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transactions as $i => $item)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $item->code }}</td>
                <td>{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}</td>
                <td>{{ $item->variant }}</td>
                <td>
                    @php
                        $amount = match ($item->variant) {
                            'LPB' => $item->outcome,
                            'LPK' => $item->details()->sum('total_price'),
                            'Checkout' => $item->income,
                            'Retur' => 0,
                            'Trash' => -$item->loss,
                            default => null,
                        };
                    @endphp
                    {{ $amount !== null ? 'Rp ' . number_format($amount, 0, ',', '.') : '-' }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
