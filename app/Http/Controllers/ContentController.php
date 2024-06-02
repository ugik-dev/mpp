<?php

namespace App\Http\Controllers;

use App\Helpers\DataStructure;
use App\Models\Agency;
use App\Models\Content;
use App\Models\MediaUpload;
use App\Models\RefContent;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use Yajra\DataTables\Facades\DataTables;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data =  Content::latest()
                ->select('contents.*')->selectRaw('ref_contents.name as jenis_content')->leftJoin('ref_contents', 'contents.ref_content_id', '=', 'ref_contents.id')
                ->WithUserInstansi();
            if ($request->has('search') && !empty($request->input('search')['value'])) {
                $searchValue = $request->input('search')['value'];
                $data = $data->where('users.name', 'like', '%' . $searchValue . '%')
                    ->orWhere('phone', 'like', '%' . $searchValue . '%')
                    ->orWhere('username', 'like', '%' . $searchValue . '%');
            }
            if (!empty(Auth::user()->agency_id)) {
                $data = $data->where('contents.agency_id', Auth::user()->agency_id);
            }

            $data = $data->get();
            return DataTables::of($data)->addColumn('id', function ($data) {
                return $data->id;
            })->addColumn('created_at', function ($data) {
                return $data->created_at;
            })->addColumn('jenis_content', function ($data) {
                return $data->jenis_content;
            })->addColumn('judul', function ($data) {
                return $data->judul;
            })->addColumn('img', function ($data) {
                if ($data->sampul)
                    return '<img style="max-width:100px; max-height:80px" src="' . url('/upload/content') . '/' . $data->sampul . '" alt="' . $data->judul . '" class="img-thumbnail">';
                else return 'No Image';
            })->addColumn('aksi', function ($data) {
                return '<div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <a type="" class="edit-btn btn btn-secondary" href="' . route('manage.content.preview', $data->slug) . '"><i class="fas fa-eye" ></i></a>
                    <a type="" class="edit-btn btn btn-warning" href="' . route('manage.content.edit', $data->id) . '"><i class="fas fa-pencil-alt" ></i></a>
                    <button type="button" class="delete-btn btn btn-danger" data-id="' . $data->id . '"><i class="fas fa-trash" ></i></button>
                </div>';
            })->rawColumns(['aksi', 'img'])->make(true);
        }

        $dataContent =  [
            'refContent' => RefContent::get(),
        ];
        return view('panel.content.index', compact('request', 'dataContent'));
    }

    public function store_image_quill(Request $request)
    {
        try {

            $request->validate([
                'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Add appropriate validation rules
            ]);

            if ($request->hasFile('upload')) {
                $photo = $request->file('upload');
                $originalFilename = time() . $photo->getClientOriginalName(); // Ambil nama asli file
                // Ensure the directory exists
                $destinationPath = public_path('upload/content_image/');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                // Move the file to the public_html/upload/content_image/ directory
                $photo->move($destinationPath, $originalFilename);

                // dd($path);
                $originalFilename;
                MediaUpload::create(['filename' => $originalFilename, "user_id" => Auth::user()->id]);
            }
            $url = url('/') . '/upload/content_image/' . $originalFilename;
            return response()->json(['fileName' => $originalFilename, 'uploaded' => 1, 'url' => $url]);
            // return $this->responseSuccess(url('/') . '/upload/content_image/' . $originalFilename);
        } catch (Exception $ex) {
            return  $this->ResponseError($ex->getMessage());
        }
    }
    public function preview(Request $request)

    {
        try {
            $data =  Content::where('contents.slug', '=', $request->slug)
                ->select('contents.*')->selectRaw('ref_contents.name as jenis_content')->leftJoin('ref_contents', 'contents.ref_content_id', '=', 'ref_contents.id')->get()->first();
            $galeriImage = MediaUpload::where('content_id', '=', $data->id)->get();
            return view('panel.content.priview', compact('data', 'galeriImage'));
        } catch (Exception $ex) {
            return  $this->ResponseError($ex->getMessage());
        }
    }
    public function form(Request $request)
    {

        $dataContent =  [
            'refAgency' => Agency::get(),
            'refContent' => RefContent::get(),
        ];
        return view('panel.content.form', compact('request', 'dataContent'));
    }

    public function get(Request $request)
    {
        try {
            $query =  Content::with('ref_content');
            if (!empty($request->id)) $query->where('id', '=', $request->id);
            $res = $query->get()->toArray();
            $data =   DataStructure::keyValueObj($res, 'id');

            return $this->responseSuccess($data);
        } catch (Exception $ex) {
            return  $this->ResponseError($ex->getMessage());
        }
    }

    public function create(Request $request)
    {
        try {
            $slug = Content::createUniqueSlug($request->judul);
            $att = [
                'judul' => $request->judul,
                'content' => $request->content,
                'tanggal' => $request->tanggal,
                'agency_id' => $request->agency_id,
                'ref_content_id' => $request->ref_content_id,
                'user_id' => Auth::user()->id,
                'slug' => $slug,
            ];
            if (!empty(Auth::user()->agency_id)) {
                $att['agency_id'] = Auth::user()->agency_id;
            }
            $data = Content::create($att);
            $data = Content::with('ref_content')->find($data->id);

            // Check if the request has a file
            if ($request->hasFile('file_sampul')) {
                $photo = $request->file('file_sampul');
                $originalFilename = time() . '_' . $photo->getClientOriginalName(); // Add timestamp to avoid collisions

                // Ensure the directory exists
                $destinationPath = public_path('upload/content');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                // Move the file to the public_html/upload/content directory
                $photo->move($destinationPath, $originalFilename);

                // Save the filename to the database
                $data->sampul = $originalFilename;
                $data->save();
            }

            $img = extractImageNames($request->content);
            MediaUpload::whereIn('filename', $img)->update(['status' => 'posted', 'content_id' => $data->id]);

            $this->clearImgDraft();

            return  $this->responseSuccess($data);
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



    public function show(string $slug)
    {
        try {
            $query =  Content::with('ref_content');
            $query->where('slug', '=', $slug);
            $res = $query->get()->first();
            return view('page.content.show', ['dataContent' => $res]);
        } catch (Exception $ex) {
            return  $this->ResponseError($ex->getMessage());
        }
    }


    public function edit(string $id)
    {
        $dataContent =  [
            'refAgency' => Agency::get(),
            'refContent' => RefContent::get(),
        ];
        $dataEdit = Content::findOrFail($id);
        return view('panel.content.form', compact('dataContent', 'dataEdit'));
    }

    public function update(Request $request)
    {
        try {
            $data = Content::with('ref_content')->findOrFail($request->id);
            $att = [
                'judul' => $request->judul,
                'content' => $request->content,
                'tanggal' => $request->tanggal,
                'agency_id' => $request->agency_id,
                'user_id' => Auth::user()->id,
                'ref_content_id' => $request->ref_content_id,
            ];
            if (!empty(Auth::user()->agency_id)) {
                $att['agency_id'] = Auth::user()->agency_id;
            }

            if ($request->judul != $data->judul)
                $att['slug'] = Content::createUniqueSlug($request->judul, $request->id);

            if ($request->hasFile('file_sampul')) {
                $photo = $request->file('file_sampul');
                $originalFilename = time() . '_' . $photo->getClientOriginalName(); // Add timestamp to avoid collisions

                // Ensure the directory exists
                $destinationPath = public_path('upload/content');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                // Move the file to the public_html/upload/content directory
                $photo->move($destinationPath, $originalFilename);

                // Save the filename to the database
                $att['sampul'] = $originalFilename;
            }

            // Update the content with the new data
            $data->update($att);

            // Clear draft images
            $this->clearImgDraft();

            return  $this->responseSuccess($data);
        } catch (Exception $ex) {
            return  $this->ResponseError($ex->getMessage());
        }
    }

    function clearImgDraft()
    {
        $data = MediaUpload::where('status', '=', 'draft')->get();
        foreach ($data as $media) {
            $filePath = 'upload/content_image/' . $media->filename;
            if (Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
        }
        MediaUpload::where('status', '=', 'draft')->delete();
    }



    public function delete(Request $request)
    {
        try {
            $data = Content::with('ref_content')->findOrFail($request->id);
            $old_img = MediaUpload::where('content_id', '=', $request->id)->get();
            $filePath = 'upload/content_image/';
            foreach ($old_img as $ol) {
                if (Storage::disk('public')->exists($filePath . $ol->filename)) {
                    Storage::disk('public')->delete($filePath . $ol->filename);
                }
            }
            MediaUpload::where('content_id', '=', $request->id)->delete();

            if (Storage::disk('public')->exists('upload/content/' . $data->sampul)) {
                Storage::disk('public')->delete('upload/content/' . $data->sampul);
            }

            $data->delete();
            return  $this->responseSuccess($data);
        } catch (Exception $ex) {
            return  $this->ResponseError($ex->getMessage());
        }
    }
}
