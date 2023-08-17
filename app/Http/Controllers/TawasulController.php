<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tawasul;
use App\Models\Silsilah;
Use Alert;
class TawasulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tawasul = Tawasul::all();
        $silsilah = Silsilah::all();
        return view('tawasul.index', compact('tawasul','silsilah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $silsilah = Silsilah::all();
        return view('tawasul.create', compact('silsilah'));
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
            'nama' => 'required|unique:tawasuls'
        ]);

        $tawasul                = new Tawasul;
        $tawasul->nama          = $request->nama;
        $tawasul->silsilah_id   = $request->silsilah_id;
        $tawasul->bin           = $request->bin;
        $tawasul->nama_bin      = $request->nama_bin;
        $tawasul->save();
        Alert::success('Berhasil', 'Berhasil Menambahkan Data');
        return redirect('tawasul');
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
        $tawasul  = Tawasul::find($id);
        $silsilah = Silsilah::all();
        return view('tawasul.edit', compact('tawasul','silsilah'));
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
            'nama' => 'required'
        ]);

        $tawasul                = Tawasul::find($id);
        $tawasul->nama          = $request->nama;
        $tawasul->silsilah_id   = $request->silsilah_id;
        $tawasul->bin           = $request->bin;
        $tawasul->nama_bin      = $request->nama_bin;
        $tawasul->save();
        Alert::success('Berhasil', 'Berhasil Mengubah Data');
        return redirect('tawasul');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tawasul = Tawasul::find($id);
        $tawasul->delete();
        Alert::success('Berhasil', 'Berhasil Menghapus Data');
        return redirect('tawasul');
    }
}
