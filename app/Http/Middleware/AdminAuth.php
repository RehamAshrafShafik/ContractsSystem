<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $path=($request->path());
        // dd(session()->all() );

        if (($path=="Home") && (Session::has('user')))
        {
        
            return $next($request);
        }     
        if (($path=="Home") && (Session::has('user')==false))
        {
            //   dd('hdfd');
            return redirect("/");
        } 
      
        else if (($path=="/") && (Session::has('user')))   
        {
           
            return redirect()->route('Home');
        }
  
    
         return $next($request);
    }
}
