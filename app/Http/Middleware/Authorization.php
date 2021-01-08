<?php
namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use function PHPUnit\Framework\throwException;

class Authorization
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
        if(auth()->user()->authorized === 1) {
            return $next($request);
        } else {
            return redirect('logout')->with('error', "Vous n'avez pas les droits");
        }
    }
}
