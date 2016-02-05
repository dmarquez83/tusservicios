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

        if(auth()->user()->id_tipo_usuario != '2'){
            $message = 'Permiso denegado: Solo los Usuarios pueden entrar a esta sección';
            return redirect()->route('home')->with('message', $message);
        }


        return $next($request);
    }
}
