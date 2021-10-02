<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = DB::table('elements')
            ->get();

        return view('dashboard')->with('data', $data);
    }
}