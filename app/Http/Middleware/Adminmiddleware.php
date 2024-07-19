<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Adminmiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next ): Response
    {

        // ユーザーが認証されていることを確認
        // if (! $request->user()) {
        //     return redirect('login');
        // }

        // $user = Auth::user();

        
        // if($user->role_id === 1){
        //     return $next($request);
        // }else{
        //     return redirect()->back();
        // }

        if(Auth::check() && Auth::user()->role_id == 1){
            return $next($request);
        }
        return redirect()->route('index');
        



        
    }
}
