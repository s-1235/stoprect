<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BeforeValidateRestorePassworkLink
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
        Log::alert("valid-",[$request->all()]);
        if ($record = DB::table('password_resets')->where('token', '=',$request->get('valid'))->first()) {
            $email = $record->email;
            Log::alert("email".$record->email);
            $request->merge(compact('email'));
            return $next($request);
        } 
        
        return response('Not valid link :(');
    }
}
