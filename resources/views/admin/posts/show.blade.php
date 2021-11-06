@extends('admin.templates.base')

@section('content')
	<div class="card">
		<h5 class="card-header">
			<a href="#" class="btn btn-primary">Edit</a>
			<a href="#" class="btn btn-primary">Delete</a>
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
