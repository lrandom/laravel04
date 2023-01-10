<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Browser;

class AllowBrowserChrome
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Browser::isChrome()) {
            return redirect()->route('alert-browser');
        }
        return $next($request);
    }
}
