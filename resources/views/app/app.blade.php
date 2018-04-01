<!doctype html>
<html lang="en">
  	<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/components/bootstrap/dist/css/bootstrap.min.css') }}">
    <title>luiscordero29 - https://luiscordero29.com/</title>
    @yield('styles')
  	</head>
<body>
 	<nav class="navbar navbar-expand-lg navbar-light bg-light">
 		<div class="container">
	  		<a class="navbar-brand" href="{{ url('/') }}">Examen Framework</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			</button>
	  		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav mr-auto">
			      	<li class="nav-item">
			        	<a class="nav-link" href="{{ url('/') }}" >Inicio</a>
			      	</li>
			      	<li class="nav-item">
			        	<a class="nav-link" href="http://luiscordero29.com/">Web</a>
			      	</li>
			      	<li class="nav-item">
			        	<a class="nav-link" href="https://www.linkedin.com/in/luiscordero29">Linkedin</a>
			      	</li>
			      	<li class="nav-item">
			        	<a class="nav-link" href="https://github.com/luiscordero29/">Github</a>
			      	</li>
			    </ul>
	  		</div>
  		</div>
	</nav>
	<br />
	@yield('content')
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('assets/components/jquery/dist/jquery.slim.min.js') }}"></script>
    <script src="{{ asset('assets/components/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	@yield('scripts')
  </body>
</html>