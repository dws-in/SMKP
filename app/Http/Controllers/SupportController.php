<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Models\Support;
use App\Mail\SupportMail;
use App\Http\Requests\StoreSupportRequest;
use Symfony\Component\HttpFoundation\Response;

class SupportController extends Controller
{

    public function index(){
        return view('support.create');
    }

    public function create()
    {
        return view('support.create');
    }

    public function store(StoreSupportRequest $request)
    {
        $support = Support::create($request->validated());
        $id = DB::table('supports')->count();
        Mail::to($request->email)->send(new SupportMail($id, $request->email, $request->description));
        // return redirect()->route('support.create')->with('alert', 'Email sent successfully!');
        return redirect()->back()->with('message', 'Pesan berhasil dikirim');
    }
}
