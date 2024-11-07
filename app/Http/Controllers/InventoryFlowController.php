<?php

namespace App\Http\Controllers;

use App\Models\Inventory\Warehouse;
use App\Models\Master\Drug;
use App\Models\Master\Vendor;
use App\Models\Transaction\Bill;
use App\Models\Transaction\Transaction;
use App\Models\Transaction\TransactionDetail;
use Illuminate\Http\Request;

class InventoryFlowController extends Controller
{
    public function index()
    {
        $judul = "Barang Masuk";
        $transactions = Transaction::where('variant','LPB')->paginate(5);
        return view("pages.inventory.inflow",compact('judul','transactions'));
    }
    public function create()
    {
        $vendors = Vendor::all();
        $drugs = Drug::all();
        return view("pages.inventory.addStuff",compact('vendors','drugs'));
    }
    public function store(Request $request)
    {
        $datas = json_decode($request->transaction);
        $transaction = Transaction::create([
            "vendor_id"=>$request->vendor_id,
            "destination"=>"warehouse",
            "method"=>$request->method,
            "variant"=>"LPB",
            "outcome"=>$request->total
        ]);
        $transaction->generate_code();
        if($transaction->method=="credit"){
            Bill::create([
                "transaction_id"=>$transaction->id,
                "total"=>$transaction->outcome,
                "status"=>"Belum Bayar",
                "arrive"=>$transaction->created_at,
                "due"=>$request->due
            ]);
        };
        foreach ($datas as $item) {
            // dd($item);
            $detail = TransactionDetail::create([
                "transaction_id"=>$transaction->id,
                "drug_id"=>Drug::where('name',$item->name)->first()->id,
                "quantity"=>$item->quantity." " . $item->unit,
                "piece_price"=>$item->piece_price,
                "total_price"=>$item->price,
                
            ]);
            match ($item->unit) {
                "pcs" => $quantity= $item->quantity*$detail->drug()->piece_netto,
                "pack" => $quantity= $item->quantity*($detail->drug()->piece_netto*$detail->drug()->piece_quantity),
                "box" => $quantity= $item->quantity*($detail->drug()->piece_netto*$detail->drug()->piece_quantity*$detail->drug()->pack_quantity),
            };
            $stock = Warehouse::where('drug_id',$detail->drug()->id)->first();
            $stock->quantity = $stock->quantity + $quantity;
            if ($stock->oldest == null) {
                $stock->oldest = $item->expired;
                $stock->latest = $item->expired;
            }else{
                if ($stock->oldest > $item->expired) {
                    $stock->oldest = $item->expired;
                }
                if ($stock->latest < $item->expired) {
                    $stock->latest = $item->expired;  
                }
            }
            $stock->save();
        };
        return redirect()->route('inventory.inflows.show',$transaction->id);
    }
    public function show(string $inflows)
    {
        $transaction = Transaction::find($inflows);
        $judul = "Transaksi Obat Masuk";
        $details = $transaction->details();
        return view("pages.inventory.inflowDetail",compact('transaction','judul','details'));
    }
    public function print()
    {
        
    }
    
}
