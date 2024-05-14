<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PembeliController extends Controller
{
    
    public function index()
    {
        return view('pembeli.tabel',[
        "title"=>"Pembeli",
        "data"=> Pembeli::all()
        ]);
    }

    public function create():View
    {
        return view('pembeli.tambah')->with
        (["title"=>"Tambah Data Pembeli"]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "nama"=>"required",
            "alamat"=>"required",
            "hp"=>"nullable",
        ]);
        Pembeli::create($request->all());
        return redirect()->route('pembeli.index')->with
        ('success','Data Pembeli Berhasil Ditambahkan');
    }

    public function edit(Pembeli $pembeli):View
    {
        return view('pembeli.edit',compact('pembeli'))->with
        (["title"=>"Ubah Data Pembeli"]);
    }

    public function update(Request $request, Pembeli $pembeli):RedirectResponse
    {
        $request->validate([
            "nama"=>"required",
            "hp"=>"required",
            "alamat"=>"nullable",
        ]);

        $pembeli->update($request->all());

        return redirect()->route('pembeli.index')
        ->with('Updated','Data Pembeli Berhasil Diubah');
    }

    public function show(Pembeli $pembeli):View
    {
        return view('pembeli.tampil',compact('pembeli'))->with
        (["title"=>"Data Pembeli"]);
    }
}
