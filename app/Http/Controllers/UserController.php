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
        $navbarItems = array(
            'BUSCAR UN USUARIO',
            'AGREGAR ADMINISTRADOR',
            'VER ADMINISTRADORES',
            'ELIMINAR ADMINISTRADOR'
        );
        
        return view('admin.users')
            ->with(['users' => User::paginate(30)])
            ->with(['navbarItems' => $navbarItems]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //$data = request()->all();
        $data = request()->validate([
            'username' => ['required', 'min:4'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed','min:6', 'max:20']
            ]
	        //['first_name.required' => 'Por favor ingresá tu nombre']
        );
        
        $newUser = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
        
        return redirect()->route('users.show', $newUser->id);
    }

    /**
     * Display the specified resource.
     *
     * redirect()->$this->route()'users.index;
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user)
    {
        return view('admin.users')
            ->with(['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param User $user
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('users.edit')
            ->with(['user' => $user]);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \App\Models\User $user
	 * @return \Illuminate\Http\Response
	 */
    public function update(User $user)
    {
	    if ($data['password'] != null) {
	    	if (strlen($data['password']) < 6
		    || strlen($data['password']) > 20)
	    	    return back()->withErrors(['password' => 'La contraseña debe tener entre 6 y 20 caracteres']);

	    	else $data['password'] = bcrypt($data['password']);
	    }

	    else unset($data['password']);
	    
	    $data = request()->validate([
		    'username' => ['required', 'min:4'],
		    'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
		    'password' => 'confirmed'
	        ] // , ['first_name.required' => 'Por favor ingresá tu nombre']
        );

    	$user->update($data);

    	return redirect()->route('users.show', ['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}
