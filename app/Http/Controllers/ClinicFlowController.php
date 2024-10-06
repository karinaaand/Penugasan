<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClinicFlowController extends Controller
{
    public function index()
    {
        return view('pages.clinic.inflow');
    }
    public function create()
    {
        return view('pages.clinic.addStuff');
    }
    public function store(Request $request)
    {
        //
    }
    public function show(string $id)
    {
        return view('pages.clinic.inflowDetail');
    }
    
}
