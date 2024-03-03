<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Survey;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $skm = ['responden' => Survey::count(), 'total' => Survey::sum('respon')];
        $skm['avg'] = $skm['total'] / $skm['responden'];
        return view('panel/dashboard', compact('skm'));
    }
}
