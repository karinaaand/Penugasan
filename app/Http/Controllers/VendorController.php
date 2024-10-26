<?php

namespace App\Http\Controllers;

use App\Models\Master\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
        return view('pages.master.vendor');
    }
    public function create()
    {
        return view('pages.master.createVendor');
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            "name"=> "required|min:3|max:25|string"
        ]);
        if($validate){
            Vendor::create([
                "name"=>$request->name
            ]);
            return back(201)->with('success','Vendor berhasil dibuat');
        }
        return back(400)->with('error','Vendor gagal dibuat');
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
