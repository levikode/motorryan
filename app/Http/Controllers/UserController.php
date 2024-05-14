<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
   public function index()
   {
    return view('user.index',[
        "title"=>"Data Pengguna",
        "data"=>User::all()
    ]);
   }

    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            "nama"=>"required",
            "email"=>"required",
            "password"=>"required"
        ]);
        $password=Hash::make($request->password);
        $request->merge([
            "password"=>$password
        ]);

        User::create($request->all());
        
        return redirect()->route('pengguna.index')->with('success','Data Berhasil Ditambahkan');
    }
}

