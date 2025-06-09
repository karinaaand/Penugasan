<?php

namespace App\Http\Controllers;

use App\Models\Master\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // controller API endpoint untuk melakukan live search
    public function searchCategory(Request $request)
    {
        $query = $request->input('query');
        $categories = Category::where('name', 'like', "%{$query}%")->orWhere('code', 'like', "%{$query}%")->get();

        return response()->json($categories);
    }
    public function index()
    {
        $judul = "Kategori Obat";
        $categories = Category::paginate(5);
        return view('pages.master.category',compact('judul','categories'));
    }
    public function store(Request $request)
    {
        //try catch-block untuk menghindari error dan otomatis akan mengeluarkan toast
        try {
            $validate = $request->validate([
                "name"=> "required|string|min:3|max:25",
                "code"=> "required|alpha|min:2|max:2"
            ]);
            Category::create($validate);
            return back()->with('success','Kategori berhasil dibuat');
        } catch (\Throwable $e) {
            return back()->with('error','Kategori gagal dibuat');
        }
    }
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return redirect()->back()->with('success','Kategori berhasil diubah');
    }
    public function destroy(Category $category)
    {
        //try catch-block untuk menghindari error dan otomatis akan mengeluarkan toast
        try {
            $category->delete();
            return back()->with('success', 'Kategori berhasil dihapus');
        } catch (\Throwable $e) {
            return back()->with('error', 'Kategori gagal dihapus');
        }
    }
}
