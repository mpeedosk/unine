<?php

namespace App\Http\Middleware;

use App\Log;
use Closure;

class LogOwner
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
        $logOwner_id = $request->route()->getParameter('log')->user_id;
        $user_id = $request->user()->id;

        if($user_id != $logOwner_id){
            return redirect('/unelogi');
        }
        return $next($request);
    }
}
