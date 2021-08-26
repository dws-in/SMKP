<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AuditController extends Controller
{

    public function index()
    {
        $elements = DB::table('elements')
            ->get();
            
        return view('audit.index')->with('elements', $elements);
    }

    public function show($id)
    {
        $element = DB::table('elements')
            ->select('id', 'title')
            ->where('id', '=', $id )
            ->first();
        $requirements = DB::table('requirements')
            ->select('id', 'number', 'title', 'element_id')
            ->where('element_id', '=', $id )
            ->get();
            
        return view('audit.create')->with('element', $element)->with('requirements', $requirements);
    }

    public function store()
    {
        //
    }

    public function create()
    {
        //
    }

    public function edit()
    {
        //
    }

    public function update()
    {
        //
    }

    public function destroy()
    {
        //
    }
}
