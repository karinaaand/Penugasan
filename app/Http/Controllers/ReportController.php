<?php

namespace App\Http\Controllers;

use App\Models\Inventory\Warehouse;
use App\Models\Transaction\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function searchTransaction(Request $request)
    {
        $query = $request->input('query');
        $transactions = Transaction::where('code', 'like', "%{$query}%")->with('detail')->get();

        return response()->json($transactions);
    }

    public function drugs(){
        $judul = "Laporan Obat";
        $stocks = Warehouse::paginate(5);
        return view("pages.report.drug",compact('judul','stocks'));    
    }
    public function drugPrint(){

    }
    public function transactions(Request $request){
        $judul = "Laporan Transaksi";
        if($request->has('start') && $request->has('end')){
            $end = Carbon::parse($request->end)->endOfDay();
            $transactions = Transaction::whereBetween('created_at',[$request->start,$end])->paginate(10);
            // dd($transactions);
        }else{
            $transactions = Transaction::paginate(10);
        }
        return view("pages.report.transaction",compact('judul','transactions'));
    }
    public function transactionPrint(){

    }
}
