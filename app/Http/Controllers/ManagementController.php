<?php

namespace App\Http\Controllers;

use App\Models\Inventory\Warehouse;
use App\Models\Transaction\Bill;
use App\Models\Transaction\Retur;
use App\Models\Transaction\Transaction;
use App\Models\Transaction\Trash;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagementController extends Controller
{

    public function searchManagement(Request $request)
    {
        $variant = $request->input('variant');
        $query = $request->input('query');
        $transactions = Transaction::where('code', 'like', "%{$query}%")->pluck('id');
        if($variant=='bill'){
            $bills = Bill::whereIn('transaction_id',$transactions)->with('trans')->get();
            return response()->json($bills);
        }elseif($variant=='retur'){
            $returs = Retur::whereIn('transaction_id',$transactions)->with('trans')->get();
            return response()->json($returs);
            
        }elseif($variant=='trash'){
            $trashes = Trash::whereIn('transaction_id',$transactions)->with('trans')->get();
            return response()->json($trashes);
        }
    }

    public function bills(Request $request)
    {
        if($request->has('start') && $request->has('end')){
            $end = Carbon::parse($request->end)->endOfDay();
            $bills = Bill::whereBetween('created_at',[$request->start,$end])->orderBy('status')->paginate(10);
        }else{
            $bills = Bill::orderBy('status')->paginate(10);
        }
        $judul = "Tagihan Obat";
        return view("pages.management.bill", compact('judul', 'bills'));
    }
    public function bill(Bill $bill)
    {
        $judul = "Tagihan Vendor " . $bill->transaction()->vendor()->name;
        return view("pages.management.billDetail", compact('bill', 'judul'));
    }
    public function billPrint() {}
    //melakukan pembayaran tagihan
    public function billPay(Bill $bill)
    {
        
        DB::beginTransaction();
        try {
            $bill->status = "Done";
            $bill->pay = now();
            $bill->save();
            DB::commit();
            return redirect()->route('management.bill.index')->with('success','Tagihan berhasil dibayarkan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('management.bill.index')->with('error','Tagihan gagal dibayarkan');
        }
    }
    public function returs(Request $request)
    {
        if($request->has('start') && $request->has('end')){
            $end = Carbon::parse($request->end)->endOfDay();
            $returs = Retur::whereBetween('created_at',[$request->start,$end])->paginate(10);
        }else{
            $returs = Retur::paginate(10);
        }
        $judul = "Manajemen Obat Retur";
        return view("pages.management.retur", compact('returs', 'judul'));
    }
    public function retur(Transaction $retur)
    {
        $retur = $retur->retur();
        $judul = "Laporan Retur Obat " . $retur->drug()->name;
        return view("pages.management.returDetail", compact('retur', 'judul'));
    }
    public function trashes(Request $request)
    {
        if($request->has('start') && $request->has('end')){
            $end = Carbon::parse($request->end)->endOfDay();
            $trashes = Trash::whereBetween('created_at',[$request->start,$end])->paginate(10);
        }else{
            $trashes = Trash::paginate(10);
        }
        $judul = "Manajemen Obat Buang";
        return view("pages.management.trash", compact('trashes', 'judul'));
    }
    public function trash(Transaction $trash)
    {
        $trash = $trash->trash();
        $judul = "Laporan Pembuangan Obat " . $trash->drug()->name;
        return view("pages.management.trashDetail", compact('trash', 'judul'));
    }
    public function returPrint() {}
    //melakukan penerimaan barang retur
    public function returPay(Retur $retur)
    {
        DB::beginTransaction();
    
        try {
            $batch = $retur->source();  
            $drug = $batch->drug();
            $batch->update([
                "stock" => $batch->stock + $retur->quantity
            ]);
            $warehouse = Warehouse::where('drug_id', $drug->id)->first();
            $warehouse->update([
                "quantity" => $warehouse->quantity + $retur->quantity
            ]);
            $retur->update([
                'status' => 'Done',
                'arrive' => now(),
            ]);    
            DB::commit();
    
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error','Gagal mengembalikan obat');
        }
    
        return redirect()->route('management.retur.index')->with('success','Berhasil mengembalikan obat');
    }
}