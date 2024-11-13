<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return view('pages.transaction.transactions');
    }
    public function create()
    {
        $judul = "Checkout Barang";
        return view('pages.transaction.checkout',compact('judul'));
    }
    public function store(Request $request)
    {
    }
    public function show(string $id)
    {
        return view('pages.transaction.detailTransaction');
    }
}
