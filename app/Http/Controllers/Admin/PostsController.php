<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
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
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
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
		$post = Post::findOrFail($id);
		return new Response(view('admin.posts.show')->with('post', $post->toArray()));
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
		$post = Post::findOrFail($id);
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
		$post = Post::findOrFail($id);
		$post->title = $request->input('title');
		$post->content = $request->input('content');
		$post->save();
		return new RedirectResponse(route('posts.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
}
