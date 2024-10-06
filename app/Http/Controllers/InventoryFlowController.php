<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryFlowController extends Controller
{
    public function index()
    {
        return view("pages.inventory.inflow");
    }
    public function create()
    {
        return view("pages.inventory.addStuff");
    }
    public function store(Request $request)
    {
        //
    }
    public function show(string $id)
    {
        return view("pages.inventory.inflowDetail");
    }
    public function print()
    {
        
    }
    
}
