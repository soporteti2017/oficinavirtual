<html>
<head>
	<meta charset="UTF-8">
	<title>
		@yield('titulo', 'Inicio') | OficinaVirtual
	</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
</head>
	
	<body>
		@include('intranet.template.partials.nav')

		<section>
			<div class="row">
			<div class="col-md-1"></div>
  			<div class="col-md-10">
				@include('flash::message')
				@yield('contenido')
			</div>
			<div class="col-md-1"></div>
			</div>

		</section>

		<script type="text/javascript" src="{{ asset('plugins/jquery/js/jquery-3.1.1.js') }}"></script>
		<script type="text/javascript" src="{{ asset('plugins/jquery/js/bootbox.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
		
	</body>

</html>