@extends('layouts.app')

@section('titulo', 'Usuarios')

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

		 		
		        		{{-- BUSCADOR --}}
		        			{!! Form::open(['route' => 'usuarios.index', 'method' => 'GET', 'class' => 'navbar-form pull-right'])  !!}
		        				<div class="input-group">
		        					{!! Form::text('usuario', null, ['class' => 'form-control', 'placeholder' => 'Buscar usuario...', 'aria-describedby' => 'search'])  !!}
		        					 <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-search" id="search" aria-hidden="true"></span>
		        					<span></span>
		        				</div>
		        			{!! Form::close() !!}
		        			<hr>
		        		{{-- FIN BUSCADOR --}}

		        <div class="panel-body">
		        		<div class="table-responsive">
						  <table class="table table-striped">
						    <thead>
						    	<th> USUARIO </th>
						    	<th> NOMBRE </th>
						    	<th> RUT </th>
						    	<th> CORREO </th>
						    	<th> TIPO </th>
						    	<th> ACCION </th>
						    </thead>
						    <tbody>
						    	@foreach($usuarios as $usuario)
						    		<tr>
							    		<td> {{ $usuario->usuario }} </td>
							    		<td> {{ $usuario->nombre }} </td>
							    		<td> {{ $usuario->rut }} </td>
							    		<td> {{ $usuario->email }} </td>
							    		<td> 
							    			@if($usuario->administrador == 1)
							    				<span class="label label-primary">Administrador</span>
							    			@else
							    				<span class="label label-success">Usuario</span>	
							    			@endif
							    		</td>
							    		<td>
							    			<a href="{{ route('usuarios.destroy', $usuario->id) }}" onclick="return confirm('¿Seguro de desea eliminarlo?')" class="btn btn-danger"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>  </a>
							    			<a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning"> <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>  </a>
							    		</td>	
							    	</tr>	
						    	@endforeach
						    </tbody>	
						  </table>
					  	</div>
						  <center>
						  	<a href="{{ route('usuarios.create') }}" class="btn btn-success"> Agregar Nuevo Usuario </a> <br>
						  </center>	
					  <br>
					  <center>
					  {{ $usuarios->render() }}
					  </center>
		        </div>
		    </div>    	
    	</div>
	</div>

@endsection