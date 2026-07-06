<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            abort(403, 'Unauthorized');
        }

        $role = auth()->user()->getRoleNames()->first(); // using spatie method

        // Define allowed roles here
        if (in_array($role, ['admin', 'super admin','customer'])) {
            return $next($request);
        }

        abort(403, 'You do not have access to this resource.');
    }
}
