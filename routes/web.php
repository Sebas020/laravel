<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

Un middleware es un componente que tiene laravel que nos permite filtrar las peticiones que nosotros hacemos mediante http
Lo que significa que este es una clase php que nos permite validar o hacer cierta lógica antes de mostrar una página o antes que se ejecute la acción de un controlador por lo cual podemos evaluar ciertas cosas cierta lógica antes de mostrar la página
|
*/

Route::get('/', function () {
    echo "<h1>Hola mundo</h1>";;
});

Route::get('/peliculas/{pagina?}', 'PeliculaController@index');//Pasar un controlador y una acción por el route pra cargar la vista en la url es igual que hacer la función de calvac que hacemos abajo sólo que aca ya estaría en el controlador, igual podemos recibir parámetro por la url igual que antes sólo que el parámetro lo recibimos en la función del controlador

Route::get('/detalle/{year?}', [//Colocarle un alias a la url para usarla dentro del código ejemplo en pelicula/index.blade.php
	'middleware' => 'testyear',//Pasar un middleware a la url 
	'uses' => 'PeliculaController@detalle',
	'as'   => 'detalle.pelicula'

]);


Route::get('redirigir', 'PeliculaController@redirigir');
//Crear ruta de tipo resource, para que el controlador cree automaticamente los metodos y no tener que crear uno por uno

Route::get('/formulario', 'PeliculaController@formulario');
Route::post('/recibir', 'PeliculaController@recibir');

Route::resource('usuario', 'UsuarioController');

//Rutas de fruta

Route::group(['prefix' => 'frutas'], function(){//Crear un grupo, para tener siempre el mismo prefijo las url de en este caso frutas
	Route::get('index', 'FrutaController@index');
	Route::get('detail/{id}', 'FrutaController@detail');
	Route::get('crear', 'FrutaController@create');
	Route::post('save', 'FrutaController@save');
	Route::get('delete/{id}', 'FrutaController@delete');
	Route::get('editar/{id}', 'FrutaController@edit');
	Route::post('update', 'FrutaController@update');


});




/*
Route::get('/mostrar-fecha', function(){
	$titulo = "Estoy mostrando la fecha";
	return view('mostrar-fecha', array(
		'titulo' => $titulo
	));
});

Route::get('/pelicula/{titulo}/{year?}', function($titulo = 'no hay una pelicula seleccionada', $year = 2019){//pasar parámetros por la url, cuando el parámetro tiene un sigo de interrogación (?) significa que este no es obligatorio
	return view('pelicula', array(//Definir el parámetro que se va a pasar por la url
		'titulo' => $titulo,
		'year' =>$year
	));
}) ->where(array(//Hacer condicionales con los parámetros que se pasan por la url
	'titulo' => '[a-zA-Z]+',
	'year' => '[0-9]+'//Uso de expresiones regulares para crear las condiciones
));

Route::get('/listado-peliculas', function(){
	$titulo = "Listado de peliculas";
	$listado = array('Batman', 'Spiderman', 'Gran torino');
	return view('peliculas.listado')
			-> with('titulo', $titulo)//Para encontrar una vista dentro de una carpeta se hace con el punto, también se pueden pasar variables a las vistas con el método with
			->with('listado', $listado);
});

Route::get('/pagina-generica', function(){

	return view('pagina');
});
*/