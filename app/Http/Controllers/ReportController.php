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
        $data = DB::table('nilai')
        ->join('elements', 'elements.id', '=', 'nilai.id_el')
        ->select('elements.title as title', 'elements.number as number', 'nilai.nilai as nilai', 
        'nilai.image as image', 'nilai.id_el as link')
        ->get();
        

        return view('report.show')->with('data', $data);
    }

    public function show($id)
    {
        $data = DB::table('answer')
            ->leftJoin('requirements', 'requirements.id', '=', 'answer.id_req')
            ->select('answer.jawaban as value', 'requirements.title as rule', 'answer.id_req as kode')
            ->where('answer.id_el', '=', $id)
            ->get();
        
        return view('report.test')->with('data', $data);
    }

    public function edit($id, $uid)
    {

    }
}
