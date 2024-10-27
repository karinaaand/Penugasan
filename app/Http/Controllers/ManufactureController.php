<?php

namespace App\Http\Controllers;

use App\Models\Master\Manufacture;
use Illuminate\Http\Request;

class ManufactureController extends Controller
{
    public function index()
    {
        $judul = "Produsen Obat";
        $manufactures = Manufacture::all();
        return view('pages.master.manufacture',compact('judul','manufactures'));
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            "name"=> "required|min:3|max:25|string"
        ]);
        if($validate){
            Manufacture::create([
                "name"=>$request->name
            ]);
            return back()->with('success','Produsen berhasil dibuat');
        }
        return back()->with('error','Produsen gagal dibuat');
    }
    public function update(Request $request, string $id)
    {
    }
    public function destroy(Manufacture $manufacture)
    {
        try {
            $manufacture->delete();
            return back()->with('success','Produsen berhasil dihapus');
        } catch (\Throwable $e) {
            return back()->with('error','Produsen gagal dihapus');
        }
    }

}
