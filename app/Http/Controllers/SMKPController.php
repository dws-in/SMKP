<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class SMKPController extends Controller
{

    public function index()
    {
        $data = DB::table('elements')
            ->leftJoin('requirements', 'elements.id', '=', 'requirements.element_id')
            ->select('elements.id', 'elements.title as element', 'requirements.number as number', 'requirements.title as requirement')
            ->orderByRaw('id, number')
            ->get();
            
        return view('smkp.index')->with('data', $data);
    }
}
