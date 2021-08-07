<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class SMKPController extends Controller
{

    public function index()
    {
        $data = DB::table('elements')
            ->leftJoin('requirements', 'elements.id', '=', 'requirements.element_id')
            ->select('elements.id', 'elements.title as element', 'requirements.title as requirement')
            ->orderBy('id')
            ->get();
            
        return view('smkp.index')->with('data', $data);
    }
}
