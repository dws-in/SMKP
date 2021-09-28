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
        $data = DB::table('answer')
            ->leftJoin('nilai', 'answer.id_el', '=', 'nilai.id_el')
            ->leftJoin('requirements', 'requirements.id', '=', 'answer.id_req')
            ->select('answer.jawaban as value', 'requirements.title as rule', 'answer.id_req as kode', 
            'nilai.image as image', 'nilai.nilai as result')
            ->get();
            
        return view('report.test')->with('data', $data);
    }

    public function edit($id, $uid)
    {

    }
}
