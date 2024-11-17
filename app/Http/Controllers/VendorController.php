<?php

namespace App\Http\Controllers;

use App\Models\Master\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
        $judul = "Vendor Obat";
        $vendors = Vendor::paginate(5);
        return view('pages.master.vendor',compact('judul','vendors'));
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            "name"=> "required|min:3|max:25|string",
            "phone"=>"required|max:14",
            "address"=>"required|string|max:255",
        ]);
        try {
            Vendor::create($validate);
            return redirect()->route('master.vendor.index')->with('success','Vendor berhasil dibuat');
        } catch (\Throwable $th) {
            return redirect()->route('master.vendor.index')->with('error','Vendor gagal dibuat');
        }
    }
    public function update(Request $request, Vendor $vendor)
    {
        $vendor->update($request->all());
        return redirect()->route('master.vendor.index')->with('success','Vendor berhasil diubah');
    }
    public function destroy(Vendor $vendor)
    {
        try {
            $vendor->delete();
            return back()->with('success', 'Vendor berhasil dihapus');
        } catch (\Throwable $e) {
            return back()->with('error', 'Vendor gagal dihapus');
        }
    }
}
