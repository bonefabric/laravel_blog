@extends('templates.base')

@section('body')
	<div class="container">
		<form class="mt-5 col-6 offset-3" method="post" action="{{ url('login') }}">
			<div class="mb-3">
				<label for="inputEmail" class="form-label">Email address</label>
				<input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail"
				       name="email">
				@error('email')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
			<div class="mb-3">
				<label for="inputPassword" class="form-label">Password</label>
				<input type="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword"
				       name="password">
				@error('password')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
			<div class="mb-3 form-check">
				<input type="checkbox" class="form-check-input" id="inputCheck" name="remember">
				<label class="form-check-label" for="inputCheck">Check me out</label>
			</div>
			@csrf
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
@endsection
