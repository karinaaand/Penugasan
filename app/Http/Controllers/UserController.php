<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $judul = "Manajemen Akun";
        return view('pages.super.user',compact('judul'));
    }
    public function store(Request $request)
    {
        //
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
        return redirect()->route('user.login');
    }
    public function forgot(Request $request){
        if($request->isMethod("get")){
            return view('forgot',["title"=>"Forgot Password"]);
        }        
    }
    public function settings(Request $request){
        if($request->isMethod("get")){
            $judul = "Atur Profil Klinik";
            return view('pages.settings',compact('judul'));
        }        
    }
}
