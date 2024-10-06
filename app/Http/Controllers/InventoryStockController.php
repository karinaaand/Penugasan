<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryStockController extends Controller
{
    public function index()
    {
        return view("pages.inventory.stock");
    }
    public function show(string $id)
    {
        //
        return view("pages.inventory.stockDetail");
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
}
