<?php

namespace App\Http\Middleware;

use Closure;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // return $next($request);
        $actions = array_slice(func_get_args(), 2);
        foreach($actions as $action){
            $access = \Auth::user();

            if(!empty($access)){
                if($action == $access->access && $access->status == '1'){
                    return $next($request);
                }
            }
        }
        abort(403);
    }
}
