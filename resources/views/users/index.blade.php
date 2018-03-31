@extends('app.app')


@section('content')
	<div class="container">
		<div class="row">
			<div class="col">
				<nav aria-label="breadcrumb">
				  	<ol class="breadcrumb">
				    	<li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
				    	<li class="breadcrumb-item active" aria-current="page">Usuarios</li>
				  	</ol>
				</nav>
			</div>
			<div class="col">
				<h2>Crud de Usuarios</h2>
				<small>Lista de Usuarios</small>
			</div>	
			<div class="col">
    			@if(isset($data['rows']))
    				<table class="table table-hover">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">First</th>
					      <th scope="col">Last</th>
					      <th scope="col">Handle</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      <th scope="row">1</th>
					      <td>Mark</td>
					      <td>Otto</td>
					      <td>@mdo</td>
					    </tr>
					    <tr>
					      <th scope="row">2</th>
					      <td>Jacob</td>
					      <td>Thornton</td>
					      <td>@fat</td>
					    </tr>
					    <tr>
					      <th scope="row">3</th>
					      <td colspan="2">Larry the Bird</td>
					      <td>@twitter</td>
					    </tr>
					  </tbody>
					</table>
    			@endif
			</div>
		</div>
	</div>
@endsection