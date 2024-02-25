<?php

namespace App\Http\Controllers;

use App\Helpers\DataStructure;
use App\Models\Content;
use App\Models\Hero;
use App\Models\Menu;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class HeroController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data =  Hero::latest();
            if ($request->has('search') && !empty($request->input('search')['value'])) {
                $searchValue = $request->input('search')['value'];
                $data = $data->where('heroes.text_1', 'like', '%' . $searchValue . '%')
                    ->orWhere('button_text', 'like', '%' . $searchValue . '%')
                    ->orWhere('text_2', 'like', '%' . $searchValue . '%');
            }
            $data = $data->leftJoin('contents', function ($join) {
                $join->on('heroes.key', '=', 'contents.id')
                    ->where('heroes.button_type', '=', 'content');
            })
                ->leftJoin('menus', function ($join) {
                    $join->on('heroes.key', '=', 'menus.id')
                        ->where('heroes.button_type', '=', 'page');
                })
                ->select('heroes.*', DB::raw('IF(heroes.button_type = "content", contents.judul, menus.name) AS key_label'))
                ->get();
            // $data = $data->get();

            return DataTables::of($data)->addColumn('id', function ($data) {
                return $data->id;
            })->addColumn('number', function ($data) {
                return $data->number;
            })->addColumn('text_1', function ($data) {
                return $data->text_1;
            })->addColumn('text_2', function ($data) {
                return $data->text_2;
            })->addColumn('button', function ($data) {
                return $data->button;
            })->addColumn('img', function ($data) {
                return '<img style="max-width:100px; max-height:80px" src="' . url('/storage/upload/hero') . '/' . $data->image . '" alt="' . $data->image . '" class="img-thumbnail">';
            })->addColumn('aksi', function ($data) {
                return '<div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <button type="button" class="edit-btn btn btn-warning" data-id="' . $data->id . '"><i class="fas fa-pencil-alt" ></i></button>
                    <button type="button" class="delete-btn btn btn-danger" data-id="' . $data->id . '"><i class="fas fa-trash" ></i></button>
                </div>';
            })->rawColumns(['aksi', 'img'])->make(true);
        }
        $dataContent =  [
            'refRole' => Role::get(),
        ];
        return view('panel.hero.index', compact('request', 'dataContent'));
    }

    public function create(Request $request)
    {
        try {
            $att = [
                'text_1' => $request->text_1,
                'text_2' => $request->text_2,
                'button' => $request->button,
                'button_type' => $request->button_type,
                'button_text' => $request->button_text,
                'number' => $request->number,
            ];
            $request->link ? $att['link'] = $request->link : '';
            $request->key ? $att['key'] = $request->key : '';
            $data = Hero::create($att);
            $request->validate([
                'image_hero_upload' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Add appropriate validation rules
            ]);

            if ($request->hasFile('image_hero_upload')) {
                $photo = $request->file('image_hero_upload');
                $originalFilename = time() . $photo->getClientOriginalName(); // Ambil nama asli file
                $path = $photo->storeAs('upload/hero', $originalFilename, 'public');
                $data->image = $originalFilename;
                $data->save();
            }
            return  $this->responseSuccess($data, 'Success Created');
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

    public function update(Request $request)
    {
        try {
            $data = Hero::findOrFail($request->id);
            $data->update([
                'text_1' => $request->text_1,
                'text_2' => $request->text_2,
                'button_type' => $request->button_type,
                'button' => $request->button,
                'button_text' => $request->button_text,
                'number' => $request->number,
            ]);

            $request->link ? $data->link = $request->link : null;
            $request->key ? $data->key = $request->key : null;

            if ($request->hasFile('image_hero_upload')) {
                $photo = $request->file('image_hero_upload');
                $originalFilename = time() . $photo->getClientOriginalName(); // Ambil nama asli file
                $path = $photo->storeAs('upload/hero', $originalFilename, 'public');
                $data->image = $originalFilename;
                $data->save();
            }
            return  $this->responseSuccess($data, 'Success Updated');
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


    public function delete(Request $request)
    {
        try {
            $data = Hero::findOrFail($request->id);
            $data->delete();
            return  $this->responseSuccess($data);
        } catch (Exception $ex) {
            return  $this->ResponseError($ex->getMessage());
        }
    }


    public function search_key(Request $request)
    {
        try {
            $searchValue = $request->q;
            if ($request->source == 'content')
                $data = Content::select('id', 'judul as text')->where('judul', 'like', '%' . $searchValue . '%')->paginate(20, ['*'], 'page', $request->page);
            else if ($request->source == 'page') {
                $data = Menu::select('id', 'name as text')->where('name', 'like', '%' . $searchValue . '%')->paginate(20, ['*'], 'page', $request->page);
            } else {
                return;
            }
            return response()->json($data);
        } catch (Exception $ex) {
            return  $this->ResponseError($ex->getMessage());
        }
    }
}
