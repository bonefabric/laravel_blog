@extends('admin.templates.base')

@section('content')
	<form method="post" action="{{ route('posts.updateTags', ['post' => $post['id']]) }}">
		<h3>Post: {{ Str::limit($post['title'], 30) }}</h3>
		<p>Tags:</p>
		@foreach($tags as $tag)
			<div class="form-check">
				<input class="form-check-input" type="checkbox" value="" id="{{ $tag['id'] . 'check' }}" name="tag_{{ $tag['id'] }}">
				<label class="form-check-label" for="{{ $tag['id'] . 'check' }}">
					{{ $tag['name'] }}
				</label>
			</div>
		@endforeach
		@csrf
		<button type="submit" class="btn btn-primary mt-3">Submit</button>
	</form>
@endsection
