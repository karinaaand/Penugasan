<?php

namespace App\Http\Controllers;

use App\Models\Inventory\Clinic;
use App\Models\Inventory\Warehouse;
use App\Models\Master\Drug;
use App\Models\Transaction\Transaction;
use App\Models\Transaction\TransactionDetail;
use Illuminate\Http\Request;

class ClinicFlowController extends Controller
{
    public function index()
    {
        $judul = "Barang Masuk";
        $transactions = Transaction::where('variant','LPK')->paginate(5);
        return view("pages.clinic.inflow",compact('judul','transactions'));
    }
    public function create()
    {
        return view('pages.clinic.addStuff');
    }
    public function store(Request $request)
    {
        $datas = json_decode($request->transaction);
        $transaction = Transaction::create([
            "vendor_id"=>$request->vendor_id,
            "destination"=>"clinic",
            "variant"=>"LPK",
        ]);
        $transaction->generate_code();
        foreach ($datas as $item) {
            $drugAdd = Drug::where('name',$item->name)->first();
            TransactionDetail::create([
                "transaction_id"=>$transaction->id,
                "drug_id"=>$drugAdd->id,
                "quantity"=>$item->quantity." pcs",
                "piece_price"=>$drugAdd->last_price,
                "total_price"=>$drugAdd->last_price*$item->quantity,                
            ]);
            $warehouse = Warehouse::where('drug_id',$drugAdd->id)->first();
            $warehouse->quantity = $warehouse->quantity - ($drugAdd->piece_netto*$item->quantity);
            $clinic = Clinic::where('drug_id',$drugAdd->id)->first();
            $clinic->quantity = $clinic->quantity + ($drugAdd->piece_netto*$item->quantity);
            if ($clinic->oldest == null) {
                $clinic->oldest = $warehouse->oldest;
                $clinic->latest = $warehouse->oldest;
            }else{
                if ($clinic->oldest > $warehouse->oldest) {
                    $clinic->oldest = $warehouse->oldest;
                }
                if ($clinic->latest < $warehouse->latest) {
                    $clinic->latest = $warehouse->latest;  
                }
            }
            $clinic->save();
        };
        return redirect()->route('clinic.inflows.show',$transaction->id);
    
    }
    public function show(string $inflows)
    {
        $transaction = Transaction::find($inflows);
        $judul = "Transaksi Obat Masuk";
        $details = $transaction->details();
        return view("pages.clinic.inflowDetail",compact('transaction','judul','details'));
    }
    
}
