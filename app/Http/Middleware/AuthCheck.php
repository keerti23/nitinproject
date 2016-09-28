<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthCheck {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
        public function handle($request, Closure $next)
    {
        if (!Auth::admin()->check()){
            return Redirect::route('admin.login');
        }

        return $next($request);
    }

}
