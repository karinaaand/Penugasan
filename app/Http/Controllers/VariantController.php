<?php

namespace App\Http\Controllers;

use App\Models\Master\Variant;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    public function index()
    {
        $judul = "Jenis Obat";
        $variants = Variant::all();
        return view('pages.master.variant',compact('judul','variants'));
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            "name"=> "required|min:3|max:25|string"
        ]);
        try {
            Variant::create([
                "name"=>$request->name
            ]);
            return back()->with('success','Jenis obat berhasil dibuat');
        } catch (\Throwable $e) {
            return back()->with('error','Jenis obat gagal dibuat');
        }
    }
    public function update(Request $request, Variant $variant)
    {
        $variant->update($request->all());
        return redirect()->route('master.variant.index');
    }
    public function destroy(Variant $variant)
    {
        try {
            $variant->delete();
            return back()->with('success', 'Kategori berhasil dihapus');
        } catch (\Throwable $e) {
            return back()->with('error', 'Kategori gagal dihapus');
        }
    }
}
