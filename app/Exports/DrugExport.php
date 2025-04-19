<?php

namespace App\Exports;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DrugExport implements FromView
{

    protected $drug;
        protected $stock;
        protected $details;
        protected $transactions;

        public function __construct($drug, $stock, $details, $transactions)
        {
            $this->drug = $drug;
            $this->stock = $stock;
            $this->details = $details;
            $this->transactions = $transactions;
        }

    public function view(): View
    {
        return view('pages.report.export.drug', [
        
            'drug' => $this->drug,
            'stock' => $this->stock,
            'details' => $this->details,
            'transactions' => $this->transactions
        ]);
    }
}






