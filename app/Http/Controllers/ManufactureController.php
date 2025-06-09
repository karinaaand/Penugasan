<?php

namespace App\Http\Controllers;

use App\Models\Master\Manufacture;
use Illuminate\Http\Request;

class ManufactureController extends Controller
{
    //function API endpoint untuk melakukan live search pada produsen obat
    public function searchManufacture(Request $request)
    {
        $query = $request->input('query');
        $manufactures = Manufacture::where('name', 'like', "%{$query}%")->get();

        return response()->json($manufactures);
    }
    public function index()
    {
        $judul = "Produsen Obat";
        $manufactures = Manufacture::paginate(5);
        return view('pages.master.manufacture',compact('judul','manufactures'));
    }
    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                "name"=> "required|min:3|max:25|string"
            ]);
            Manufacture::create([
                "name"=>$request->name
            ]);
            return back()->with('success','Produsen berhasil dibuat');
        } catch (\Throwable $e) {
            return back()->with('error','Produsen gagal dibuat');
        }
    }
    public function update(Request $request, Manufacture $manufacture)
    {
        try {
            $manufacture->update($request->all());
            return redirect()->back()->with('success','Produsen berhasil diubah');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error','Produsen gagal diubah');
        }
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
