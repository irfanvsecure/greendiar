<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

// Shows the under construction page on the live domain while site.under_construction is on.
// Local copies (localhost) keep serving the full site.
class UnderConstruction
{
    public function handle(Request $request, Closure $next): Response
    {
        $live = preg_match('/(^|\.)greendiar\.ae$/i', $request->getHost());

        if (config('site.under_construction') && $live) {
            // 503 + Retry-After tells search engines the page is down only for now.
            return response()->view('under-construction', [], 503)->header('Retry-After', '86400');
        }

        return $next($request);
    }
}
