<?php

namespace App\Http\Controllers;

use App\Models\Transaction\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $histories = Transaction::where('variant','Checkout')->paginate(30);
        return view('pages.dashboard',compact('histories'));
    }
}
