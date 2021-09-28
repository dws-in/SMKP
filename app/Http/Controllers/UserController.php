<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepositoryInterface;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{

    public function index()
    {
        $role = Auth::user()->role_id;

        // Only Administrator can access this page
        if ($role == 1) {
            $users = DB::table('users')
                ->join('roles', 'users.role_id', '=', 'roles.id')
                ->get();

            return view('users.index')->with('users', $users);
        }

        else {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

    }

    public function create()
    {
        $roles = DB::table('roles')->pluck('title', 'id');

        return view('users.create')->with('roles', $roles);
    }

    public function store(StoreUserRequest $request)
    {
        $user = DB::table('users')->create($request->validated());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        return view('users.show')->with('user', $user);
    }

    public function edit(User $user)
    {
        $roles = DB::table('roles')->get();

        return view('users.edit', compact('user', 'roles'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}
