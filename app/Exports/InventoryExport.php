<?php

namespace App\Exports;

use App\Models\Profile;
use App\Models\Transaction\TransactionDetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class InventoryExport implements FromCollection, WithHeadings, WithTitle, WithStyles, WithColumnWidths
{
    protected $transaction_id;

    public function __construct($transaction_id)
    {
        $this->transaction_id = $transaction_id;
    }

    public function collection(): Collection
    {
        // Ambil satu TransactionDetail sebagai acuan (pakai first)
        $transactionDetail = TransactionDetail::where('transaction_id', $this->transaction_id)
            ->with('transaction')
            ->first();

        // Pastikan transaksi ditemukan
        if (!$transactionDetail || !$transactionDetail->transaction) {
            Log::warning("Export gagal: Tidak ada transaksi dengan ID " . $this->transaction_id);
            return collect([]);
        }

        // Ambil data transaksi
        $transaction = $transactionDetail->transaction;
        $no_lpb = $transaction->code ?? 'N/A';
        $tanggal_transaksi = $transaction->created_at
            ? \Carbon\Carbon::parse($transaction->created_at)->format('d F Y')
            : now()->format('d F Y');

        // Ambil semua detail transaksi dengan kode dan nama obat
        $details = TransactionDetail::select(
                'transaction_details.*',
                'drugs.code as drug_code',
                'drugs.name as drug_name'
            )
            ->leftJoin('drugs', 'transaction_details.drug_id', '=', 'drugs.id')
            ->where('transaction_details.transaction_id', $this->transaction_id)
            ->get();

        $data = [];

        $profile = Profile::first();
        // dd($profile);
        // Header Klinik
        $data[] = [$profile->name, '', '', '', '', 'No. LPB : ' . $no_lpb];
        $data[] = [$profile->address, '', '', '', '', 'Tanggal: ' . $tanggal_transaksi];
        $data[] = [$profile->phone, '', '', '', '', ''];
        $data[] = ['']; // Baris kosong
        $data[] = ['', '', 'LAPORAN PENERIMAAN BARANG', '', '', ''];
        $data[] = ['']; // Baris kosong

        // Ambil data pemasok dari transaksi
        $vendor = $transaction->vendor();
        // dd($vendor);

        // Pastikan vendor ditemukan
        $vendor_name = $vendor ? $vendor->name : 'Vendor Tidak Diketahui';
        $vendor_address = $vendor ? $vendor->address : '-';
        $vendor_phone = $vendor ? $vendor->phone : '-';

        // Header Pemasok (Menggunakan Database)
        $data[] = [$vendor_name, '', '', '', '', ''];
        $data[] = [$vendor_address, '', '', '', '', ''];
        $data[] = [$vendor_phone, '', '', '', '', ''];
        $data[] = ['']; // Baris kosong

        // Header Tabel
        $data[] = ['No', 'Kode Obat', 'Nama Obat', 'Jumlah', 'Harga Satuan', 'Subtotal'];

        // Isi Data
        $grand_total = 0;
        foreach ($details as $index => $item) {
            $data[] = [
                $index + 1,
                $item->drug_code ?? '-',
                $item->drug_name ?? '-',
                $item->quantity . ' ',
                'Rp ' . number_format($item->piece_price, 0, ',', '.'),
                'Rp ' . number_format($item->total_price, 0, ',', '.'),
            ];
            $grand_total += $item->total_price;
        }

        // Grand Total
        $data[] = ['']; // Baris kosong setelah data
        $data[] = ['', '', '', '', 'Grand Total :', 'Rp ' . number_format($grand_total, 0, ',', '.')];

        return collect($data);
    }

    public function styles(Worksheet $sheet)
    {
        $rowCount = count($this->collection()) + 1; // Menghitung total baris termasuk header

        return [
            5 => ['font' => ['bold' => true, 'size' => 14]], // Judul laporan
            10 => ['font' => ['bold' => true, 'size' => 12]], // Header tabel
            11 => ['font' => ['bold' => true]], // Kolom judul tabel
            $rowCount => ['font' => ['bold' => true]], // Grand Total

            // Mengatur alignment
            'A10:F10' => ['alignment' => ['horizontal' => 'center']], // Header tabel
            'A11:A' . $rowCount => ['alignment' => ['horizontal' => 'center']], // No urut
            'B11:B' . $rowCount => ['alignment' => ['horizontal' => 'center']], // Kode Obat (tengah)
            'C11:C' . $rowCount => ['alignment' => ['horizontal' => 'left']], // Nama Obat (kiri)
            'D11:F' . $rowCount => ['alignment' => ['horizontal' => 'center']], // Jumlah, Harga, dan Subtotal
            'F' . $rowCount => ['alignment' => ['horizontal' => 'right']], // Grand Total (kanan)
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,    // No
            'B' => 15,   // Kode Obat
            'C' => 30,   // Nama Obat
            'D' => 15,   // Jumlah
            'E' => 15,   // Harga Satuan
            'F' => 20,   // Subtotal
        ];
    }

    public function headings(): array
    {
        return [];
    }

    public function title(): string
    {
        return 'Laporan Penerimaan Barang';
    }
}
