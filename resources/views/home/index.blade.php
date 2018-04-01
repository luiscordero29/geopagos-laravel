@extends('app.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<nav aria-label="breadcrumb">
				  	<ol class="breadcrumb">
				    	<li class="breadcrumb-item active" aria-current="page">Home</li>
				  	</ol>
				</nav>
			</div>
			<div class="col-12">
				<a href="{{ url('users/index') }}" class="btn btn-primary btn-lg">USUARIOS</a>
				<a href="{{ url('users/index') }}" class="btn btn-primary btn-lg">FAVORITOS</a>
				<a href="{{ url('users/index') }}" class="btn btn-primary btn-lg">PAGOS</a>
            </div>
		</div>
	</div>
@endsection