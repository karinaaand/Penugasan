<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.super.user');
    }
    public function create()
    {
        return view('pages.super.tambahUser');
    }
    public function store(Request $request)
    {
        //
    }
    public function edit(string $id)
    {
        return view('pages.super.editUser');
    }
    public function update(Request $request, string $id)
    {
        //
    }
    public function destroy(string $id)
    {
        //
    }
    public function login(Request $request){
        if($request->isMethod("get")){
            return view('login',["title"=>"Login"]);
        }
    }
    public function logout(){
        return view('login',["title"=>"Login"]);
    }
    public function forgot(Request $request){
        if($request->isMethod("get")){
            return view('forgot',["title"=>"Forgot Password"]);
        }        
    }
    public function settings(Request $request){
        if($request->isMethod("get")){
            return view('pages.settings',["title"=>"Settings"]);
        }        
    }
}
