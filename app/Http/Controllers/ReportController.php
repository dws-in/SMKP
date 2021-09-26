<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    //
    public function index()
    {
        $elements = DB::table('elements')
            ->get();
            
        return view('report.index');
    }
}
