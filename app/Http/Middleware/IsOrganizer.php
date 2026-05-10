<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsOrganizer
{
   public function handle(Request $request, Closure $next): Response
{
    if (!auth()->check() || !auth()->user()->is_organizer) {
        abort(403, 'Access denied. Organizers only.');
    }

    return $next($request);
}
}