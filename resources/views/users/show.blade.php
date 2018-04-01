@extends('app.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<nav aria-label="breadcrumb">
				  	<ol class="breadcrumb">
				    	<li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
				    	<li class="breadcrumb-item"><a href="{{ url('/users/index') }}">Usuarios</a></li>
				    	<li class="breadcrumb-item active" aria-current="page">Ver Usuario</li>
				  	</ol>
				</nav>
			</div>
			<div class="col-12">
				<h2>Ver Usuario</h2>
			</div>	
			<div class="col-12">
				<dl>
				  	<dt>ID</dt>
				  	<dd>{{ $data['row']->id }}</dd>
				  	<dt>Usuario</dt>
				  	<dd>{{ $data['row']->user }}</dd>
				  	<dt>Contraseña</dt>
				  	<dd>{{ $data['row']->password }}</dd>
				  	<dt>Edad</dt>
				  	<dd>{{ $data['row']->age }}</dd>
				</dl>
			</div>
		</div>
	</div>
@endsection