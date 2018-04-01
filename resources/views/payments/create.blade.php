@extends('app.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css') }}">
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<nav aria-label="breadcrumb">
				  	<ol class="breadcrumb">
				    	<li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
				    	<li class="breadcrumb-item"><a href="{{ url('/payments/index') }}">Pagos</a></li>
				    	<li class="breadcrumb-item active" aria-current="page">Crear Pago</li>
				  	</ol>
				</nav>
			</div>
			<div class="col-12">
				<h2>Crear Pago</h2>
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
				{!! Form::open(['url' => 'payments/store', 'method' => 'post']) !!}					
				  	<div class="form-group row">
				  		{!! Form::label('user', 'Usuario', ['class' => 'col-sm-2 col-form-label']) !!}
					    <div class="col-sm-10">
					    	{!! Form::select('user_id', $data['users'], null, ['placeholder' => 'Seleccione..', 'class' => 'form-control', 'required' => 'on']) !!}
					    </div>
				  	</div>
				  	<div class="form-group row">
				  		{!! Form::label('date_at', 'Fecha', ['class' => 'col-sm-2 col-form-label']) !!}
					    <div class="col-sm-10">
					    	{!! Form::text('date_at', date('d/m/Y'), ['class' => 'form-control', 'autocomplete' => 'off', 'required' => 'on', 'data-provide' => 'datepicker', 'data-date-format' => 'dd/mm/yyyy', 'data-date-language' => 'es', 'readonly' => 'true']) !!}
					    </div>
				  	</div>
				  	<div class="form-group row">
				  		{!! Form::label('amount', 'Monto', ['class' => 'col-sm-2 col-form-label']) !!}
					    <div class="col-sm-10">
					    	{!! Form::text('amount', null, ['class' => 'form-control', 'autocomplete' => 'off', 'required' => 'on']) !!}
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

@section('scripts')
    <script src="{{ asset('assets/components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js') }}"></script>
@endsection
