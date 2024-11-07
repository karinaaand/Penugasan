<?php

namespace App\Http\Controllers;

use App\Models\Master\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $judul = "Kategori Obat";
        $categories = Category::paginate(5);
        return view('pages.master.category',compact('judul','categories'));
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            "name"=> "required|alpha:ascii|min:3|max:25|string",
            "code"=> "required|alpha|min:2|max:2"
        ]);
        try {
            Category::create($validate);
            return back()->with('success','Kategori berhasil dibuat');
        } catch (\Throwable $e) {
            return back()->with('error','Kategori gagal dibuat');
        }
    }
    public function edit(Category $category)
    {
        $judul = "Edit Kategori Obat";
        $categories = Category::all();
        $edit = true;
        return view('pages.master.category',compact('judul','categories','edit','category'));
    }
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return redirect()->route('master.category.index')->with('success','Kategori berhasil diubah');
    }
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return back()->with('success', 'Kategori berhasil dihapus');
        } catch (\Throwable $e) {
            return back()->with('error', 'Kategori gagal dihapus');
        }
    }
}
