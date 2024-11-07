<?php

namespace App\Http\Controllers;

use App\Models\Inventory\Warehouse;
use App\Models\Master\Drug;
use Illuminate\Http\Request;

class InventoryStockController extends Controller
{
    public function index()
    {
        $judul = "Stok Obat Gudang";
        $stocks = Warehouse::paginate(5);
        return view("pages.inventory.stock",compact('judul','stocks'));
    }
    public function show(Drug $stock)
    {
        $judul = "Stok ".$stock->name;
        $drug = $stock;
        $stock = Warehouse::where('drug_id',$drug->id)->first();
        return view("pages.inventory.stockDetail",compact('drug','stock','judul'));
    }
    public function destroy(string $id)
    {
        //
    }
    public function retur(Request $request,string $batch)
    {
        if($request->isMethod('get')){
            return view("pages.inventory.retur");
        }
    }
    public function trash(Request $request,string $batch)
    {
        if($request->isMethod('get')){
            return view("pages.inventory.trash");
        }
    }
}
