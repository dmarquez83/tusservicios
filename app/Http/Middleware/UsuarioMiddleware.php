<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class UsuarioMiddleware
{
    protected $authusuario;
    /**
     * Create a new filter instance.
     *
     * @param  Guard  $authusuario
     * @return void
     */

    public function __construct(Guard $authusuario)
    {
        $this->authusuario = $authusuario;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->authusuario->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('auth/login');
            }
        }

        return $next($request);
    }
}
