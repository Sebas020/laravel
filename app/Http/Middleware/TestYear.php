<?php

namespace App\Http\Middleware;

use Closure;

class TestYear
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

        $year = $request->route('year');//$request es donde vine la petición http además se llama el método reoute para validar si el parámetro si fue pasado por la url

        if(is_null($year) || $year != 2019) {//Se valida si llega el parámetro por la url para pasar a la página solicitada
            return redirect('/peliculas');//Si no se cumple la condición me va a redirigir a la url que le paso en este caso a peliculas
        }

        return $next($request);
    }
}
