<?php

namespace App\Http\Controllers;

use App\Models\Content;
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
        $lates_post = Content::select('contents.*')->with('ref_content')->WithUserInstansi()->latest('tanggal')->limit(6)->get();
        // dd($lates_post);
        return view('home', compact('heroes', 'hero_icon', 'lates_post'));
    }
    public function portal()
    {
        // $heroes = Hero::get();
        // $hero_icon = HeroIcon::get();
        return view(
            'portal',
            //  compact('heroes', 'hero_icon')
        );
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
        // dd($data);
        $parenting = (array_reverse(susunParent($data)));
        $sidebar = Menu::with('parent')->where('parent_id', $data->id)->where('id', '<>', $data->id)->get();
        if ($sidebar->count() == 0) {
            $sidebar = Menu::with('parent')->where('parent_id', $data->parent_id)->where('id', '<>', $data->id)->get();
            if ($sidebar->count() == 0) {
                $sidebar = Menu::with('parent')->where('parent_id', $data->parent->parent_id)->where('id', '<>', $data->id)->get();
            }
        }
        // dd($data->parent->parent_id);
        // dd($sidebar->count());
        // $heroes = Hero::get();
        // $hero_icon = HeroIcon::get();
        return view('menu_layout', compact('data', 'parenting', 'sidebar'));
    }
}
