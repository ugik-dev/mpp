<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Pengaduan;
use App\Models\Survey;
use App\Models\SurveyKPK;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class MonitoringController extends Controller
{

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

            return DataTables::of($data)->addColumn('id', function ($data) {
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

    public function toggleShowPublic(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ids' => 'required|array',
            'ids.*' => 'required|integer',
            'showPublic' => 'required|in:Y,N'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => true, 'message' => $validator->errors()], 422);
        }
        // Retrieve the IDs from the request
        $ids = $request->ids;

        try {
            // Use the model to fetch records based on the IDs
            $surveys = Survey::whereIn('id', $ids)->get();

            // Update the specific column for each record
            foreach ($surveys as $survey) {
                $survey->update(['show_public' => $request->showPublic === 'Y' ? 'Y' : 'N']);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 422);
        }

        // Return a success response
        return response()->json(['success' => true, 'message' => 'Data survei berhasil di update'], 200);
    }

    public function surveyKpk(Request $request)
    {
        if ($request->ajax()) {
            $data =  SurveyKPK::select('survey_kpk.*')
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
        return view('panel.monitoring.survey-kpk', compact('request', 'refAgency'));
    }

    public function pengaduan(Request $request)
    {
        if ($request->ajax()) {
            $data =  Pengaduan::select('pengaduans.*')
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
        return view('panel.monitoring.pengaduan', compact('request', 'refAgency'));
    }
}
