<?php

namespace App\Http\Controllers;

use App\Models\Inventory\Warehouse;
use App\Models\Transaction\Transaction;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function drugs(){
        $judul = "Laporan Obat";
        $stocks = Warehouse::paginate(5);
        return view("pages.report.drug",compact('judul','stocks'));    
    }
    public function drugPrint(){

    }
    public function transactions(){
        $judul = "Laporan Transaksi";
        $transactions = Transaction::paginate(10);
        return view("pages.report.transaction",compact('judul','transactions'));
    }
    public function transactionPrint(){

    }
}
