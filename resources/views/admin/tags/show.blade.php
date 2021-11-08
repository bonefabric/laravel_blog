@extends('admin.templates.base')

@section('content')
	<div class="card">
		<h5 class="card-header">
			<a href="{{ route('tags.edit', ['tag' => $tag['id']]) }}" class="btn btn-primary">Edit</a>
			<form action="{{ route('tags.destroy', ['tag' => $tag['id']]) }}" method="post" class="d-inline">
				@if($tag['deleted_at'])
					<input type="hidden" name="restore" value="1">
				@endif
				@method('delete')
				@csrf
				<button class="btn btn-primary" type="submit">{{ $tag['deleted_at'] ? 'Restore' : 'Delete' }}</button>
			</form>
		</h5>
		<div class="card-body">
			<p class="card-text">Created at: {{ $tag['created_at'] }}</p>
			<p class="card-text">Updated at: {{ $tag['updated_at'] }}</p>
			<p class="card-text">Deleted at: {{ $tag['deleted_at'] }}</p>
			<p class="card-text">
				{{ $tag['name'] }}
			</p>
		</div>
	</div>
@endsection
