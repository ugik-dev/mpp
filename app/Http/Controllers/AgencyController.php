<?php

namespace App\Http\Controllers;

use App\Helpers\DataStructure;
use App\Models\Content;
use App\Models\Agency;
use App\Models\Menu;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class AgencyController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data =  Agency::latest();
            if ($request->has('search') && !empty($request->input('search')['value'])) {
                $searchValue = $request->input('search')['value'];
                $data = $data->where('agencies.name', 'like', '%' . $searchValue . '%')
                    ->orWhere('phone', 'like', '%' . $searchValue . '%')
                    ->orWhere('website', 'like', '%' . $searchValue . '%')
                    ->orWhere('whatsapp', 'like', '%' . $searchValue . '%')
                    ->orWhere('alamat', 'like', '%' . $searchValue . '%');
            }

            $data = $data->get();

            $datatable =  DataTables::of($data)->addColumn('id', function ($data) {
                return $data->id;
            })->addColumn('name', function ($data) {
                return $data->name;
            })->addColumn('alamat', function ($data) {
                return $data->alamat;
            })->addColumn('email', function ($data) {
                return $data->email;
            })->addColumn('whatsapp', function ($data) {
                return $data->whatsapp;
            })->addColumn('phone', function ($data) {
                return $data->phone;
            })->addColumn('website', function ($data) {
                // return $data->website;
                return '<a href="' . $data->website . '" >' . $data->website . '</a>';
            })->addColumn('img', function ($data) {
                return '<img style="max-width:100px; max-height:80px" src="' . url('/storage/upload/agency_image') . '/' . $data->image . '" alt="' . $data->image . '" class="img-thumbnail">';
            })->addColumn('logo', function ($data) {
                return '<img style="max-width:100px; max-height:80px" src="' . url('/storage/upload/agency') . '/' . $data->logo . '" alt="' . $data->image . '" class="img-thumbnail">';
            })->addColumn('aksi', function ($data) {
                return '<div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <phone type="phone" class="edit-btn btn btn-warning" data-id="' . $data->id . '"><i class="fas fa-pencil-alt" ></i></phone>
                    <phone type="phone" class="delete-btn btn btn-danger" data-id="' . $data->id . '"><i class="fas fa-trash" ></i></phone>
                </div>';
            })->rawColumns(['aksi', 'img', 'logo', 'website'])->make(true);
            return response()->json([
                'datatable' => $datatable,
                'data_original' => $data
            ]);
        }
        $dataContent =  [
            'refRole' => Role::get(),
        ];
        return view('panel.agency.index', compact('request', 'dataContent'));
    }

    public function create(Request $request)
    {
        try {
            $att = [
                'name' => $request->name,
                'alamat' => $request->alamat,
                'phone' => $request->phone,
                'website' => $request->website,
                'whatsapp' => $request->whatsapp,
                'email' => $request->email,
            ];
            $request->link ? $att['link'] = $request->link : '';
            $request->key ? $att['key'] = $request->key : '';
            $data = Agency::create($att);
            $request->validate([
                'logo_agency_upload' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Add appropriate validation rules
                'image_agency_upload' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Add appropriate validation rules
            ]);

            if ($request->hasFile('logo_agency_upload')) {
                $photo = $request->file('logo_agency_upload');
                $originalFilename = time() . $photo->getClientOriginalName(); // Ambil nama asli file
                $path = $photo->storeAs('upload/agency', $originalFilename, 'public');
                $data->logo = $originalFilename;
                $data->save();
            }

            if ($request->hasFile('image_agency_upload')) {
                $photo = $request->file('image_agency_upload');
                $originalFilename = time() . $photo->getClientOriginalName(); // Ambil nama asli file
                $path = $photo->storeAs('upload/agency_image', $originalFilename, 'public');
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
            $data = Agency::findOrFail($request->id);
            $data->update([
                'name' => $request->name,
                'alamat' => $request->alamat,
                'website' => $request->website,
                'phone' => $request->phone,
                'whatsapp' => $request->whatsapp,
                'email' => $request->email,
            ]);



            if ($request->hasFile('logo_agency_upload')) {
                $photo = $request->file('logo_agency_upload');
                $originalFilename = time() . $photo->getClientOriginalName(); // Ambil nama asli file
                $path = $photo->storeAs('upload/agency', $originalFilename, 'public');
                $data->logo = $originalFilename;
                $data->save();
            }

            if ($request->hasFile('image_agency_upload')) {
                $photo = $request->file('image_agency_upload');
                $originalFilename = time() . $photo->getClientOriginalName(); // Ambil nama asli file
                $path = $photo->storeAs('upload/agency_image', $originalFilename, 'public');
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
            $data = Agency::findOrFail($request->id);
            $data->delete();
            return  $this->responseSuccess($data);
        } catch (Exception $ex) {
            return  $this->ResponseError($ex->getMessage());
        }
    }
}
