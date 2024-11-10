<?php

namespace App\Http\Controllers;

use App\Models\Transaction\Bill;
use App\Models\Transaction\Transaction;
use App\Models\Transaction\Trash;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    public function bills(){
        $bills = Bill::all();
        $judul = "Tagihan Obat";
        return view("pages.management.bill",compact('judul','bills'));
    }
    public function bill(Bill $bill){
        $judul = "Tagihan Vendor ".$bill->transaction()->vendor()->name;
        return view("pages.management.billDetail",compact('bill','judul'));      
    }
    public function billPrint(){
        
    }
    public function billPay(Bill $bill){
        $bill->status = "Done";
        $bill->save();
        return redirect()->route('management.bill.index');
    }
    public function returs(){
        return view("pages.management.retur");        
    }
    public function retur(){
        return view("pages.management.returDetail");
    }
    public function trashes(){
        $trashes = Trash::all();
        $judul = "Manajemen Obat Buang";
        return view("pages.management.trash",compact('trashes','judul'));        
    }
    public function trash(Trash $trash){
        $judul = "Laporan Pembuangan Obat ".$trash->drug()->name;
        return view("pages.management.trashDetail",compact('trash','judul'));
    }
    public function returPrint(){

    }
    public function returPay(){

    }
}
