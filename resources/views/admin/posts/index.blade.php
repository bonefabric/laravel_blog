@extends('admin.templates.base')

@section('content')
	<a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create</a>
	<table class="table table-dark table-hover">
		<thead>
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Title</th>
			<th scope="col">Content</th>
			<th scope="col">Created at</th>
			<th scope="col">Updated at</th>
			<th scope="col">Deleted at</th>
		</tr>
		</thead>
		<tbody>
		@foreach($posts as $post)
			<tr>
				<td class="col-1">{{ $post['id'] }}</td>
				<td class="col-2">
					<a class="link-info" href="{{ route('posts.show', ['post' => $post['id']]) }}">
						{{ Str::limit($post['title'], 30) }}
					</a>
				</td>
				<td class="col-3">{{ Str::limit($post['content'], 100) }}</td>
				<td class="col-2">{{ $post['created_at'] }}</td>
				<td class="col-2">{{ $post['updated_at'] }}</td>
				<td class="col-2">{{ $post['deleted_at'] }}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
@endsection
