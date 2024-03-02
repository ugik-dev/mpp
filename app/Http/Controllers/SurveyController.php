<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Menu;
use App\Models\Survey;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    //
    public function index()
    {
        $layanan = Menu::with('childrens')->where('id', 8)->get()->first()->childrens;
        // dd($layanan);
        $sidbar_lates_content = Content::select('contents.*')->complete()->latest('tanggal')->take(5)->get();

        return view('survey', compact('sidbar_lates_content', 'layanan'));
    }

    public function post(Request $request)
    {
        try {
            $validatedData = $request->validate([
                // 'respon' => 'required|integer|min:1|max:5', // Assuming response is within 1 to 5
                'alasan' => 'string',
                // 'nama' => 'required|string|max:255',
                // 'alamat' => 'required|string|max:255',
                // 'no_hp' => 'required|string|max:35',
                // 'email' => 'email|max:255',
                // 'umur' => 'integer|min:0|max:150', // Assuming age is within 0 to 150
                // 'jk' => 'string|max:1|in:P,W', // Assuming gender is either P (Pria) or W (Wanita)
                // 'pendidikan' => 'string|max:32',
                // 'pekerjaan' => 'string|max:64',
                // 'layanan' => 'string|max:64',
                // 'kesesuaian' => 'integer|min:0|max:5', // Assuming rating is within 0 to 5
                // 'kemudahan' => 'integer|min:0|max:5',
                // 'kecepatan' => 'integer|min:0|max:5',
                // 'tarif' => 'integer|min:0|max:5',
                // 'sop' => 'integer|min:0|max:5',
                // 'kompetensi' => 'integer|min:0|max:5',
                // 'prilaku' => 'integer|min:0|max:5',
                // 'sarpras' => 'integer|min:0|max:5',
                // 'pengaduan' => 'integer|min:0|max:5',
            ]);
            $data =    Survey::create($request->input());
            // dd($data);
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
