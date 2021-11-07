@extends('admin.templates.base')

@section('content')
	<form action="{{ route('posts.update', ['post' => $post['id']]) }}" method="post">
		<div class="mb-3">
			<label for="inputTitle" class="form-label">Title</label>
			<input type="text" class="form-control @error('title') is-invalid @enderror" id="inputTitle"
			       value="{{ $post['title'] }}" name="title">
			@error('title')
			<div class="invalid-feedback">
				{{ $message }}
			</div>
			@enderror
		</div>
		<div class="mb-3">
			<label for="inputContent" class="form-label">Content</label>
			<textarea class="form-control @error('content') is-invalid @enderror" id="inputContent" rows="20"
			          name="content">{{ $post['content'] }}</textarea>
			@error('content')
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
