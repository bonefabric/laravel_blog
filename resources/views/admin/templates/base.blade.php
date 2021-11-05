@extends('templates.base')

@section('body')
	@include('admin.templates.navbar')
	<div class="container">
		@yield('content')
	</div>
@endsection
