<html>
    <head>
    </head>
    <body>

    	<h1>{{ $titulo }}</h1>

        @section('sidebar')
            Esta es la vista profesiones
        @show

        <div class="container">
            @yield('content')
        </div>

		<div class="alert alert-danger">
		</div>
    </body>
</html>