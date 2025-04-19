<?php

namespace App\Exports;

use App\Models\Inventory\Warehouse;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ReportExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Warehouse::with('data')->get();

    }

    public function headings(): array
    {
        return [
            'No', 'Kode Obat', 'Nama Obat', 'Stok', 'Expired Terdekat', 'Expired Terbaru'
        ];
    }

    public function map($item): array
    {
        // dd($item->data);
        return [
            $item->id,
            $item->data->code,
            $item->data->name,
            floor($item->quantity / $item->data->piece_netto) . ' pcs',
            Carbon::parse($item->oldest)->translatedFormat('j F Y'),
            Carbon::parse($item->latest)->translatedFormat('j F Y'),
        ];
    }

}
