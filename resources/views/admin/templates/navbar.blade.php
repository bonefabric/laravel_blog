<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
	<div class="container">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link{{ Route::is('admin') ? ' active' : '' }}" href="{{ url('admin') }}">Main</a>
			</li>
			<li class="nav-item">
				<a class="nav-link{{ Route::is('posts.index') ? ' active' : '' }}" href="{{ route('posts.index') }}">Posts</a>
			</li>
			<li class="nav-item">
				<a class="nav-link{{ Route::is('tags.index') ? ' active' : '' }}" href="{{ route('tags.index') }}">Tags</a>
			</li>
		</ul>
		<div class="navbar-nav">
			<form action="{{ route('logout') }}" method="post">
				@csrf
				<button class="btn btn-primary">Logout</button>
			</form>
		</div>
	</div>
</nav>
