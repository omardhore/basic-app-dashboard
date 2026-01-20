<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Mail\TwoFactorCode;
use Illuminate\Support\Facades\Mail;

class TwoFactorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        if (auth()->check() && $user->two_factor_code && $user->two_factor_enabled) {

            if ($user->two_factor_expires_at->lt(now())) {
                $user->resetTwoFactorCode();
                auth()->logout();

                return redirect()->route('login')
                    ->withErrors(['two_factor_code' => 'The two factor code has expired. Please login again.']);
            }

            if (!$request->is('verify*')) {
                return redirect()->route('bs.verify.index');
            }
        }

        return $next($request);
    }
}
