<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Artikel;
use App\Models\Category;
use App\Models\Page;
class MainController extends Controller
{
    public function index()
    {
        $sliders    = Setting::all();
        $categories = Category::orderBy('created_at','DESC')->get();
        $pages      = Page::all();
        $artikels   = Artikel::orderBy('created_at','DESC')->get();
        $features   = Artikel::inRandomOrder()->orderBy('id','DESC')->get();
        return view('main', compact('sliders','artikels','features','categories','pages'));
    }

    public function detail($slug)
    {
        $categories = Category::with('artikel')->get();
        $pages      = Page::all();
        $artikels   = Artikel::orderBy('created_at','DESC')->get();
        $posts      = Artikel::where('slug','=', $slug)->first();
        $relateds   = Artikel::where('category_id', '=', $posts->category->id)
            ->where('id', '!=', $posts->id)
            ->get();
        return view('detail', compact('posts','relateds','categories','pages','artikels'));
    }

    public function pages($slug)
    {
        $pages = Page::all();
        $page  = Page::where('slug','=', $slug)->first();

        return view('pages', compact('page','pages'));
    }
    
    public function profil()
    {
        $pages = Page::all();
        return view('profile', compact('pages'));
    }
    
    public function yasin()
    {
        $pages = Page::all();
        return view('yasin', compact('pages'));
    }

    public function surah()
    {
        $pages      = Page::all();
        $response   = Http::get('https://raw.githubusercontent.com/penggguna/QuranJSON/master/quran.json');
        $data = $response->json();
        return view('surah', compact('data','pages'));
    }

    public function ratib()
    {
        $pages = Page::all();
        return view('ratib', compact('pages'));
    }

}
