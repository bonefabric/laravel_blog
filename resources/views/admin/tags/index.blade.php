@extends('admin.templates.base')

@section('content')
	<a href="{{ route('tags.create') }}" class="btn btn-primary mb-3">Create</a>
	<table class="table table-dark table-hover">
		<thead>
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Name</th>
			<th scope="col">Created at</th>
			<th scope="col">Updated at</th>
			<th scope="col">Deleted at</th>
		</tr>
		</thead>
		<tbody>
		@foreach($tags as $tag)
			<tr>
				<td class="col-1">{{ $tag['id'] }}</td>
				<td class="col-2">
					<a class="link-info" href="{{ route('tags.show', ['tag' => $tag['id']]) }}">
						{{ Str::limit($tag['name'], 30) }}
					</a>
				</td>
				<td class="col-2">{{ $tag['created_at'] }}</td>
				<td class="col-2">{{ $tag['updated_at'] }}</td>
				<td class="col-2">{{ $tag['deleted_at'] }}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
@endsection
