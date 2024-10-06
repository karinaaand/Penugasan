<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementController extends Controller
{
    public function bills(){
        return view("pages.management.bill");
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
    public function returPrint(){

    }
    public function returPay(){

    }
}
