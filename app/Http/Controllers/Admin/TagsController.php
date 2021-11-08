<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TagsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 * @return Response
	 */
	public function index(): Response
	{
		return new Response(view('admin.tags.index')->with('tags', Tag::withTrashed()->get()->toArray()));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(): Response
	{
		return new Response(view('admin.tags.create'));
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
			'name' => 'required',
		]);
		/** @var Tag $tag */
		$tag = Tag::create($request->only(['name']));
		return new RedirectResponse(route('tags.show', ['tag' => $tag->id]));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param int $id
	 * @return Response
	 */
	public function show(int $id): Response
	{
		$tag = Tag::withTrashed()->findOrFail($id);
		return new Response(view('admin.tags.show')->with('tag', $tag->toArray()));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id
	 * @return Response
	 */
	public function edit(int $id): Response
	{
		$tag = Tag::withTrashed()->findOrFail($id);
		return new Response(view('admin.tags.edit')->with('tag', $tag->toArray()));
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
			'name' => 'required',
		]);
		$tag = Tag::withTrashed()->findOrFail($id);
		$tag->name = $request->input('name');
		$tag->save();
		return new RedirectResponse(route('tags.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id
	 * @return RedirectResponse
	 */
	public function destroy(Request $request, int $id): RedirectResponse
	{
		if ($request->input('restore')) {
			/** @var Tag $tag */
			$tag = Tag::withTrashed()->findOrFail($id);
			$tag->restore();
		} else {
			Tag::findOrFail($id)->delete();
		}
		return new RedirectResponse(route('tags.index'));
	}
}
