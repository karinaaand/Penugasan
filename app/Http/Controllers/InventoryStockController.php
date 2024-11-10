<?php

namespace App\Http\Controllers;

use App\Models\Inventory\Warehouse;
use App\Models\Master\Drug;
use App\Models\Transaction\Transaction;
use App\Models\Transaction\TransactionDetail;
use App\Models\Transaction\Trash;
use Illuminate\Http\Request;

class InventoryStockController extends Controller
{
    public function index()
    {
        $judul = "Stok Obat Gudang";
        $stocks = Warehouse::paginate(5);
        return view("pages.inventory.stock",compact('judul','stocks'));
    }
    public function show(Drug $stock)
    {
        $judul = "Stok ".$stock->name;
        $drug = $stock;
        $stock = Warehouse::where('drug_id',$drug->id)->first();
        $inflow = Transaction::where('variant','LPB')->pluck('id');
        $details = TransactionDetail::where('drug_id',$drug->id)->whereIn('transaction_id',$inflow)->whereNot('stock',0)->orderBy('expired')->paginate(10,['*'],'expired');
        $transactions = TransactionDetail::with('transaction')->where('drug_id',$drug->id)->orderBy('created_at')->paginate(5,['*'],'transaction');
        return view("pages.inventory.stockDetail",compact('drug','stock','judul','details','transactions'));
    }
    public function destroy(string $id)
    {
        //
    }
    public function retur(Request $request,TransactionDetail $batch)
    {
        if($request->isMethod('get')){
            return view("pages.inventory.retur",compact('batch'));
        }
    }
    public function trash(Request $request,TransactionDetail $batch)
    {
        $drug = $batch->drug();
        $judul = "Buang Obat ". $drug->name;
        if($request->isMethod('get')){
            return view("pages.inventory.trash",compact('batch','judul'));
        }elseif($request->isMethod('post')){
            // dd($request);
            $transaction = Transaction::create([
                "vendor_id"=>$batch->transaction->vendor()->id,
                "destination"=>"warehouse",
                "variant"=>"Trash",
                "loss"=>$request->quantity*$drug->last_price
            ]);
            $detail = TransactionDetail::create([
                "transaction_id"=>$transaction->id,
                "drug_id"=> $drug->id,
                "expired"=>$batch->expired,
                "name"=>$drug->name." 1 pcs",
                "quantity"=>$request->quantity." pcs",
                "piece_price"=>$drug->last_price,
                "total_price"=>$request->quantity * $drug->last_price
            ]);
            $transaction->generate_code();
            Trash::create([
                "drug_id"=> $drug->id,
                "transaction_id"=>$transaction->id,
                "transaction_detail_id"=>$detail->id,
                "quantity"=>$request->quantity * $drug->piece_netto,
                "reason"=>$request->reason,
            ]);
            $batch->stock = $batch->stock - $request->quantity*$drug->piece_netto;
            $batch->save();
            $warehouse = Warehouse::where('drug_id',$drug->id)->first();
            $warehouse->quantity = $warehouse->quantity - $request->quantity*$drug->piece_netto;
            $warehouse->save();
            return redirect()->route('inventory.stocks.show',$drug->id);
        }
    }
}
