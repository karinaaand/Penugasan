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
        return view('pages.transaction.checkout');
    }
    public function store(Request $request)
    {
    }
    public function show(string $id)
    {
        return view('pages.transaction.detailTransaction');
    }
}
