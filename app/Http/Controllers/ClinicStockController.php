<?php

namespace App\Http\Controllers;

use App\Models\Inventory\Clinic;
use App\Models\Master\Drug;
use Illuminate\Http\Request;

class ClinicStockController extends Controller
{
    public function index()
    {
        $judul = "Stok Obat Klinik";
        $stocks = Clinic::paginate(5);
        return view("pages.clinic.stock",compact('judul','stocks'));
    }
    public function show(Drug $stock)
    {
        $judul = "Stok ".$stock->name;
        $drug = $stock;
        $stock = Clinic::where('drug_id',$drug->id)->first();
        return view("pages.clinic.stockDetail",compact('drug','stock','judul'));
    }
}
