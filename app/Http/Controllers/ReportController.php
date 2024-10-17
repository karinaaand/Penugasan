<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function drugs(){
        return view("pages.report.drug");    }
    public function drug(){
        return view("pages.report.drugDetail");
    }
    public function drugPrint(){

    }
    public function transactions(){
        return view("pages.report.transaction");
    }
    public function transaction(){
        return view("pages.report.transactionDetail");
    }
    public function transactionPrint(){

    }
}
