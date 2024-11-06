<?php

namespace App\Http\Controllers;

use App\Models\Master\Category;
use App\Models\Master\Drug;
use App\Models\Master\Manufacture;
use App\Models\Master\Repack;
use App\Models\Master\Variant;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DrugController extends Controller
{
    public function index(): View
    {
        $drugs = Drug::all();
        return view('pages.master.drug', compact('drugs'));
    }
    public function create()
    {
        $categories = Category::all();
        $variants = Variant::all();
        $manufactures = Manufacture::all();
        $judul = "Input Obat";
        return view('pages.master.createDrug',compact('categories','variants','manufactures','judul'));
    }
    public function store(Request $request)
    {
        $category = Category::find($request->category_id)->first();
        $request["code"] = $this->generateCode($category);
        $drug = Drug::create($request->all());
        $drug->default_repacks();
        return redirect()->route('master.drug.edit',$drug->id);
        try {
        } catch (\Throwable $th) {
            return redirect()->route('master.drug.index')->with('error','Obat gagal dibuat');
        }
    }
    public function edit(Drug $drug)
    {
        $categories = Category::all();
        $variants = Variant::all();
        $manufactures = Manufacture::all();
        $judul = "Edit Obat";
        $repacks = $drug->repacks();
        return view('pages.master.editDrug',compact('categories','variants','manufactures','drug','judul','repacks'));
    }
    public function update(Request $request, Drug $drug)
    {
        if($drug->last_price!=$request->last_price){
            $drug->update($request->all());
            $repacks = $drug->repacks();
            foreach ($repacks as $item) {
                $item->update_price($request->last_price);
            }
        }else{
            $drug->update($request->all());
        }
        return redirect()->back();
    }
    public function repack(Request $request,Drug $drug,Repack $repack)
    {
        if($request->isMethod('DELETE')){
            if($repack->quantity!=$drug->piece_quantity*$drug->piece_netto && $repack->quantity!=$drug->piece_netto){
                $repack->delete();
            }
        }else{
            $quantity = $request->quantity;
            if($request->piece_unit=="pcs"){
                $quantity = $request->quantity*$drug->piece_netto;
            }
            // dd($quantity);
            Repack::create([
                "drug_id"=>$drug->id,
                "name"=>$request->name,
                "quantity"=>$request->quantity,
                "margin"=>$request->margin,
                "price"=>$drug->calculate_price($quantity,$request->margin)
            ]);
        }
        return back();
    }
    public function destroy(Drug $drug)
    {
        try {
            $drug->delete();
            return redirect()->back()->with('success', 'Obat berhasil dihapus')->setStatusCode(204);
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Obat gagal dihapus')->setStatusCode(400);
        }
    }
    function generateCode(Category $category):string {
        $paddedNumber = str_pad($category->drugs()->count()+1, 4, '0', STR_PAD_LEFT);
        return $category->code . $paddedNumber;
    }
}
