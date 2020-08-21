<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> @yield('title')</title>
    <link href="/{!! url('public/css/bootstrap.min.css') !!}" type="text/css" rel="stylesheet" />
	<link href="/{!! url('public/css/dataTables.bootstrap.min.css') !!}" type="text/css" rel="stylesheet" />
	<link href="/{!! url('public/css/bootstrap-custom.css') !!}" type="text/css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        @section('content')
        @show
    </div>
	<script type="text/javascript" src="/{!! url('public/js/jquery.min.js') !!}"></script>
	<script type="text/javascript" src="/{!! url('public/js/bootstrap.min.js') !!}"></script>
	<script type="text/javascript" src="/{!! url('public/js/jquery.dataTables.min.js') !!}"></script>
	<script type="text/javascript" src="/{!! url('public/js/dataTables.bootstrap.min.js') !!}"></script>
</body>
</html>