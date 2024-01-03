<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use WireUi\Traits\Actions;

class AdminLevelAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $level): Response
    {
        if ($request->user()->level_access == $level) {
            return $next($request);
        }else{
            return redirect()->back();
        }
    }
}
