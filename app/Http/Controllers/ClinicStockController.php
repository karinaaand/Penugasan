<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClinicStockController extends Controller
{
    public function index()
    {
        return view("pages.clinic.stock");
    }
    public function show(string $id)
    {
        return view("pages.clinic.stockDetail");
    }
}
