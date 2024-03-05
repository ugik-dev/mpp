<?php

namespace App\Http\Controllers;

use App\Helpers\DataStructure;
use App\Models\Agency;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\QueryException;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // dd(Agency::with('menuparent')->get());
        if ($request->ajax()) {
            $data =  User::latest()
                ->select('users.*')
                ->WithRole()->WithUserInstansi();
            if ($request->has('search') && !empty($request->input('search')['value'])) {
                $searchValue = $request->input('search')['value'];
                $data = $data->where('users.name', 'like', '%' . $searchValue . '%')
                    ->orWhere('phone', 'like', '%' . $searchValue . '%')
                    ->orWhere('username', 'like', '%' . $searchValue . '%');
            }
            $data = $data->get();
            // dd($data);

            return DataTables::of($data)->addColumn('id', function ($data) {
                return $data->id;
            })->addColumn('created_at', function ($data) {
                return $data->created_at;
            })->addColumn('name', function ($data) {
                return $data->name;
            })->addColumn('agency_name', function ($data) {
                return $data->agency_name;
            })->addColumn('phone', function ($data) {
                return $data->phone;
            })->addColumn('role_title', function ($data) {
                return $data->role_title;
            })->addColumn('aksi', function ($data) {
                return '<div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <button type="button" class="edit-btn btn btn-warning" data-id="' . $data->id . '"><i class="fas fa-pencil-alt" ></i></button>
                    <button type="button" class="delete-btn btn btn-danger" data-id="' . $data->id . '"><i class="fas fa-trash" ></i></button>
                </div>';
            })->rawColumns(['aksi'])->make(true);
        }
        $dataContent =  [
            'refRole' => Role::get(),
            'refAgency' => Agency::get(),
        ];
        return view('panel.user.index', compact('request', 'dataContent'));
    }

    public function get(Request $request)
    {
        try {
            $query =  User::withRole()->get();
            if (!empty($request->id)) $query->where('id', '=', $request->id);
            $res = $query->get()->toArray();
        } catch (Exception $ex) {
            return  $this->ResponseError($ex->getMessage());
        }
    }

    public function create(Request $request)
    {
        try {
            $att = [
                'name' => $request->name,
                'username' => $request->username,
                'role_id' => $request->role_id,
                'agency_id' => $request->agency_id,
                'alamat' => $request->alamat,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];
            $data = User::create($att);
            $data = User::withRole()->find($data->id);

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
            $data = User::findOrFail($request->id);

            $data->update([
                'name' => $request->name,
                'username' => $request->username,
                'role_id' => $request->role_id,
                'agency_id' => $request->agency_id,
                'alamat' => $request->alamat,
                'phone' => $request->phone,
                'email' => $request->email,
            ]);
            if (!empty($request->password))
                $data->update([
                    'password' => Hash::make($request->password),
                ]);
            $data->save();
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


    public function delete(Request $request)
    {
        try {
            $data = User::findOrFail($request->id);
            $data->delete();
            return  $this->responseSuccess($data);
        } catch (Exception $ex) {
            return  $this->ResponseError($ex->getMessage());
        }
    }
}
