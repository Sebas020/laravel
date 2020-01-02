@extends('layouts.master')<!--Heredar la plantillas-->
<!--Aquí se modifican las cabeceras puesta como variables en master.blade, se les añade contenido-->
@section('titulo', 'Master en php')

@section('header')
@parent() <!--También podemos añadir mas contenido evitando que se modifique la plantilla padre con el parent-->
<h2>Hola</h2>
@stop

@section('content')
	<h1>Contenido de la página generica</h1>
@stop