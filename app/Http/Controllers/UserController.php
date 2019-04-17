<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function index()
	{
		return view('auth.users.index')->with(['data' => request()->query()])->with(['users' => User::paginate(30)]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('auth.users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store()
	{
		$request = request()->validate([
			'username' => ['required', Rule::unique('users'), 'min:4', 'alpha_num'],
			'password' => ['required', 'confirmed', 'min:6', 'max:20'],
		], [
			'username.required'  => 'Ingresá un nombre de usuario',
			'username.unique'    => "El usuario ya existe",
			'password.required'  => 'Ingresá una contraseña',
			'password.confirmed' => 'La contraseña no coincide',
			'password.min'       => 'La contraseña debe tener al menos 6 caracteres',
			'password.max'       => 'La contraseña debe tener menos de 20 caracteres',
		]);

		$username = strtolower($request['username']);
		User::create([
			'username' => $username,
			'email'    => "{$username}@dragonmarket.com.ar",
			'password' => bcrypt($request['password']),
		]);

		$data['store'] = $username;

		return redirect()->route('users.index', $data);
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
		//if ($data['password'] != null) {
		//	if (strlen($data['password']) < 6
		//    || strlen($data['password']) > 20)
		//	    return back()->withErrors(['password' => 'La contraseña debe tener entre 6 y 20 caracteres']);
		//
		//	else $data['password'] = bcrypt($data['password']);
		//}
		//
		//else unset($data['password']);
		//
		//$data = request()->validate([
		//    'username' => ['required', 'min:4', Rule::unique('users')->ignore($user->id)],
		//    'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
		//    'password' => 'confirmed'
		//    ] // , ['first_name.required' => 'ingresá tu nombre']
		//);
		//
		//$user->update($data);
		//
		//return redirect()->route('users.show', ['user' => $user]);
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

		if (request()->ajax())
			return response()->json(['message' => 'El usuario '.$user->username.' ha sido eliminado']);

		//return $data['destroy'] = User::find($id)->username;
		//return redirect()->route('users.index', $data);
	}
}
