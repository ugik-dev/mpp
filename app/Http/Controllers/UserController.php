<?php

namespace App\Http\Controllers;

use App\Helpers\DataStructure;
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
        if ($request->ajax()) {
            $data =  User::latest()
                ->select('users.*')->selectRaw('roles.title as role_title')->leftJoin('roles', 'roles.id', '=', 'users.role_id');
            if ($request->has('search') && !empty($request->input('search')['value'])) {
                $searchValue = $request->input('search')['value'];
                $data = $data->where('users.name', 'like', '%' . $searchValue . '%')
                    ->orWhere('phone', 'like', '%' . $searchValue . '%')
                    ->orWhere('username', 'like', '%' . $searchValue . '%');
            }

            $data = $data->get();

            return DataTables::of($data)->addColumn('id', function ($data) {
                return $data->id;
            })->addColumn('created_at', function ($data) {
                return $data->created_at;
            })->addColumn('name', function ($data) {
                return $data->name;
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
        ];
        return view('panel.user.index', compact('request', 'dataContent'));
    }

    public function get(Request $request)
    {
        try {
            $query =  User::withRole();
            if (!empty($request->id)) $query->where('id', '=', $request->id);
            $res = $query->get()->toArray();
            // $data =   DataStructure::keyValueObj($res, 'id');
            // return $this->responseSuccess($data);
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
                'alamat' => $request->alamat,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];
            $data = User::create($att);
            $data = User::withRole()->find($data->id);

            return  $this->responseSuccess($data);
        } catch (QueryException $ex) {
            if ($ex->errorInfo[1] === 1062) {
                return $this->ResponseError('Duplikat entri untuk email tersebut');
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
            $data = User::withRole()->findOrFail($request->id);

            $data->update([
                'name' => $request->name,
                'username' => $request->username,
                'role_id' => $request->role_id,
                'alamat' => $request->alamat,
                'phone' => $request->phone,
                'email' => $request->email,
            ]);
            if (!empty($request->password))
                $data->update([
                    'password' => Hash::make($request->password),
                ]);
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
