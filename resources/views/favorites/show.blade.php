@extends('app.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<nav aria-label="breadcrumb">
				  	<ol class="breadcrumb">
				    	<li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
				    	<li class="breadcrumb-item"><a href="{{ url('/favorites/index') }}">Favoritos</a></li>
				    	<li class="breadcrumb-item active" aria-current="page">Ver Favorito</li>
				  	</ol>
				</nav>
			</div>
			<div class="col-12">
				<h2>Ver Favorito</h2>
			</div>	
			<div class="col-12">
				<dl>
				  	<dt>ID</dt>
				  	<dd>{{ $data['row']->id }}</dd>
				  	<dt>Usuario</dt>
				  	<dd>
				  		ID: {{ $data['row']->user->id }} <br />
				  		Usuario: {{ $data['row']->user->user }} <br />
				  		Contraseña: {{ $data['row']->user->password }} <br />
				  		Edad: {{ $data['row']->user->age }} 
				  	</dd>
				  	<dt>Favorito</dt>
				  	<dd>
				  		ID: {{ $data['row']->favorite->id }} <br />
				  		Usuario: {{ $data['row']->favorite->user }} <br />
				  		Contraseña: {{ $data['row']->favorite->password }} <br />
				  		Edad: {{ $data['row']->favorite->age }} 
				  	</dd>
				</dl>
			</div>
		</div>
	</div>
@endsection