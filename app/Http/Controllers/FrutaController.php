<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//Para crear un controlador desde la cosola se lanza el comando: php artisan make:controller NameController
class FrutaController extends Controller
{
    public function index(){
    	$frutas = DB::table('frutas')
    			->orderBy('id', 'desc')
    			->get();//Comando para ejecutar una consulta select a la base de datos dandole el nombre de la tabla, y llamando al método que queremos, trabajando con el queryBilder de laravel, Este comando es como hacer un select * from frutas, el cuál devuelve un array de objetos.

    	return view('fruta.index', [
    		'frutas' => $frutas
    	]);//llamar a la vista dentro de la carpeta fruta y al archivo index, y pasarle el array para tenerlo diponible a recorrer en la vista


    }
    public function detail($id) {
    	$fruta = DB::table('frutas')->where('id', '=', $id)->first();//Este método es para realizar una consulta con where pide tres parámetros, el primero es el campo que quiero evaluar, el segundo el operador y el tercero el valor con el cuál quiero evaluar, si no se hace el get no va a sacar los datos de db, pero en vez de get utilizamos first para sacar un elemento limpio
    	
    	return view('fruta.detail', [
    		'fruta' => $fruta
    	]);
    }

    public function create() {

    	return view('fruta.create');
    }

    public function save(Request $request) {
    	//guardar el registro

    	$fruta = DB::table('frutas')->insert(array(
    		'nombre' => $request->input('nombre'),
    		'descripcion' => $request->input('descripcion'),
    		'precio' => $request->input('precio'),
    		'fecha' => date('Y-m-d')
    	));

    	return redirect()->action('FrutaController@index')->with('status', 'Fruta creada correctamente');//con el with se pasa una sesión flash que sólo se muestra una vez
    }

    public function delete($id) {

    	$fruta = DB::table('frutas')->where('id', $id)->delete();
    	return redirect()->action('FrutaController@index')->with('status', 'Fruta borrada correctamente');
    }

    public function edit($id) {
    	//Sacar el registro de la base de datos
    	$fruta = DB::table('frutas')->where('id', $id)->first();
    	//pasarle a la vista el objeto y rellenar el formulario
    	return view('fruta.create',[
    		'fruta' => $fruta
    	]);

    }

    public function update(Request $request) {
    	$id = $request->input('id');
    	$fruta = DB::table('frutas')->where('id', $id)
    								->update(array(
    									'nombre' => $request->input('nombre'),
    									'descripcion' => $request->input('descripcion'),
    									'precio' => $request->input('precio')
    								));
    	return redirect()->action('FrutaController@index')->with('status', 'Fruta actualizada correctamente');

    }
}
