<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
        return view('pages.master.vendor');
    }
    public function store(Request $request)
    {
    }
    public function edit(string $id)
    {
        return view('pages.master.editVendor');
    }
    public function update(Request $request, string $id)
    {
    }
    public function destroy(string $id)
    {
    }
}
