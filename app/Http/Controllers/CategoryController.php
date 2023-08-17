<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Str;
Use Alert;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                'nama'          => 'required|unique:categories',
                'keterangan'    => 'required'
        ]);

        $categories              = new Category;
        $categories->nama        = $request->nama;
        $categories->slug        = Str::slug($categories->nama);
        $categories->keterangan  = $request->keterangan;

        $categories->save();
        Alert::success('Berhasil', 'Berhasil Menambahkan Data');
        return redirect('categories');
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
        $categories = Category::find($id);
        return view('categories.edit', compact('categories'));
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
                'nama'          => 'required',
                'keterangan'    => 'required'
        ]);

        $categories              = Category::find($id);
        $categories->nama        = $request->nama;
        $categories->keterangan  = $request->keterangan;
        $categories->save();
        Alert::success('Berhasil', 'Berhasil Mengubah Data');
        return redirect('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Category::find($id);
        $categories->delete();
        Alert::success('Berhasil', 'Berhasil Menghapus Data');
        return redirect('categories');
    }
}
