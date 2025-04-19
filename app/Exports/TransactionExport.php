<?php

namespace App\Exports;

use App\Models\Transaction\Transaction;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TransactionExport implements FromView
{
    protected $start;
    protected $end;

    public function __construct($start = null, $end = null)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function view(): View
    {
        $transactions = Transaction::query();

        if ($this->start && $this->end) {
            $transactions->whereBetween('created_at', [
                $this->start,
                \Carbon\Carbon::parse($this->end)->endOfDay()
            ]);
        }

        return view('pages.report.export.transactions', [ // <-- Disesuaikan
            'transactions' => $transactions->get()
        ]);
    }
}


