@extends('admin.templates.base')

@section('content')
	<div class="card">
		<h5 class="card-header">
			<a href="{{ route('posts.edit', ['post' => $post['id']]) }}" class="btn btn-primary">Edit</a>
			<a href="{{ route('posts.tags', ['post' => $post['id']]) }}" class="btn btn-primary">Tags</a>
			<form action="{{ route('posts.destroy', ['post' => $post['id']]) }}" method="post" class="d-inline">
				@if($post['deleted_at'])
					<input type="hidden" name="restore" value="1">
				@endif
				@method('delete')
				@csrf
				<button class="btn btn-primary" type="submit">{{ $post['deleted_at'] ? 'Restore' : 'Delete' }}</button>
			</form>
		</h5>
		<div class="card-body">
			<p class="card-text">Created at: {{ $post['created_at'] }}</p>
			<p class="card-text">Updated at: {{ $post['updated_at'] }}</p>
			<p class="card-text">Deleted at: {{ $post['deleted_at'] }}</p>
			<h5 class="card-title">{{ $post['title'] }}</h5>
			<p class="card-text">
				{{ $post['content'] }}
			</p>
		</div>
	</div>
@endsection
