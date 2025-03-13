<?php

namespace App\Http\Controllers;

use App\Exports\KlinikExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class KlinikController extends Controller
{
    public function export($transaction_id)
{
    return Excel::download(new KlinikExport($transaction_id), 'klinik.xlsx');
}

}
