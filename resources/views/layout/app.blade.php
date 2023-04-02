<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BASE APP FNB</title>
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap-5.3.0-alpha1-examples/assets/dist/css/bootstrap.min.css')}}">
	<style type="text/css"></style>
	@stack('csss')
</head>
<body>
	@include('layout.nav')
	<div class="container-fluid mt-4">
		@yield('content')
	</div>
	<script src="{{asset('bootstrap-5.3.0-alpha1-examples/assets/dist/js/bootstrap.bundle.min.js')}}"></script>
	@stack('jss')
</body>
</html>