@extends('layouts.app')

@section('titulo', 'Estados de conexiones')

@section('content')

	<div class="row">

	    <div class="col-md-2">
	        <div class="panel panel-default">

		        <div class="panel-body">
		        	<div class="panel panel-default" id="sidebar" >
			            <div class="panel-heading" style="background-color:#207ce5;color:#fff;" data-target="#test">@yield('titulo')  | OficinaVirtual</div> 
			            	<div class="panel-body" id="test">
			            		@include('intranet/template/partials/nav-vertical')
			            	</div>	
			        </div>		
			    </div>    
		    </div>
		</div>
		 <div class="col-md-10">	

		 	<div class="panel panel-default">

<a href="{{ route('clientes.create') }}" class="btn btn-info">Crear cliente</a>

{!! Form::open(['route' => 'clientes.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}

<div class="input-group">
	{!! Form::text('name',null,['class' => 'form-control', 'placeholder' => '','aria-describedby' => 'search']) !!}
	<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
</div>

{!! Form::close() !!}

<br>
<br>
<table class="table table-striped">
	<thead>
		<th>ID</th>
		<th>Nombres</th>
		<th>Apellido paterno</th>
		<th>Apellido materno</th>
		<th>RUT</th>
		<th>E-mail</th>
		<th>Acción</th>
	</thead>

	<tbody>
		@foreach($clientes as $cliente)
			<tr>
			<td>{{ $cliente->id }}</td>
			<td>{{ $cliente->nombres }}</td>
			<td>{{ $cliente->paterno }}</td>
			<td>{{ $cliente->materno }}</td>
			<td>{{ $cliente->rut }}</td>
			<td>{{ $cliente->email }}</td>
			<td><a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning">Modificar</a> <a href="{{ route('clientes.destroy', $cliente->id) }}" onclick="return confirm(¿Esta seguro de que desea eliminar al cliente?)" class="btn btn-danger">Eliminar</a></td>
			</tr>
		@endforeach
	</tbody>
</table>

{!! $clientes->render() !!}

		        </div>
		    </div>    	
    	</div>
	</div>


@endsection