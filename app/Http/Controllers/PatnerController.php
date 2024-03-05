<?php

namespace App\Http\Controllers;

use App\Helpers\DataStructure;
use App\Models\Agency;
use App\Models\Content;
use App\Models\Patner;
use App\Models\Menu;
use App\Models\RefPatner;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PatnerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data =  Patner::latest();
            if ($request->has('search') && !empty($request->input('search')['value'])) {
                $searchValue = $request->input('search')['value'];
                $data = $data->where('patner.name', 'like', '%' . $searchValue . '%')
                    ->orWhere('link', 'like', '%' . $searchValue . '%');
            }

            $data = $data->get();

            return  DataTables::of($data)->addColumn('id', function ($data) {
                return $data->id;
            })
                ->addColumn('link_span', function ($data) {
                    return '<a href="' . $data->link . '" alt="' . $data->link . '" target="_blank" class="btn btn-secondary"> ' . $data->link . '</a>';
                })->addColumn('image_span', function ($data) {
                    return '<img class="thumb-image" style="max-width: 200px" src="' . url('/storage/upload/images') . '/' . $data->image . '" alt="' . $data->image . '" />';
                })->addColumn('aksi', function ($data) {
                    return '<div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <button type="button" class="edit-btn btn btn-warning" data-id="' . $data->id . '"><i class="fas fa-pencil-alt" ></i></button>
                    <button type="button" class="delete-btn btn btn-danger" data-id="' . $data->id . '"><i class="fas fa-trash" ></i></button>
                </div>';
                })->rawColumns(['aksi',  'link_span', 'image_span'])->make(true);
            // return response()->json([
            //     'datatable' => $datatable,
            //     'data_original' => $data
            // ]);
        }

        return view('panel.patner', compact('request'));
    }

    public function create(Request $request)
    {
        try {
            $att = [
                'name' => $request->name,
                'jenis' => $request->jenis,
                'link' => $request->link,
                'description' => $request->description,
                'number' => $request->number,
            ];

            $data = Patner::create($att);
            $request->validate([
                'image_upload' => 'mimes:jpeg,png,jpg,gif,svg|max:20480',
            ]);

            // dd($request);
            if ($request->hasFile('image_upload')) {
                $photo = $request->file('image_upload');

                if ($photo->isValid()) {
                    // File is valid, proceed with upload
                    $originalImage = time() . $photo->getClientOriginalName();
                    $path = $photo->storeAs('upload/images', $originalImage, 'public');
                    $data->image = $originalImage;
                    $data->save();
                } else {
                    // File is not valid, handle the error
                    $errorCode = $photo->getError(); // Get error code

                    // Handle error based on error code
                    switch ($errorCode) {
                        case UPLOAD_ERR_INI_SIZE:
                            // Handle error for exceeded upload_max_filesize directive in php.ini
                            break;
                        case UPLOAD_ERR_FORM_SIZE:
                            // Handle error for exceeded MAX_FILE_SIZE directive that was specified in the HTML form
                            break;
                        case UPLOAD_ERR_PARTIAL:
                            // Handle error for partially uploaded file
                            break;
                        case UPLOAD_ERR_NO_FILE:
                            // Handle error for no file was uploaded
                            break;
                        case UPLOAD_ERR_NO_TMP_DIR:
                            // Handle error for missing temporary folder
                            break;
                        case UPLOAD_ERR_CANT_WRITE:
                            // Handle error for failed to write file to disk
                            break;
                        case UPLOAD_ERR_EXTENSION:
                            // Handle error for PHP extension stopped the file upload
                            break;
                        default:
                            // Handle other errors
                            break;
                    }
                }
            } else {
                throw new Exception("Wajib Melampirkan File.");
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
            $data = Patner::findOrFail($request->id);
            $data->update([
                'name' => $request->name,
                'jenis' => $request->jenis,
                'link' => $request->link,
                'description' => $request->description,
                'number' => $request->number,
            ]);

            if ($request->hasFile('image_upload')) {
                $photo = $request->file('image_upload');
                $originalImage = time() . $photo->getClientOriginalName(); // Ambil nama asli file
                $path = $photo->storeAs('upload/images', $originalImage, 'public');
                $data->image = $originalImage;
            }
            $data->save();

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
            $data = Patner::findOrFail($request->id);
            $data->delete();
            return  $this->responseSuccess($data);
        } catch (Exception $ex) {
            return  $this->ResponseError($ex->getMessage());
        }
    }
}
