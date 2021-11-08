<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostsController extends Controller
{

	/**
	 * @return Response
	 */
	public function index(): Response
	{
		return new Response(view('admin.posts.index')->with('posts', Post::withTrashed()->get()->toArray()));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(): Response
	{
		return new Response(view('admin.posts.create'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return RedirectResponse
	 */
	public function store(Request $request): RedirectResponse
	{
		$request->validate([
			'title' => 'required',
			'content' => 'required',
		]);
		/** @var Post $post */
		$post = Post::create($request->only(['title', 'content']));
		return new RedirectResponse(route('posts.show', ['post' => $post->id]));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param int $id
	 * @return Response
	 */
	public function show(int $id): Response
	{
		/** @var Post $post */
		$post = Post::withTrashed()->findOrFail($id);
		return new Response(view('admin.posts.show')
			->with('post', $post->toArray())
			->with('tags', $post->tags()->get(['name'])->toArray()));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id
	 * @return Response
	 */
	public function edit(int $id): Response
	{
		/** @var Post $post */
		$post = Post::withTrashed()->findOrFail($id);
		return new Response(view('admin.posts.edit')->with('post', $post->toArray()));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Request $request
	 * @param int $id
	 * @return RedirectResponse
	 */
	public function update(Request $request, int $id): RedirectResponse
	{
		$request->validate([
			'title' => 'required|string',
			'content' => 'required|string'
		]);
		/** @var Post $post */
		$post = Post::withTrashed()->findOrFail($id);
		$post->title = $request->input('title');
		$post->content = $request->input('content');
		$post->save();
		return new RedirectResponse(route('posts.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Request $request
	 * @param int $id
	 * @return RedirectResponse
	 */
	public function destroy(Request $request, int $id): RedirectResponse
	{
		if ($request->input('restore')) {
			/** @var Post $post */
			$post = Post::withTrashed()->findOrFail($id);
			$post->restore();
		} else {
			Post::findOrFail($id)->delete();
		}
		return new RedirectResponse(route('posts.index'));
	}

	/**
	 * @param int $id
	 * @return Response
	 */
	public function tags(int $id): Response
	{
		/** @var Post $post */
		$post = Post::findOrFail($id);
		return new Response(view('admin.posts.tags')
			->with('tags', Tag::all())
			->with('post', $post->toArray()));
	}

	/**
	 * @param Request $request
	 * @param int $id
	 * @return RedirectResponse
	 */
	public function updateTags(Request $request, int $id): RedirectResponse
	{
		/** @var Post $post */
		$post = Post::withTrashed()->findOrFail($id);

		$tagsIds = [];
		foreach ($request->all() as $k => $param) {
			if (strpos($k, 'tag_') === 0) {
				$tagsIds[] = (int)substr($k, 4);
			}
		}
		$post->tags()->detach();
		$post->tags()->attach($tagsIds);
		return new RedirectResponse(route('posts.index'));
	}
}
