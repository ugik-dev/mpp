<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\HeroIcon;
use App\Models\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $heroes = Hero::get();
        $hero_icon = HeroIcon::get();
        return view('home', compact('heroes', 'hero_icon'));
    }

    public function layanan($slug2 = null, $slug3 = null)
    {
        return $this->menus('layanan', $slug2, $slug3);
    }

    public function menus($slug1 = null, $slug2 = null, $slug3 = null)
    {
        // dd($slug1, $slug2, $slug3);
        $uses = $slug3 ?? $slug2 ?? $slug1;
        $data = Menu::with('parent')->where('jenis', 'page')->where('slug', $uses)->first();
        $parenting = (array_reverse(susunParent($data)));
        $sidebar = Menu::with('parent')->where('parent_id', $data->parent_id)->where('id', '<>', $data->id)->get();
        // dd($sidebar);
        // $heroes = Hero::get();
        // $hero_icon = HeroIcon::get();
        return view('menu_layout', compact('data', 'parenting', 'sidebar'));
    }
}
