<h1>{{$titulo}}</h1>
<p>(Acción index del controlador PeliculasController)</p>

@if(isset($pagina))
	<h3>la pagina es: {{$pagina}}</h3>
@endif

<a href="{{ route('detalle.pelicula')}}">Ir al detalle</a><!--Crear enlaces que llevan a la acción de un controlador 
<a href="{{ route('detalle.pelicula', ['id' => 12])}}">Ir al detalle</a>----con route además de pasarle un parámetro por url-->