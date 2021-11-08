@extends('admin.templates.base')

@section('content')
	<form action="{{ route('tags.update', ['tag' => $tag['id']]) }}" method="post">
		<div class="mb-3">
			<label for="inputName" class="form-label">Name</label>
			<input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName"
			       value="{{ $tag['name'] }}" name="name">
			@error('name')
			<div class="invalid-feedback">
				{{ $message }}
			</div>
			@enderror
		</div>
		@csrf
		@method('patch')
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection
