<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class VisitorMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (Session::get('visitor_id')) {
            return $next($request);
        } else {
            return redirect('/');
        }
    }

}
