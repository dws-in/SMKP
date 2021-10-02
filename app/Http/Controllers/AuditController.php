<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuditController extends Controller
{

    public function index()
    {
        $role = Auth::user()->role_id;

        if ($role == 1 || $role == 3) {
            $elements = DB::table('elements')
                ->get();

            return view('audit.index')->with('elements', $elements);
        }

        else {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
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
            $request->validate([
                'radio'.$requirement->id => 'required',
                'image' => 'image|file|max:1024'
            ]);
            $nilai0[] = $requirement->n0;
            $nilai1[] = $requirement->n1;
            $nilai2[] = $requirement->n2;
            $nilai3[] = $requirement->n3;
            $nilai4[] = $requirement->n4;
            $jawab[] = $request->input('radio'.$requirement->id);
            $save[] = array(
                'id_req'    =>   $request->input('id_req'.$requirement->id),
                'id_el'     =>   $request->input('id_el'),
                'jawaban'   =>  $request->input('radio'.$requirement->id),
            );
        }

        $nilai0v1 = $nilai0;$nilai0v2 = $nilai0;$nilai0v3 = $nilai0;
        $nilai1v1 = $nilai1;$nilai1v2 = $nilai1;$nilai1v3 = $nilai1;
        $nilai2v1 = $nilai2;$nilai2v2 = $nilai2;$nilai2v3 = $nilai2;
        $nilai3v1 = $nilai3;$nilai3v2 = $nilai3;$nilai3v3 = $nilai3;
        $nilai4v1 = $nilai4;$nilai4v2 = $nilai4;$nilai4v3 = $nilai4;

        for($i = 0; $i < count($nilai0); $i++) {
            if($nilai0[$i] == "v - x" && $nilai0[$i+1] == "v - x"){
                $nilai0[$i]='v';$nilai0[$i+1]='v';$nilai0[$i+2]='x';$nilai0[$i+3]='x';
                $nilai0v1[$i]='v';$nilai0v1[$i+1]='x';$nilai0v1[$i+2]='x';$nilai0v1[$i+3]='v';
                $nilai0v2[$i]='x';$nilai0v2[$i+1]='x';$nilai0v2[$i+2]='v';$nilai0v2[$i+3]='v';
                $nilai0v3[$i]='x';$nilai0v3[$i+1]='v';$nilai0v3[$i+2]='v';$nilai0v3[$i+3]='x';
            }elseif($nilai1[$i] == "v - x" && $nilai1[$i+1] == "v - x"){
                $nilai1[$i]='v';$nilai1[$i+1]='v';$nilai1[$i+2]='x';$nilai1[$i+3]='x';
                $nilai1v1[$i]='v';$nilai1v1[$i+1]='x';$nilai1v1[$i+2]='x';$nilai1v1[$i+3]='v';
                $nilai1v2[$i]='x';$nilai1v2[$i+1]='x';$nilai1v2[$i+2]='v';$nilai1v2[$i+3]='v';
                $nilai1v3[$i]='x';$nilai1v3[$i+1]='v';$nilai1v3[$i+2]='v';$nilai1v3[$i+3]='x';
            }elseif($nilai2[$i] == "v - x" && $nilai2[$i+1] == "v - x"){
                $nilai2[$i]='v';$nilai2[$i+1]='v';$nilai2[$i+2]='x';$nilai2[$i+3]='x';
                $nilai2v1[$i]='v';$nilai2v1[$i+1]='x';$nilai2v1[$i+2]='x';$nilai2v1[$i+3]='v';
                $nilai2v2[$i]='x';$nilai2v2[$i+1]='x';$nilai2v2[$i+2]='v';$nilai2v2[$i+3]='v';
                $nilai2v3[$i]='x';$nilai2v3[$i+1]='v';$nilai2v3[$i+2]='v';$nilai2v3[$i+3]='x';
            }elseif($nilai3[$i] == "v - x" && $nilai3[$i+1] == "v - x"){
                $nilai3[$i]='v';$nilai3[$i+1]='v';$nilai3[$i+2]='x';$nilai3[$i+3]='x';
                $nilai3v1[$i]='v';$nilai3v1[$i+1]='x';$nilai3v1[$i+2]='x';$nilai3v1[$i+3]='v';
                $nilai3v2[$i]='x';$nilai3v2[$i+1]='x';$nilai3v2[$i+2]='v';$nilai3v2[$i+3]='v';
                $nilai3v3[$i]='x';$nilai3v3[$i+1]='v';$nilai3v3[$i+2]='v';$nilai3v3[$i+3]='x';
            }elseif($nilai4[$i] == "v - x" && $nilai4[$i+1] == "v - x"){
                $nilai4[$i]='v';$nilai4[$i+1]='v';$nilai4[$i+2]='x';$nilai4[$i+3]='x';
                $nilai4v1[$i]='v';$nilai4v1[$i+1]='x';$nilai4v1[$i+2]='x';$nilai4v1[$i+3]='v';
                $nilai4v2[$i]='x';$nilai4v2[$i+1]='x';$nilai4v2[$i+2]='v';$nilai4v2[$i+3]='v';
                $nilai4v3[$i]='x';$nilai4v3[$i+1]='v';$nilai4v3[$i+2]='v';$nilai4v3[$i+3]='x';
            }elseif($nilai0[$i] == "v - x" && $nilai0[$i+1] != "v - x"){
                $nilai0[$i]='v';$nilai0[$i+1]='x';
                $nilai0v1[$i]='x';$nilai0v1[$i+1]='v';
            }elseif($nilai1[$i] == "v - x" && $nilai1[$i+1] != "v - x"){
                $nilai1[$i]='v';$nilai1[$i+1]='x';
                $nilai1v1[$i]='x';$nilai1v1[$i+1]='v';
            }elseif($nilai2[$i] == "v - x" && $nilai2[$i+1] != "v - x"){
                $nilai2[$i]='v';$nilai2[$i+1]='x';
                $nilai2v1[$i]='x';$nilai2v1[$i+1]='v';
            }elseif($nilai3[$i] == "v - x" && $nilai3[$i+1] != "v - x"){
                $nilai3[$i]='v';$nilai3[$i+1]='x';
                $nilai3v1[$i]='x';$nilai3v1[$i+1]='v';
            }elseif($nilai4[$i] == "v - x" && $nilai4[$i+1] != "v - x"){
                $nilai4[$i]='v';$nilai4[$i+1]='x';
                $nilai4v1[$i]='x';$nilai4v1[$i+1]='v';
            }
        }

        $rest = 0;
        for($i = (count($nilai0)-1); $i >= 0; $i--) {
            if($jawab == $nilai0 || $jawab == $nilai0v1 || $jawab == $nilai0v2 || $jawab == $nilai0v3){
                $rest = 0;
                break;
            } elseif($jawab == $nilai1 || $jawab == $nilai1v1 || $jawab == $nilai1v2 || $jawab == $nilai1v3){
                $rest = 1;
                break;
            } elseif($jawab == $nilai2 || $jawab == $nilai2v1 || $jawab == $nilai2v2 || $jawab == $nilai2v3){
                $rest = 2;
                break;
            } elseif($jawab == $nilai3 || $jawab == $nilai3v1 || $jawab == $nilai3v2 || $jawab == $nilai3v3){
                $rest = 3;
                break;
            } elseif($jawab == $nilai4 || $jawab == $nilai4v1 || $jawab == $nilai4v2 || $jawab == $nilai4v3){
                $rest = 4;
                break;
            } else{
                $jawab[$i]='x';
            }
        }

        $path = $request->file('image')->store('post-images');

        $nilai = array(
            'id_answer' => Auth::user()->id.date('m-Y'),
            'id_el'     => $request->input('id_el'),
            'nilai'     => $rest,
            'nilai_auditor' => 0,
            'image'     => $path
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

    public function edit(Request $request, $id)
    {
        $data[''] = DB::table('nilai')->find($id);
        return $data;
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $status = DB::table('nilai')->where('id', $id)->update($input);
    }

    public function destroy()
    {
        //
    }
}
