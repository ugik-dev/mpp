<?php

namespace App\Http\Controllers;

use App\Helpers\DataStructure;
use App\Models\MediaMenuUpload;
use App\Models\Menu;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index(Request $request)
    {

        $dataContent =  [
            'parentData' => Menu::get(),
        ];
        return view('panel.menu.index', compact('request', 'dataContent'));
    }

    public function get(Request $request)
    {
        try {
            $menu = Menu::get()->toArray();
            $t = $this->transformData($menu);
            return response()->json($t);
        } catch (Exception $ex) {
            return  $this->ResponseError($ex->getMessage());
        }
    }


    public function transformData($array)
    {
        $transformedData = [];

        // Buat array asosiatif untuk menyimpan level dari setiap item berdasarkan id
        $itemLevels = [];

        foreach ($array as $item) {
            // Inisialisasi level ke 0
            $level = 0;

            // Jika parent_id tidak null, cari parent item dan tentukan level berdasarkan level parent
            if ($item["parent_id"] !== null && isset($itemLevels[$item["parent_id"]])) {
                $level = $itemLevels[$item["parent_id"]] + 1;
            }

            // Simpan level dari item saat ini untuk digunakan pada item berikutnya yang menjadi child dari item ini
            $itemLevels[$item["id"]] = $level;

            // Menambahkan data yang telah diubah ke dalam array transformasi
            $btn = '<div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <a type="button" ' . ($item["editable"] == 'N' ? 'disabled' : '') . ' class="btn btn-warning" href="' . route('manage.menu.edit', $item["id"]) . '"><i class="fas fa-pencil-alt"></i></a>
                        <button type="button" ' . ($item["deletable"] == 'N' ? 'disabled' : '') . ' class="delete-btn btn btn-danger" data-id="' . $item["id"] . '"><i class="fas fa-trash"></i></button>
                    </div>';
            $transformedData[] = [
                "DT_RowId" => $item["id"],
                "level" => $level,
                "key" => $item["id"],
                "parent" => $item["parent_id"] ?? 0,
                "name" => $item["name"],
                "value" => $btn, // Ganti dengan nilai yang sesuai dari $item jika ada
            ];
        }

        return ["data" => $transformedData];
    }

    public function form(Request $request)
    {
        $dataContent =  [
            'parentData' => Menu::get(),
            'jenis_menu' => ['page' => "Halaman", "link" => "Link", "N" => "Hanya Parent / Parent dari sub menu"],
        ];
        return view('panel.menu.form', compact('request', 'dataContent'));
    }

    public function edit(string $id)
    {
        $dataContent =  [
            'parentData' => Menu::get(),
            'jenis_menu' => ['page' => "Halaman", "link" => "Link", "N" => "Hanya Parent / Parent dari sub menu"],
        ];
        $dataEdit = Menu::findOrFail($id);
        if ($dataEdit->editable == true)
            return view('panel.menu.form', compact('dataContent', 'dataEdit'));
        else return view('panel.error');
    }
    public function create(Request $request)
    {
        try {
            $slug = Menu::createUniqueSlug($request->name);
            $att = [
                'name' => $request->name,
                'content' => $request->content,
                'key' => $request->key,
                'parent_id' => $request->parent_id,
                'jenis' => $request->jenis,
                'slug' => $slug,
            ];

            $data = Menu::create($att);
            // $data = Content::with('ref_content')->find($data->id);

            $request->validate([
                'file_sampul' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Add appropriate validation rules
            ]);

            if ($request->hasFile('file_sampul')) {
                $photo = $request->file('file_sampul');
                $originalFilename = time() . $photo->getClientOriginalName(); // Ambil nama asli file
                $path = $photo->storeAs('upload/content', $originalFilename, 'public');
                $data->sampul = $originalFilename;
                $data->save();
            }
            $img = extractImageNames($request->content);
            MediaMenuUpload::whereIn('filename', $img)->update(['status' => 'posted', 'menu_id' => $data->id]);
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

    public function update(Request $request)
    {
        try {
            $data = Menu::findOrFail($request->id);
            $att = [
                'name' => $request->name,
                'content' => $request->content,
                'tanggal' => $request->tanggal,
                'ref_menu_id' => $request->ref_menu_id,
            ];
            if ($request->name != $data->name)
                $att['slug'] = Menu::createUniqueSlug($request->name, $request->id);

            if ($request->hasFile('file_sampul')) {
                $photo = $request->file('file_sampul');
                $originalFilename = time() . $photo->getClientOriginalName(); // Ambil nama asli file
                $path = $photo->storeAs('upload/content', $originalFilename, 'public');
                $att['sampul']  = $originalFilename;
            }

            $use_img = extractImageNames($request->content);
            $old_img = MediaMenuUpload::where('menu_id', '=', $request->id)->get();
            $old_img_list = [];
            $filePath = 'upload/content_image/';
            foreach ($old_img as $ol) {
                $old_img_list[] = $ol->filename;
                if (!in_array($ol->filename, $use_img)) {
                    if (Storage::disk('public')->exists($filePath . $ol->filename)) {
                        Storage::disk('public')->delete($filePath . $ol->filename);
                    }
                    MediaMenuUpload::where('id', '=', $ol->id)->delete();
                } else {
                    $key = array_search($ol->filename, $use_img);
                    if ($key !== false) {
                        unset($use_img[$key]);
                    }
                }
            }
            MediaMenuUpload::whereIn('filename', $use_img)->update(['status' => 'posted', 'menu_id' => $data->id]);
            $this->clearImgDraft();

            $data->update($att);
            return  $this->responseSuccess($data);
        } catch (Exception $ex) {
            return  $this->ResponseError($ex->getMessage());
        }
    }

    public function delete(Request $request)
    {
        try {
            $data = Menu::findOrFail($request->id);
            $data->delete();
            return  $this->responseSuccess($data);
        } catch (Exception $ex) {
            return  $this->ResponseError($ex->getMessage());
        }
    }
    function clearImgDraft()
    {
        $data = MediaMenuUpload::where('status', '=', 'draft')->get();
        foreach ($data as $media) {
            $filePath = 'upload/content_image/' . $media->filename;
            if (Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
        }
        MediaMenuUpload::where('status', '=', 'draft')->delete();
    }
    public function store_media(Request $request)
    {
        try {
            // echo "s";
            // die();
            $request->validate([
                'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Add appropriate validation rules
            ]);

            if ($request->hasFile('upload')) {
                $photo = $request->file('upload');
                $originalFilename = time() . $photo->getClientOriginalName(); // Ambil nama asli file
                $path = $photo->storeAs('upload/content_image/', $originalFilename, 'public');
                // dd($path);
                $originalFilename;
                MediaMenuUpload::create(['filename' => $originalFilename, "user_id" => Auth::user()->id]);
            }
            $url = url('/') . '/storage/upload/content_image/' . $originalFilename;
            return response()->json(['fileName' => $originalFilename, 'uploaded' => 1, 'url' => $url]);
        } catch (Exception $ex) {
            return  $this->ResponseError($ex->getMessage());
        }
    }
}
