<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Titulo - @yield('titulo')</title>
</head>
<body>
	@section('header') <!--Con section si tengo un contenido predeterminado-->
		<h1>CABECERA DE LA WEB (master)</h1>
	@show
	<hr>
	<div class="container">
		@yield('content') <!--Variable a sustituir con yield no tengo un contenido predeterminado-->
	</div>
	<hr>
	@section('footer')
		PIE DE LA PÁGINA DE LA WEB (master)
	@show
</body>
</html>