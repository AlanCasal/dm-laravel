<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class UserController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function index()
	{
		return view('auth.users.index')
			->with(['data' => request()->query()])
			->with(['users' => User::paginate(30)]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 */
	public function create()
	{
		//return view('auth.users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'username'         => ['required', Rule::unique('users'), 'min:4', 'alpha_num'],
			'password'         => ['required', 'min:6', 'max:20'],
			'password-confirm' => ['same:password'],
		], [
			'username.required'     => 'Ingresá un nombre de usuario',
			'username.min'          => 'El usuario debe tener al menos 4 caracteres',
			'username.unique'       => "El usuario ya existe",
			'password.required'     => 'Ingresá una contraseña',
			'password.min'          => 'La contraseña debe tener al menos 6 caracteres',
			'password.max'          => 'La contraseña debe tener menos de 20 caracteres',
			'password-confirm.same' => 'La contraseña no coincide',
		]);

		$username = strtolower($request['username']);

		if ($validator->passes()) {
			User::create([
				'username' => $username,
				'email'    => "{$username}@dragonmarket.com.ar",
				'password' => bcrypt($request['password']),
			]);
			return response(['success' => "El usuario {$username} ha sido creado."]);
		}

		return response()->json(['error' => $validator->errors()], 422);
	}

	/**
	 * Display the specified resource.
	 *
	 * redirect()->$this->route()'users.index;
	 *
	 * @param \App\Models\User $user
	 * @return void
	 */
	public function show(User $user)
	{
		//return view('auth.users')
		//    ->with(['user' => $user]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param User $user
	 * @return void
	 */
	public function edit(User $user)
	{
		//return view('users.edit')
		//    ->with(['user' => $user]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \App\Models\User $user
	 * @return void
	 */
	public function update(User $user)
	{
		// ...
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \App\Models\User $user
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function destroy(User $user)
	{
		$user->delete();
		return response(['success' => $user->username]);
	}
}
