<?php

namespace App\Exports;

use App\Models\Transaction\TransactionDetail;
use App\Models\Profile;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class KlinikExport implements FromCollection, WithHeadings, WithTitle, WithStyles, WithColumnWidths
{
    protected $transaction_id;

    public function __construct($transaction_id)
    {
        $this->transaction_id = $transaction_id;
    }

    public function collection(): Collection
    {
        // Ambil informasi klinik dari tabel Profile
        $profile = Profile::first();
        $clinic_name = $profile->name ?? 'Nama Klinik';
        $clinic_address = $profile->address ?? 'Alamat Klinik';
        $clinic_phone = $profile->phone ?? 'No. Telepon Klinik';

        // Ambil satu TransactionDetail sebagai acuan
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
            ? Carbon::parse($transaction->created_at)->translatedFormat('j F Y')
            : now()->translatedFormat('j F Y');

        // Ambil detail transaksi
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
        $rowCount = count($this->collection()) + 1;

        return [
            5 => ['font' => ['bold' => true, 'size' => 14]], // Judul laporan
            8 => ['font' => ['bold' => true, 'size' => 12]], // Header tabel
            9 => ['font' => ['bold' => true]], // Kolom judul tabel
            $rowCount => ['font' => ['bold' => true]], // Grand Total

            // Mengatur alignment
            'A8:F8' => ['alignment' => ['horizontal' => 'center']], // Header tabel
            'A9:A' . $rowCount => ['alignment' => ['horizontal' => 'center']], // No urut
            'B9:B' . $rowCount => ['alignment' => ['horizontal' => 'center']], // Kode Obat
            'C9:C' . $rowCount => ['alignment' => ['horizontal' => 'left']], // Nama Obat
            'D9:F' . $rowCount => ['alignment' => ['horizontal' => 'center']], // Jumlah, Harga, dan Subtotal
            'F' . $rowCount => ['alignment' => ['horizontal' => 'right']], // Grand Total
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
        return 'Laporan Penerimaan Klinik';
    }
}
