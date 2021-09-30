<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = DB::table('elements')
            ->leftJoin('requirements', 'elements.id', '=', 'requirements.element_id')
            ->select('elements.id', 'elements.number as e_number', 'elements.title as e_title', 'requirements.number as r_number', 'requirements.title as r_title')
            ->orderByRaw('id, r_number')
            ->get();

        return view('smkp.index')->with('data', $data);
    }
}
