<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IdentifyTenant
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle($request, Closure $next)
{
    $slug = $request->segment(1);

    if ($slug) {
        $tenant = \App\Models\Tenant::where('slug', $slug)->first();

        if (!$tenant) {
            abort(404, 'Tenant not found');
        }

        app()->instance('tenant', $tenant);
    }

    return $next($request);
}
}
