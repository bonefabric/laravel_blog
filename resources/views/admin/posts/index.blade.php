@extends('admin.templates.base')

@section('content')
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
				<td class="col-2">{{ $post['title'] }}</td>
				<td class="col-3">{{ substr($post['content'], 0, 100) . '...' }}</td>
				<td class="col-2">{{ $post['created_at'] }}</td>
				<td class="col-2">{{ $post['updated_at'] }}</td>
				<td class="col-2">{{ $post['deleted_at'] }}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
@endsection
