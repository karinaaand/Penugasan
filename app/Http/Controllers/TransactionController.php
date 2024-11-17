<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $judul = "Log History";
        return view('pages.transaction.transactions',compact('judul'));
    }
    public function create()
    {
        $judul = "Checkout Barang";
        return view('pages.transaction.checkout',compact('judul'));
    }
    public function store(Request $request)
    {
        dd(json_decode($request->transaction));
    }
    public function show(string $id)
    {
        $judul = "Invoice";
        return view('pages.transaction.detailTransaction',compact('judul'));
    }
}
