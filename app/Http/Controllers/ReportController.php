<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function drugs(){
        return view("drug");    }
    public function drug(){
        return view("drugDetail");        
    }
    public function drugPrint(){
        
    }
    public function transactions(){
        return view("transaction");        
    }
    public function transaction(){
        return view("transactionDetail");        
    }
    public function transactionPrint(){
        
    }
}
