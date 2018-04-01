@extends('app.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<nav aria-label="breadcrumb">
				  	<ol class="breadcrumb">
				    	<li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
				    	<li class="breadcrumb-item"><a href="{{ url('/payments/index') }}">Pagos</a></li>
				    	<li class="breadcrumb-item active" aria-current="page">Ver Pago</li>
				  	</ol>
				</nav>
			</div>
			<div class="col-12">
				<h2>Ver Pago</h2>
			</div>	
			<div class="col-12">
				<dl>
				  	<dt>ID</dt>
				  	<dd>{{ $data['row']->id }}</dd>
				  	<dt>Usuario</dt>
				  	<dd>
				  		ID: {{ $data['row']->userpayment->user->id }} <br />
				  		Usuario: {{ $data['row']->userpayment->user->user }} <br />
				  		Contraseña: {{ $data['row']->userpayment->user->password }} <br />
				  		Edad: {{ $data['row']->userpayment->user->age }} 
				  	</dd>
				  	<dt>Fecha</dt>
				  	<dd>
				  		{{ date_format(date_create($data['row']->date_at), 'd/m/Y') }}
				  	</dd>
				  	<dt>Monto</dt>
				  	<dd>
				  		{{ $data['row']->amount }}
				  	</dd>
				</dl>
			</div>
		</div>
	</div>
@endsection