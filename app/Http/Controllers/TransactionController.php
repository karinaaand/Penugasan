<?php

namespace App\Http\Controllers;

use App\Models\Master\Repack;
use App\Models\Transaction\Transaction;
use App\Models\Transaction\TransactionDetail;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $judul = "Log History";
        $transactions = Transaction::where('variant','Checkout')->paginate(2);
        return view('pages.transaction.index',compact('judul','transactions'));
    }
    public function create()
    {
        $judul = "Checkout Barang";
        return view('pages.transaction.checkout',compact('judul'));
    }
    public function store(Request $request)
    {
        $transaction = Transaction::create([
            "destination" => "customer",
            "variant" => "Checkout",
            "income" => $request->totalPay,
            "discount"=>$request->totalDisc
        ]);
        $transaction->generate_code();
        // $transaction = Transaction::find(2);
        $dataInput = json_decode($request->transaction);
        $totalProfit = 0;
        foreach ($dataInput->data as $item) {
            $repack = Repack::find($item->repackId);
            $drug = $repack->drug();
            $pieceProfit = $item->piecePrice - $drug->last_price*($item->repackQuantity/$drug->piece_netto);
            $totalProfit = $totalProfit + $pieceProfit*$item->quantity;
            $totalProfit = $totalProfit - $item->priceDiscount;
            $drug->customerUseWarehouse($transaction, $item->repackQuantity*$item->quantity, $item->repackQuantity,$item->repackName,$item->piecePrice,$item->priceDiscount);
        }
        $totalProfit = $totalProfit- $dataInput->totalDisc;
        $transaction->profit = $totalProfit;
        $transaction->discount = $dataInput->totalDisc;
        $transaction->income = $dataInput->totalPay;
        $transaction->save();
        // dd($dataInput,$transaction,$totalProfit);
        return redirect()->route('transaction.show',$transaction->id);
    }
    public function show(Transaction $transaction)
    {
        $judul = "Invoice";
        return view('pages.transaction.show',compact('judul','transaction'));
    }
}
