<?php

namespace App\Http\Controllers;

use App\Models\result;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ReportController extends Controller
{
    public function edit($id)
    {
        $data = DB::table('nilai')
        ->join('elements', 'elements.id', '=', 'nilai.id_el')
        ->select('elements.title as title', 'elements.number as number', 'nilai.nilai as nilai',
        'nilai.image as image', 'nilai.id_el as link', 'nilai.nilai_auditor as auditor', 'nilai.id as id', 'nilai.id_answer as answer')
        ->where('nilai.id_user', '=', $id)
        ->get();

        return view('report.show')->with('data', $data);
    }

    public function index()
    {
        $data = DB::table('results')
        ->join('users', 'users.id', '=', 'results.id_user')
        ->select('users.name as name', 'users.company as company', 'results.periode as date', 'results.id_user as id', 'results.id_answer as answer')
        ->get();
        return view('report.index')->with('data', $data);
    }

    public function show($id)
    {
        $data = DB::table('answer')
            ->leftJoin('requirements', 'requirements.id', '=', 'answer.id_req')
            ->select('answer.jawaban as value', 'requirements.title as rule', 'answer.id_req as kode')
            ->where('answer.id_el', '=', substr($id,0,5))
            ->where('answer.id_answer', '=', substr($id,5,12))
            ->get();

        return view('report.user')->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        $role = Auth::user()->role_id;
        if ($role == 2) {
            $test = DB::table('nilai')
            ->where('id_el', '=', $id)
            ->update([
                'nilai_auditor' => $request->value
            ]);
            ddd($test);

            return redirect('');
        }
        else {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }

    public function destroy($id)
    {
        DB::table('answer')->where('id_answer', '=', $id)->delete();
        DB::table('results')->where('id_answer', '=', $id)->delete();
        DB::table('nilai')->where('id_answer', '=', $id)->delete();

        return redirect('report');
    }
}
