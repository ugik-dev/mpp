<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Survey;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MonitoringController extends Controller
{
    //

    public function survey(Request $request)
    {
        if ($request->ajax()) {
            $data =  Survey::select('surveys.*')
                // ->complete()
                ->latest();
            if ($request->has('search') && !empty($request->input('search')['value'])) {
                $searchValue = $request->input('search')['value'];
                $data = $data->filter($searchValue);
            }
            $data = $data->get();

            return  DataTables::of($data)->addColumn('id', function ($data) {
                return $data->id;
            })->addColumn('created_at', function ($data) {
                return $data->created_at->format('Y-m-d');
            })->addColumn('filename_span', function ($data) {
                return '
                      <a href="' . url('/bank-data') . '/' . $data->id . '" alt="Download" target="_blank" class="btn btn-info btn-download w-100"><i class="fa fa-download"></i></a>
                    ';
            })->rawColumns(['filename_span'])->make(true);
        }
        $refAgency = Agency::get();
        return view('panel.monitoring.survey', compact('request', 'refAgency'));
    }
}
