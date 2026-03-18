<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AuthMember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
       $member = auth()->guard('member')->user();

        if (!$member) {

            // 🔥 SIMPAN URL TUJUAN
            session(['url.intended' => $request->fullUrl()]);

            Session::flash('error', 'Silakan login terlebih dahulu.');

            return redirect('/user/login');
        }

        return $next($request);
    }
}
