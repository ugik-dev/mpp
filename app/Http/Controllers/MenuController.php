<?php

namespace App\Http\Controllers;

use App\Helpers\DataStructure;
use App\Models\Agency;
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
        if (!empty(Auth::user()->agency_id)) {
            return view('panel.menu.admin', compact('request', 'dataContent'));
        } else
            return view('panel.menu.index', compact('request', 'dataContent'));
    }

    public function get(Request $request)
    {
        try {
            $menu = new Menu;
            if (!empty(Auth::user()->agency_id)) {
                $agency = Agency::where('id', Auth::user()->agency_id)->get()->first();
                // $menu = $menu->Where('parent_id', $agency->menu_id);

                $data =  Menu::latest()->Where('parent_id', $agency->menu_id);
                if ($request->has('search') && !empty($request->input('search')['value'])) {
                    $searchValue = $request->input('search')['value'];
                    $data = $data->where('name', 'like', '%' . $searchValue . '%')
                        ->orWhere('content', 'like', '%' . $searchValue . '%');
                }
                $data = $data->get();

                return DataTables::of($data)->addColumn('id', function ($data) {
                    return $data->id;
                })->addColumn('created_at', function ($data) {
                    return $data->created_at;
                })->addColumn('name', function ($data) {
                    return $data->name;
                })->addColumn('jenis', function ($data) {
                    return $data->jenis;
                })->addColumn('key', function ($data) {
                    return $data->key;
                })->addColumn('slug', function ($data) {
                    return $data->slug;
                })->addColumn('aksi', function ($data) {
                    return '<div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <a type="button" ' . ($data["editable"] == 'N' ? 'disabled' : '') . ' class="btn btn-warning" href="' . route('manage.menu.edit', $data["id"]) . '"><i class="fas fa-pencil-alt"></i></a>
                    <button type="button" ' . ($data["deletable"] == 'N' ? 'disabled' : '') . ' class="delete-btn btn btn-danger" data-id="' . $data["id"] . '"><i class="fas fa-trash"></i></button>
                </div>';
                })->rawColumns(['aksi'])->make(true);
            }
            $menu = $menu->get()->toArray();
            // dd($menu);
            // $layanan = Menu::where('slug', 'layanan')->first()->toArray();
            // $agencies = Agency::with('menus')->get()->toArray();
            // $new = [];
            // foreach ($agencies as $agency) {
            //     $menu[] = [
            //         "id" =>  'intansi_' . $agency['id'],
            //         "parent_id" => $layanan['id'],
            //         "name" => $agency['name'],
            //         "jenis" => "instansi",
            //         "agency_id" => null,
            //         "content" => null,
            //         "key" => null,
            //         "slug" => "instansi/" . $agency['slug'],
            //         "deletable" => "N",
            //         "editable" => "N",
            //     ];
            //     foreach ($agency['menus'] as $m) {
            //         $menu[] = [
            //             "id" => $m['id'],
            //             "parent_id" =>  'intansi_' . $agency['id'],
            //             "name" => $m['name'],
            //             "jenis" => "route",
            //             "agency_id" => null,
            //             "content" => null,
            //             "key" => null,
            //             "slug" =>  $m['slug'],
            //             "deletable" => "N",
            //             "editable" => "N",
            //         ];
            //     }
            // }

            // dd($new);
            // dd($layanan);
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
            $level = 0;

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
            'agencyData' => Agency::get(),
            'parentData' => Menu::get(),
            'jenis_menu' => ['page' => "Halaman", "link" => "Link", "N" => "Hanya Parent / Parent dari sub menu", "agency" => "Layanan Instansi"],
        ];
        return view('panel.menu.form', compact('request', 'dataContent'));
    }

    public function edit(string $id)
    {
        $dataContent =  [
            'agencyData' => Agency::get(),
            'parentData' => Menu::get(),
            'jenis_menu' => ['page' => "Halaman", "link" => "Link", "N" => "Hanya Parent / Parent dari sub menu", "agency" => "Layanan Instansi"],
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
                'agency_id' => $request->agency_id,
                'jenis' => $request->jenis,
                'slug' => $slug,
                'number' => $request->number,
            ];
            if (!empty(Auth::user()->agency_id)) {
                $agency = Agency::where('id', Auth::user()->agency_id)->get()->first();
                $att['agency_id'] = Auth::user()->agency_id;
                $att['parent_id'] = $agency->menu_id;
            }
            $data = Menu::create($att);
            // $data = Content::with('ref_content')->find($data->id);

            $request->validate([
                'file_sampul' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Add appropriate validation rules
            ]);

            // if ($request->hasFile('file_sampul')) {
            //     $photo = $request->file('file_sampul');
            //     $originalFilename = time() . $photo->getClientOriginalName(); // Ambil nama asli file
            //     $path = $photo->storeAs('upload/content', $originalFilename, 'public');
            //     $data->sampul = $originalFilename;
            //     $data->save();
            // }
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
            if (!empty(Auth::user()->agency_id)) {
                if (Auth::user()->agency_id != $data->agency_id)
                    return;
            }
            $att = [
                'name' => $request->name,
                'content' => $request->content,
                'key' => $request->key,
                'parent_id' => $request->parent_id,
                'agency_id' => $request->agency_id,
                'jenis' => $request->jenis,
                'number' => $request->number,
            ];
            if (!empty(Auth::user()->agency_id)) {
                $agency = Agency::where('id', Auth::user()->agency_id)->get()->first();
                $att['agency_id'] = Auth::user()->agency_id;
                $att['parent_id'] = $agency->menu_id;
            }
            if ($request->name != $data->name)
                $att['slug'] = Menu::createUniqueSlug($request->name, $request->id);

            // if ($request->hasFile('file_sampul')) {
            //     $photo = $request->file('file_sampul');
            //     $originalFilename = time() . $photo->getClientOriginalName(); // Ambil nama asli file
            //     $path = $photo->storeAs('upload/content', $originalFilename, 'public');
            //     $att['sampul']  = $originalFilename;
            // }

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
            $url = url('/') . '/upload/content_image/' . $originalFilename;
            return response()->json(['fileName' => $originalFilename, 'uploaded' => 1, 'url' => $url]);
        } catch (Exception $ex) {
            return  $this->ResponseError($ex->getMessage());
        }
    }
}
