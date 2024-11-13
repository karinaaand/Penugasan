<?php

namespace App\Http\Controllers;

use App\Models\Inventory\Clinic;
use App\Models\Master\Drug;
use App\Models\Transaction\Transaction;
use App\Models\Transaction\TransactionDetail;
use App\Models\Transaction\Trash;
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
        // dd($details);
        $transactions = TransactionDetail::where('drug_id',$drug->id)->whereIn('transaction_id',$inflow)->orderBy('created_at')->paginate(10,['*'],'transaction');
        return view("pages.clinic.stockDetail",compact('drug','stock','judul','details','transactions'));
    }
    public function retur(Request $request,TransactionDetail $batch)
    {
        $drug = $batch->drug();
        $judul = "Retur Obat ". $drug->name;
        if($request->isMethod('get')){
            return view("pages.inventory.retur",compact('batch','judul'));
        }elseif ($request->isMethod('post')) {
            $transaction = Transaction::create([
                "vendor_id"=>$batch->transaction->vendor()->id,
                "destination"=>"warehouse",
                "variant"=>"Retur",
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
            Retur::create([
                "drug_id"=> $drug->id,
                "transaction_id"=>$transaction->id,
                "transaction_detail_id"=>$detail->id,
                "source"=>$batch->id,
                "quantity"=>$request->quantity * $drug->piece_netto,
                "status"=>"Belum Kembali",
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
            $warehouse = Clinic::where('drug_id',$drug->id)->first();
            $warehouse->quantity = $warehouse->quantity - $request->quantity*$drug->piece_netto;
            $warehouse->save();
            return redirect()->route('inventory.stocks.show',$drug->id);
        }
    }
}
