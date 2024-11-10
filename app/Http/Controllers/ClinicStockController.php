<?php

namespace App\Http\Controllers;

use App\Models\Inventory\Clinic;
use App\Models\Master\Drug;
use App\Models\Transaction\Transaction;
use App\Models\Transaction\TransactionDetail;
use Illuminate\Http\Request;

class ClinicStockController extends Controller
{
    public function index()
    {
        $judul = "Stok Obat Klinik";
        $stocks = Clinic::paginate(5);
        return view("pages.clinic.stock",compact('judul','stocks'));
    }
    public function show(Drug $stock)
    {
        $judul = "Stok ".$stock->name;
        $drug = $stock;
        $stock = Clinic::where('drug_id',$drug->id)->first();
        $inflow = Transaction::where('variant','LPK')->pluck('id');
        $details = TransactionDetail::where('drug_id',$drug->id)->whereIn('transaction_id',$inflow)->whereNot('stock',0)->orderBy('expired')->paginate(10,['*'],'expired');
        $transactions = TransactionDetail::where('drug_id',$drug->id)->whereIn('transaction_id',$inflow)->orderBy('created_at')->paginate(10,['*'],'transaction');
        return view("pages.clinic.stockDetail",compact('drug','stock','judul','details','transactions'));
    }
}
