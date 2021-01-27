<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Sanitizer
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $userInput = $request->input();

        if (isset($userInput['email'])) {
            $userInput['email'] = strtolower($userInput['email']);
        }

        $request->merge($userInput);

        return $next($request);
    }
}
