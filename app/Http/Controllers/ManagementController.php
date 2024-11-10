<?php

namespace App\Http\Controllers;

use App\Models\Transaction\Bill;
use App\Models\Transaction\Trash;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    public function bills(){
        $bills = Bill::all();
        $judul = "Tagihan Obat";
        return view("pages.management.bill",compact('judul','bills'));
    }
    public function bill(){
        return view("pages.management.billDetail");        
    }
    public function billPrint(){
        
    }
    public function billPay(){
        
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
