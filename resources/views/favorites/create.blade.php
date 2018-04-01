@extends('app.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<nav aria-label="breadcrumb">
				  	<ol class="breadcrumb">
				    	<li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
				    	<li class="breadcrumb-item"><a href="{{ url('/favorites/index') }}">Favoritos</a></li>
				    	<li class="breadcrumb-item active" aria-current="page">Crear Favorito</li>
				  	</ol>
				</nav>
			</div>
			<div class="col-12">
				<h2>Crear Favorito</h2>
			</div>	
			<div class="col-12">
				@if ($errors->any())
				    <div class="alert alert-danger" role="alert">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif
                @include('app.alerts')
				{!! Form::open(['url' => 'favorites/store', 'method' => 'post']) !!}					
				  	<div class="form-group row">
				  		{!! Form::label('user', 'Usuario', ['class' => 'col-sm-2 col-form-label']) !!}
					    <div class="col-sm-10">
					    	{!! Form::select('user_id', $data['users'], null, ['placeholder' => 'Seleccione..', 'class' => 'form-control', 'required' => 'on']) !!}
					    </div>
				  	</div>
				  	<div class="form-group row">
				  		{!! Form::label('favorite_id', 'Favorito', ['class' => 'col-sm-2 col-form-label']) !!}
					    <div class="col-sm-10">
					    	{!! Form::select('favorite_id', $data['users'], null, ['placeholder' => 'Seleccione..', 'class' => 'form-control', 'required' => 'on']) !!}
					    </div>
				  	</div>
				  	<div class="form-group row">
				  		<div class="col text-right">
				  			{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
				  		</div>
				  	</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection