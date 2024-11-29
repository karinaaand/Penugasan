<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $judul = "Manajemen Akun";
        $users = User::all();
        return view('pages.super.user',compact('judul','users'));
    }
    public function store(Request $request)
    {
        $avatar = Storage::disk('public')->put('avatar',$request->file('avatar'));
        try {
            $user = new User();
            $user->name = $request->name;
            $user->role = $request->role;
            $user->password = Hash::make($request->password);
            $user->email = $request->email;
            $user->avatar = $avatar;
            $user->save();
            return back()->with('success','Berhasil membuat user');
        } catch (\Throwable $th) {
            return back()->with('error','Gagal membuat user');
        }
    }
    public function update(Request $request, string $id)
    {
        //
    }
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return back()->with('success','User behasil dihapus');
        } catch (\Throwable $th) {
            return back()->with('success','User behasil dihapus');
        }
    }
    public function login(Request $request){
        if($request->isMethod("get")){
            return view('login',["title"=>"Login"]);
        }elseif($request->isMethod("post")){
            $credentials = $request->validate([
                "email"=>['required','email','lowercase'],
                "password"=>['required']
            ]);
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/');
            }else{
                return back()->with('error','GAGAL');
            }
        }
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/");
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
        }elseif($request->isMethod("put")){
            $profile = Profile::first();
            try {
                if($request->hasFile('logo')){
                    Storage::disk('public')->delete($profile->logo);
                    $new = Storage::disk('public')->put('profile',$request->file('logo'));
                    $profile->update($request->all());
                    $profile->logo = $new;
                    $profile->save();
                }else{
                    $profile->update($request->all());
                }
                return back()->with('success','Profil klinik berhasil diubah');
            } catch (\Throwable $th) {
                return back()->with('error','Profil klinik gagal diubah');
            }
        }        
    }
}
