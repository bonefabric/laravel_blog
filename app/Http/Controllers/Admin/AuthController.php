<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

	/**
	 * @param Request $request
	 * @return RedirectResponse|void
	 */
	public function login(Request $request)
	{
		$request->validate([
			'email' => 'required|email|max:255',
			'password' => 'required|string|min:6|max:255',
		]);

		if (Auth::attempt([
			'email' => $request->input('email'),
			'password' => $request->input('password'),
		], $request->filled('remember'))) {
			return redirect()->to('admin');
		}
	}

	/**
	 * @return RedirectResponse
	 */
	public function logout(): RedirectResponse
	{
		Auth::logout();
		return redirect()->to('/');
	}

}
