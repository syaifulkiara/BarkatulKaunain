<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Artikel;
use App\Models\Page;
use App\Models\Tawasul;
use App\Models\Silsilah;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pages      = Page::all();
        $artikels   = Artikel::all();
        $silsilah   = Silsilah::all();
        $tawasul    = Tawasul::all();
        $users      = User::all();
        return view('home', compact('pages','artikels','silsilah','tawasul','users'));
    }
}
