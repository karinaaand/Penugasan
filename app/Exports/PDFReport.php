<?php

namespace App\Exports;

use App\Models\Inventory\Warehouse;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PDFReport implements FromView
{
    public function view(): View
    {
        $stocks = Warehouse::with('data')->get(); // Menggunakan 'data' karena 'drug()' memakai first()
        return view('pdfreport', compact('stocks'));
    }
}

