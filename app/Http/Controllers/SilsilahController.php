<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Silsilah;
Use Alert;
class SilsilahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $silsilah = Silsilah::all();
        return view('silsilah.index', compact('silsilah'));
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
                'nama'          => 'required|unique:silsilahs'
        ]);

        $silsila              = new Silsilah;
        $silsila->nama        = $request->nama;
        $silsila->save();
        Alert::success('Berhasil', 'Berhasil Menambahkan Data');
        return redirect('silsilah');
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
        $silsilah  = Silsilah::find($id);
        return view('silsilah.edit', compact('silsilah'));
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
                'nama'          => 'required'
        ]);

        $silsilah        = Silsilah::find($id);
        $silsilah->nama  = $request->nama;
        $silsilah->save();
        Alert::success('Berhasil', 'Berhasil Mengubah Data');
        return redirect('silsilah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $silsilah = Silsilah::find($id);
        $silsilah->delete();
        Alert::success('Berhasil', 'Berhasil Menghapus Data');
        return redirect('silsilah');
    }
}
