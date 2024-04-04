<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;


class EtudiantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            if(Auth::user()->type == 'etudiant')
            {
                $etudiant=Auth::user()->userable;
                View::share('etudiant',$etudiant);
               // $request->attributes->add(['etudiant'=>$etudiant]);
                return $next($request);
            }
            else {
                Auth::logout();
            return redirect(url('/'));
            }
            
            }else{ Auth::logout();
            return redirect(url('/'));
        }    }
}
