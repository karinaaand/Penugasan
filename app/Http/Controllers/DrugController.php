<?php

namespace App\Http\Controllers;

use App\Models\Master\Category;
use App\Models\Master\Drug;
use App\Models\Master\Manufacture;
use App\Models\Master\Variant;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Nette\Utils\Strings;

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
        try {
            Drug::create($request->all());
            return redirect()->route('master.drug.index')->with('success','Obat berhasil dibuat');
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
        $drug->update($request->all());
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
