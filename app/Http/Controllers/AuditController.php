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

    public function store(Request $request)
    {
        
        $query = DB::table('requirements')->where('element_id', '=' ,$request->input('id_el'))->get();

        foreach ($query as $requirement) {
            $nilai0[] = array($requirement->n0);
            $nilai1[] = array($requirement->n1);
            $nilai2[] = array($requirement->n2);
            $nilai3[] = array($requirement->n3);
            $nilai4[] = array($requirement->n4);
            $jawab[] = array($request->input('radio'.$requirement->id));
            $save[] = array(
                'id' => Auth::user()->name,
                'id_req'    =>   $request->input('id_req'.$requirement->id),
                'id_el'     =>   $request->input('id_el'),
                'jawaban'   =>  $request->input('radio'.$requirement->id),
            );
        }

        $rest = 0;
        if($jawab == $nilai0){
            $rest = 0;
        } elseif($jawab == $nilai1){
            $rest = 1;
        } elseif($jawab == $nilai2){
            $rest = 2;
        } elseif($jawab == $nilai3){
            $rest = 3;
        } elseif($jawab == $nilai4){
            $rest = 4;
        }

        $nilai = array(
            'id_answer' => Auth::user()->name,
            'id_el'     => $request->input('id_el'),
            'nilai'     => $rest
        );
 
        $page = $request->input('id_el') + 100;

        if(DB::table('requirements')->where('element_id', '=', $page)->doesntExist()){
            $page = intval($page/10000);
            $page = ($page+1)*10000 + 100;
        }

        DB::table('nilai')->insert($nilai);
        DB::table('answer')->insert($save);

        return redirect('audits/'.$page);
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
