<?php

namespace App\Http\Controllers;

use App\Models\Inventory\Warehouse;
use App\Models\Transaction\Bill;
use App\Models\Transaction\Retur;
use App\Models\Transaction\Transaction;
use App\Models\Transaction\Trash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagementController extends Controller
{
    public function bills()
    {
        $bills = Bill::orderBy('status')->get();
        $judul = "Tagihan Obat";
        return view("pages.management.bill", compact('judul', 'bills'));
    }
    public function bill(Bill $bill)
    {
        $judul = "Tagihan Vendor " . $bill->transaction()->vendor()->name;
        return view("pages.management.billDetail", compact('bill', 'judul'));
    }
    public function billPrint() {}
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
    public function returs()
    {
        $returs = Retur::all();
        $judul = "Manajemen Obat Retur";
        return view("pages.management.retur", compact('returs', 'judul'));
    }
    public function retur(Retur $retur)
    {
        $judul = "Laporan Retur Obat " . $retur->drug()->name;
        return view("pages.management.returDetail", compact('retur', 'judul'));
    }
    public function trashes()
    {
        $trashes = Trash::all();
        $judul = "Manajemen Obat Buang";
        return view("pages.management.trash", compact('trashes', 'judul'));
    }
    public function trash(Trash $trash)
    {
        $judul = "Laporan Pembuangan Obat " . $trash->drug()->name;
        return view("pages.management.trashDetail", compact('trash', 'judul'));
    }
    public function returPrint() {}
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