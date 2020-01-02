<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    public function index($pagina = 1) {
    	$titulo = 'Listado de mis peliculas';

    	return view('pelicula.index', [
    		'titulo' => $titulo,
    		'pagina' => $pagina
    	]);
    }

    public function detalle($year = null) {

    	return view('pelicula.detalle');//Para agregar la vista primero ponemos si esta en una carpeta después el punto(.) y el nombre de la vista
    }

    public function redirigir() {

		return redirect()->route('detalle.pelicula');//Redirigir utilizando el método route
    	//return redirect('/peliculas');//Redirigir a una ruta especifica
    	//return redirect()->action('PeliculaController@detalle');//Redirigir a una acción del controlador
    }

    public function formulario() {
    	return view('pelicula.formulario');
    }

    public function recibir(Request $request) {
        

    }
}
