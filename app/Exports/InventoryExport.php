<?php

namespace App\Exports;

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
        $details = TransactionDetail::select(
                'transaction_details.*',
                'drugs.code as drug_code',
                'drugs.name as drug_name'
            )
            ->leftJoin('drugs', 'transaction_details.drug_id', '=', 'drugs.id')
            ->where('transaction_details.transaction_id', $this->transaction_id)
            ->get();

        if ($details->isEmpty()) {
            Log::warning("Export gagal: Tidak ada data untuk transaction_id " . $this->transaction_id);
        }

        $data = [];

        // **1️⃣ Header Klinik**
        $data[] = ['Klinik Dokter Hendrik', '', '', '', '', '', '', 'No. LPB : LPB241206002', '', 'Tanggal: 6 December 2024'];
        $data[] = ['Surabaya', '', '', '', '', '', '', '', '', ''];
        $data[] = ['08987654321', '', '', '', '', '', '', '', '', ''];
        $data[] = ['']; // Baris kosong

        // **2️⃣ Judul Utama**
        $data[] = ['', '', '', '', 'LAPORAN PENERIMAAN BARANG', '', '', '', '', ''];
        $data[] = ['']; // Baris kosong

        // **3️⃣ Header Pemasok**
        $data[] = ['PT Obat Maju Jaya', '', '', '', '', '', '', '', '', ''];
        $data[] = ['Jl. Sudirman No.15, Surabaya', '', '', '', '', '', '', '', '', ''];
        $data[] = ['081298765432', '', '', '', '', '', '', '', '', ''];
        $data[] = ['']; // Baris kosong

        // **4️⃣ Header Tabel**
        $data[] = ['No', 'Kode Obat', 'Nama Obat', 'Jumlah', 'Harga Satuan', 'Subtotal'];

        // **5️⃣ Isi Data**
        $grand_total = 0;
        foreach ($details as $index => $item) {
            $data[] = [
                $index + 1,
                $item->drug_code ?? '-',
                $item->drug_name ?? '-',
                $item->quantity . ' pcs',
                'Rp ' . number_format($item->piece_price, 0, ',', '.'),
                'Rp ' . number_format($item->total_price, 0, ',', '.'),
            ];
            $grand_total += $item->total_price;
        }

        // **6️⃣ Spasi Sebelum Grand Total**
        $data[] = [''];
        $data[] = ['', '', '', '', 'Grand Total :', 'Rp ' . number_format($grand_total, 0, ',', '.')];

        return collect($data);
    }

    public function headings(): array
    {
        return [];
    }

    public function title(): string
    {
        return 'Laporan Penerimaan Barang';
    }

    public function styles(Worksheet $sheet)
    {
        // **Mengatur Merge Cells agar layout sesuai dengan gambar**
        $sheet->mergeCells('A1:C1'); // Klinik Dokter Hendrik
        $sheet->mergeCells('H1:I1'); // No. LPB
        $sheet->mergeCells('J1:K1'); // Tanggal
        $sheet->mergeCells('E5:G5'); // Judul "LAPORAN PENERIMAAN BARANG"
        $sheet->mergeCells('A7:C7'); // PT Obat Maju Jaya

        // **Styling agar rapi**
        return [
            5 => ['font' => ['bold' => true, 'size' => 14]], // Judul laporan
            10 => ['font' => ['bold' => true, 'size' => 12]], // Header tabel
            11 => ['font' => ['bold' => true]], // Kolom judul tabel
            count($this->collection()) + 12 => ['font' => ['bold' => true]], // Grand Total
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
            'H' => 20,   // No. LPB
            'J' => 20,   // Tanggal
        ];
    }
}
