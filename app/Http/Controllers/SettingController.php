<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Setting;
Use Alert;
class SettingController extends Controller
{
    public function index()
    {
        $slider = Setting::all();
        return view('settings.index', compact('slider'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|min:5',
            'images' => 'required'
        ]);

        $settings            = new Setting;
        $settings->judul     = $request->judul;
        $settings->link      = $request->link;
        if($request->file('images')) {
             $file          = $request->file('images');
             $filename      = time().str_replace(" ", "", $file->getClientOriginalName());
             $file->move('public/images', $filename);
             $settings->images   = 'images/'.$filename;
         }
        $settings->save();
        Alert::success('Berhasil', 'Berhasil Menambahkan Data');
        return redirect('settings');
    }
    public function edit($id)
    {
        $settings = Setting::find($id);
        return view('settings.edit', compact('settings'));
    }

    public function update(Request $request, $id)
    {
        $settings            = Setting::find($id);
        $settings->judul     = $request->judul;
        $settings->link      = $request->link;
        if($request->file('images')) {
             $file          = $request->file('images');
             $filename      = time().str_replace(" ", "", $file->getClientOriginalName());
             $file->move('public/images', $filename);
             $settings->images   = 'images/'.$filename;
         }
        $settings->save();
        Alert::success('Berhasil', 'Berhasil Mengubah Data');
        return redirect('settings');
    }

    public function destroy($id)
    {
        $settings = Setting::find($id);
        $settings->delete();
        Alert::success('Berhasil', 'Berhasil Menghapus Data');
        return redirect('settings');
    }
}
