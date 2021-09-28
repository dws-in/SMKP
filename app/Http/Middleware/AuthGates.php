<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class AuthGates
{
    public function handle($request, Closure $next)
    {
        $role  = Role::with('permissions')->get();
        if ($role == 'Administrator' && auth()->user()->role_id != 1) {
            abort(403);
        }

        if ($role == 'Auditor' && auth()->user()->role_id != 2) {
            abort(403);
        }

        if ($role == 'Auditee' && auth()->user()->role_id != 3) {
            abort(403);
        }

        return $next($request);
    }
}


