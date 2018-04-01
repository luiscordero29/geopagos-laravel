@extends('app.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<nav aria-label="breadcrumb">
				  	<ol class="breadcrumb">
				    	<li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
				    	<li class="breadcrumb-item active" aria-current="page">Usuarios</li>
				  	</ol>
				</nav>
			</div>
			<div class="col-12">
				<h2>Usuarios</h2>
			</div>	
			<div class="col-12">
                @include('app.alerts')
    			@if(isset($data['rows']))
    				@php $i = 0; @endphp
    				<table class="table table-hover">
					  	<thead>
					    	<tr>
						      	<th scope="col">#</th>
						      	<th scope="col">Usuario</th>
						      	<th scope="col">Edad</th>
						      	<th scope="col"></th>
					    	</tr>
					  	</thead>
					  	<tbody>
					  		@if(sizeof($data['rows']) > 0)                                    
                                @foreach($data['rows'] as $r)
    								@php $i++; @endphp
								    <tr>
									    <th scope="row">{{ $i }}</th>
									    <td>{{ $r->user }}</td>
									    <td>{{ $r->age }}</td>
									    <td align="right">			
									    	{!! Form::open([
                                                'method'=>'delete',
                                                'url' => ['/users/delete', $r->id],
                                                'style' => 'display:inline',
                                            ]) !!}						    		
									    	<div class="btn-group-vertical">
											  	<a href="{{ url('/users/show/'.$r->id) }}" class="btn btn-info btn-sm">Ver</a>
											  	<a href="{{ url('/users/edit/'.$r->id) }}" class="btn btn-primary btn-sm">Editar</a>
				  								{!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-sm']) !!}
											</div>
                                            {!! Form::close() !!}
									    </td>
								    </tr>
								@endforeach
					  		@else
					  			<tr>
					  				<td colspan="4" align="center">No se encontraron registros</td>
					  			</tr>
					  		@endif
					  	</tbody>
					</table>
                    {{ $data['rows']->links() }}
    			@endif
			</div>
		</div>
	</div>
@endsection