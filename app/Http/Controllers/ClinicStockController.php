<?php

namespace App\Http\Controllers;

use App\Models\Inventory\Clinic;
use Illuminate\Http\Request;

class ClinicStockController extends Controller
{
    public function index()
    {
        $judul = "Stok Obat Klinik";
        $stocks = Clinic::paginate(5);
        return view("pages.clinic.stock",compact('judul','stocks'));
    }
    public function show(string $id)
    {
        return view("pages.clinic.stockDetail");
    }
}
