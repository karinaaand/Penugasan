<?php

namespace App\Http\Controllers;

use App\Models\Transaction\Bill;
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
        return view("pages.management.trash");        
    }
    public function trash(){
        return view("pages.management.trashDetail");
    }
    public function returPrint(){

    }
    public function returPay(){

    }
}
