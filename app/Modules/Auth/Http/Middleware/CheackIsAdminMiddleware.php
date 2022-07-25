<?php

namespace Modules\Auth\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cheack_is_admin_Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\User isAdmin
     * @param  auth
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {if(auth::user()->isAdmin==1)
        return $next($request);
    }else{
        return response()->json([
            "status"=>true,
            "massage"=>"not permissian"
        ],403);
    }
}

