<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\BankData;
use App\Models\Comment;
use App\Models\ConfHome;
use App\Models\Content;
use App\Models\Gallery;
use App\Models\Hero;
use App\Models\HeroIcon;
use App\Models\Menu;
use App\Models\Patner;
use App\Models\Profile;
use App\Models\RefBankData;
use App\Models\Survey;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class HomeController extends Controller
{
    public function index()
    {
        $heroes = Hero::get();
        $hero_icon = HeroIcon::get();
        $conf_home = ConfHome::first();
        $sidbar_lates_content = Content::with('comment')->select('contents.*')->complete()->latest('tanggal')->limit(6)->get();
        $events = Content::with('comment')->select('contents.*')->where('ref_content_id', 5)->complete()->latest('tanggal')->limit(4)->get();
        $galeries = Gallery::with('album')->latest()->limit(10)->get();
        $patners = Patner::where('jenis', 'Patner')->orderBy('number', 'asc')->get();
        $banners = Patner::where('jenis', 'Banner')->orderBy('number', 'asc')->get();
        $surveys = Survey::latest('created_at')->limit(10)->get();
        // dd($event);
        return view('home', compact('heroes', 'galeries', 'hero_icon', 'sidbar_lates_content', 'events', 'banners', 'surveys', 'conf_home', 'patners'));
    }
    public function portal()
    {

        return view(
            'portal',

        );
    }
    public function contact()
    {
        $profile = Profile::first();
        $agencies = Agency::get();
        return view('contact', compact('profile', 'agencies'));
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


    public function bank_data(Request $request)
    {
        if ($request->ajax()) {
            $data =  BankData::select('bank_data.*')->complete()->latest();
            if ($request->has('search') && !empty($request->input('search')['value'])) {
                $searchValue = $request->input('search')['value'];
                $data = $data->filter($searchValue);
            }
            $data = $data->where('public', 'Y');

            $data = $data->get();

            return  DataTables::of($data)->addColumn('id', function ($data) {
                return $data->id;
            })->addColumn('filename_span', function ($data) {
                return '
                      <a href="' . url('/bank-data') . '/' . $data->slug . '" alt="Download" target="_blank" class="btn btn-info btn-download w-100"><i class="fa fa-download"></i></a>
                    ';
            })->rawColumns(['filename_span'])->make(true);
        }
        $refBankData = RefBankData::get();
        $refAgency = Agency::get();
        return view('bankdata', compact('request', 'refBankData', 'refAgency'));
    }

    public function bank_data_download($slug)
    {
        $data =  BankData::select('bank_data.*')->where('slug', $slug)->complete()->firstOrFail();
        $data->increment('view');
        $filePath = 'upload/bankdata/' . $data->filename;
        return response()->file($filePath);
    }
}
