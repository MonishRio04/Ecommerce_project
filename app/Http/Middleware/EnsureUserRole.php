<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd($request->all());
        $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required',
        ]);
        $user=User::where('email',$request->email)->first();
        // dd($user->role==1);

        if((int)$user->role==3){            
            return $next($request);
        }      
        
        elseif((int)$user->role==1||(int)$user->role==2){
            return $next($request);
        }
        else{
            return back()->with('admin',"*Invalid login details");
        }
    }
}
