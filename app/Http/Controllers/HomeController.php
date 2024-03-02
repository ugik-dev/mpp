<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Content;
use App\Models\Hero;
use App\Models\HeroIcon;
use App\Models\Menu;
use App\Models\Survey;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $heroes = Hero::get();
        $hero_icon = HeroIcon::get();
        $sidbar_lates_content = Content::with('comment')->select('contents.*')->complete()->latest('tanggal')->limit(6)->get();
        $events = Content::with('comment')->select('contents.*')->where('ref_content_id', 5)->complete()->latest('tanggal')->limit(4)->get();
        $surveys = Survey::latest('created_at')->limit(10)->get();
        // dd($event);
        return view('home', compact('heroes', 'hero_icon', 'sidbar_lates_content', 'events', 'surveys'));
    }
    public function portal()
    {
        return view(
            'portal',

        );
    }
    public function search(Request $request)
    {
        $contents = Content::with('comment')->select('contents.*')->complete()->latest('tanggal')->filter($request->s)->paginate(
            9
        )->withQueryString();
        // dd($contents);
        return view(
            'search',
            compact('contents')
        );
    }
    public function layanan($slug2 = null, $slug3 = null)
    {
        return $this->menus('layanan', $slug2, $slug3);
    }

    public function menus($slug1 = null, $slug2 = null, $slug3 = null)
    {
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
        return view('menu', compact('data', 'parenting', 'sidebar'));
    }

    public function blog($jenis, $slug)
    {
        $data = Content::with('comment')->select('contents.*')->complete()
            ->where('slug', $slug)
            ->where('prefix', $jenis)
            ->firstOrFail();
        $data->increment('view');
        $sidebar = Menu::with('parent')->where('parent_id', 1)->get();
        $sidbar_lates_content = Content::select('contents.*')->complete()->where('slug', '<>', $slug)->latest('tanggal')->take(5)->get();
        // dd($sidbar_lates_content);

        return view('blog', compact('data', 'sidbar_lates_content', 'sidebar'));
    }

    public function blog_comment(Request $request, $id_content)
    {
        try {

            $att = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
                'ip_address' => $request->ip(),
                'content_id' => $id_content,
            ];
            $data = Comment::create($att);
            return $this->responseSuccess($data, 'Survey submitted successfully');
        } catch (QueryException $ex) {
            if ($errorMessage = getDbException($ex->errorInfo)) {
                return $this->ResponseError($errorMessage);
            } else {
                return $this->ResponseError($ex->getMessage());
            }
        } catch (Exception $ex) {
            return $this->ResponseError($ex->getMessage());
        }
    }
}
