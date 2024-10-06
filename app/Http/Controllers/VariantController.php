<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VariantController extends Controller
{
    public function index()
    {
        return view('pages.master.variant');
    }
    public function store(Request $request)
    {
    }
    public function edit(string $id)
    {
        return view('pages.master.editVariant');
    }
    public function update(Request $request, string $id)
    {
    }
    public function destroy(string $id)
    {
    }
}
