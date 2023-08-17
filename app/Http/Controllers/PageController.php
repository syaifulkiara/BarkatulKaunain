<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Page;
use Auth;
use Str;
Use Alert;
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::orderBy('created_at','DESC')->get();
        return view('pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|unique:pages'
        ]);

        $pages              = new Page;
        $pages->judul       = $request->judul;
        $pages->slug        = Str::slug($pages->judul);
        $pages->konten      = $request->konten;
        if($request->file('gambar')) {
             $file          = $request->file('gambar');
             $filename      = $file->getClientOriginalName();
             $file->move('public/images/pages', $filename);
             $pages->gambar   = 'images/pages/'.$filename;
         }
        $pages->save();
        Alert::success('Berhasil', 'Berhasil Menambahkan Data');
        return redirect('pages');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pages = Page::find($id);
        return view('pages.edit', compact('pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required'
        ]);

        $pages              = Page::find($id);
        $pages->judul       = $request->judul;
        $pages->konten      = $request->konten;
        if($request->file('gambar')) {
             $file          = $request->file('gambar');
             $filename      = $file->getClientOriginalName();
             $file->move('public/images/pages', $filename);
             $pages->gambar   = 'images/pages/'.$filename;
         }
        $pages->save();
        Alert::success('Berhasil', 'Berhasil Mengubah Data');
        return redirect('pages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pages = Page::find($id);
        $pages->delete();
        Alert::success('Berhasil', 'Berhasil Menghapus Data');
        return redirect('pages');
    }
}
