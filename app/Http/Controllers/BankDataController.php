<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\BankData;
use App\Models\RefBankData;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

class BankDataController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data =  BankData::select('bank_data.*')->complete()->latest();
            if ($request->has('search') && !empty($request->input('search')['value'])) {
                $searchValue = $request->input('search')['value'];
                $data = $data->where('bank_data.name', 'like', '%' . $searchValue . '%')
                    ->orWhere('agency_id', 'like', '%' . $searchValue . '%');
            }

            $data = $data->get();

            return  DataTables::of($data)->addColumn('id', function ($data) {
                return $data->id;
            })
                ->addColumn('public_span', function ($data) {
                    return $data->public == 'Y' ? 'Terbuka' : 'Tertutup';
                })->addColumn('filename_span', function ($data) {
                    return '<a href="' . url('/upload/bankdata') . '/' . $data->filename . '" alt="' . $data->image . '" target="_blank" class="btn btn-secondary"><i class="fa fa-eye"></i> ' . $data->filename . '</a>';
                })->addColumn('aksi', function ($data) {
                    return '<div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <button type="button" class="edit-btn btn btn-warning" data-id="' . $data->id . '"><i class="fas fa-pencil-alt" ></i></button>
                    <button type="button" class="delete-btn btn btn-danger" data-id="' . $data->id . '"><i class="fas fa-trash" ></i></button>
                </div>';
                })->rawColumns(['aksi', 'img', 'filename_span', 'public_link'])->make(true);
            // return response()->json([
            //     'datatable' => $datatable,
            //     'data_original' => $data
            // ]);
        }

        $refBankData = RefBankData::get();
        $refAgency = Agency::get();
        return view('panel.bankdata', compact('request', 'refBankData', 'refAgency'));
    }

    public function create(Request $request)
    {
        try {
            $slug = BankData::createUniqueSlug($request->name, $request->tanggal_dokumen);

            $att = [
                'name' => $request->name,
                'ref_id' => $request->ref_id,
                'agency_id' => $request->agency_id,
                'public' => $request->public,
                'description' => $request->description,
                'tanggal_dokumen' => $request->tanggal_dokumen,
                'slug' => $slug,
                'user_id' => Auth::user()->id
            ];

            $data = BankData::create($att);
            // $request->validate([
            //     'file_bank_data_upload' => 'mimes:jpeg,png,jpg,gif,svg,pdf,xls,xlsx,doc,docx,ppt,pptx|max:20480',
            // ]);

            // dd($request);
            if ($request->hasFile('file_bank_data_upload')) {
                $photo = $request->file('file_bank_data_upload');

                if ($photo->isValid()) {
                    // File is valid, proceed with upload
                    $originalFilename = time() . $photo->getClientOriginalName();
                    // Ensure the directory exists
                    $destinationPath = public_path('upload/bankdata');
                    if (!file_exists($destinationPath)) {
                        mkdir($destinationPath, 0755, true);
                    }

                    // Move the file to the public_html/upload/bankdata directory
                    $photo->move($destinationPath, $originalFilename);

                    $data->filename = $originalFilename;
                    $data->fileextension = $photo->getClientOriginalExtension();
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
            $data = BankData::findOrFail($request->id);
            if ($request->name != $data->name || $request->tanggal_dokumen != $data->tanggal_dokumen)
                $data->slug = BankData::createUniqueSlug($request->name, $request->tanggal_dokumen);

            $data->update([
                'name' => $request->name,
                'ref_id' => $request->ref_id,
                'public' => $request->public,
                'agency_id' => $request->agency_id,
                'description' => $request->description,
                'tanggal_dokumen' => $request->tanggal_dokumen,
                'user_id' => Auth::user()->id
            ]);


            if ($request->hasFile('file_bank_data_upload')) {
                $photo = $request->file('file_bank_data_upload');
                $originalFilename = time() . $photo->getClientOriginalName(); // Ambil nama asli file
                // Ensure the directory exists
                $destinationPath = public_path('upload/bankdata');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                // Move the file to the public_html/upload/bankdata directory
                $photo->move($destinationPath, $originalFilename);

                $data->filename = $originalFilename;
                $data->fileextension = $photo->getClientOriginalExtension();
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
            $data = BankData::findOrFail($request->id);
            $data->delete();
            return  $this->responseSuccess($data);
        } catch (Exception $ex) {
            return  $this->ResponseError($ex->getMessage());
        }
    }
}
