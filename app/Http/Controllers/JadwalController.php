<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Artikel;
use App\Models\Category;
use App\Models\Page;
class jadwalController extends Controller
{
    public function index()
    {
        $sliders    = Setting::all();
        $categories = Category::orderBy('created_at','DESC')->get();
        $pages      = Page::all();
        $artikels   = Artikel::orderBy('created_at','DESC')->get();
        $features   = Artikel::inRandomOrder()->orderBy('id','DESC')->get();
        return view('jadwal/imsakiyah', compact('sliders','artikels','features','categories','pages'));
    }
    
    public function sholat()
    {
        $sliders    = Setting::all();
        $categories = Category::orderBy('created_at','DESC')->get();
        $pages      = Page::all();
        $artikels   = Artikel::orderBy('created_at','DESC')->get();
        $features   = Artikel::inRandomOrder()->orderBy('id','DESC')->get();
    
        return view('sholat', compact('sliders','artikels','features','categories','pages'));
    }

    public function imsakiyah()
    {
        $sliders    = Setting::all();
        $categories = Category::orderBy('created_at','DESC')->get();
        $pages      = Page::all();
        $artikels   = Artikel::orderBy('created_at','DESC')->get();
        $features   = Artikel::inRandomOrder()->orderBy('id','DESC')->get();
        return view('imsakiyah', compact('sliders','artikels','features','categories','pages'));
    }

}
