<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class InventoryUpload implements ToCollection, WithHeadingRow, WithCalculatedFormulas
{
    public function collection(Collection $rows)
    {
        // Proses dan filter data yang valid
        $filteredData = $rows->map(function ($row) {
            if ($this->isEmptyRow($row) || !isset($row['nama_obat']) || !isset($row['jumlah'])) {
                return null;
            }

            // Format tanggal dari Excel menjadi Y-m-d
            if (isset($row['tanggal_pembayaran']) && is_numeric($row['tanggal_pembayaran'])) {
                $row['tanggal_pembayaran'] = Carbon::instance(Date::excelToDateTimeObject($row['tanggal_pembayaran']))->format('Y-m-d');
            }

            if (isset($row['tanggal_exp']) && is_numeric($row['tanggal_exp'])) {
                $row['tanggal_exp'] = Carbon::instance(Date::excelToDateTimeObject($row['tanggal_exp']))->format('Y-m-d');
            }

            // Pastikan harga satuan adalah angka
            if (isset($row['harga_satuan']) && is_numeric($row['harga_satuan'])) {
                $row['harga_satuan'] = (float) $row['harga_satuan'];
            }

            return $row;
        })->filter(function ($row) { return $row !== null; });

        // Simpan data ke session jika ada
        if ($filteredData->isNotEmpty()) {
            Session::put('imported_data', $filteredData);
            Session::save();
        }
    }

    /**
     * Mengecek apakah sebuah baris kosong
     */
    private function isEmptyRow($row): bool
    {
        foreach ($row as $value) {
            if (!empty($value) && $value !== null && $value !== '') {
                return false;
            }
        }
        return true;
    }

    /**
     * Menggunakan header di baris pertama
     */
    public function headingRow(): int
    {
        return 1;
    }
}
