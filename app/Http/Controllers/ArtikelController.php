<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Artikel;
use App\Models\Category;
use Auth;
use Str;
Use Alert;
class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::orderBy('created_at','DESC')->get();
        return view('artikel.index', compact('artikels'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('artikel.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|unique:artikels'
        ]);

        $artikels              = new Artikel;
        $artikels->category_id = $request->category_id;
        $artikels->judul       = $request->judul;
        $artikels->slug        = Str::slug($artikels->judul);
        $artikels->penulis     = Auth::user()->name;
        $artikels->konten      = $request->konten;
        if($request->file('gambar')) {
             $file          = $request->file('gambar');
             $filename      = $file->getClientOriginalName();
             $file->move('public/images/artikel', $filename);
             $artikels->gambar   = 'images/artikel/'.$filename;
         }
        $artikels->save();
        Alert::success('Berhasil', 'Berhasil Menambahkan Data');
        return redirect('artikel');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $artikel = Artikel::find($id);
        $categories = Category::all();
        return view('artikel.edit', compact('artikel','categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|unique:artikels'
        ]);

        $artikels              = Artikel::find($id);
        $artikels->category_id = $request->category_id;
        $artikels->judul       = $request->judul;
        $artikels->konten      = $request->konten;
        if($request->file('gambar')) {
             $file          = $request->file('gambar');
             $filename      = $file->getClientOriginalName();
             $file->move('public/images/artikel', $filename);
             $artikels->gambar   = 'images/artikel/'.$filename;
         }
        $artikels->save();
        Alert::success('Berhasil', 'Berhasil Mengubah Data');
        return redirect('artikel');
    }

    public function destroy($id)
    {
        $artikels = Artikel::find($id);
        $artikels->delete();
        Alert::success('Berhasil', 'Berhasil Menghapus Data');
        return redirect('artikel');
    }
}
