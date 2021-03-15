<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * podemos probar las exceptions de
     * /app/Exceptions/Handler.php y las rutas en el URI
     */

    use ApiResponser;       //para acceder a los metodos del trait
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        //
    }

    /**
     * Return user List
     * @return Illuminate\Http\Response
     */

    public function index()
    {
        $users = User::all();
        return $this->validResponse($users);
    }

    /**
     * Create a instance of User
     * @return Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $rules = [
            'name'  => 'required|max:255',
            'email'  => 'required|email|unique:users,email',
            'password'  => 'required|min:8|confirmed',
            //'password_confirmation' => is need in form to save data
        ];

        $this->validate($request, $rules);

        $fields = $request->all();
        $fields['password'] = Hash::make($request->password);

        $user = User::create($fields);

        //HTTP_CREATED es una constante que devuelve 201 de creado en http
        return $this->validResponse($user, Response::HTTP_CREATED);
    }

    /**
     * Return a specific users
     * @return Illuminate\Http\Response
     */

    public function show($id)
    {
        $user = User::findOrFail($id);

        return $this->validResponse($user);
    }

    /**
     * Update the informations of a user
     * @return Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $rules = [
            'name'         => 'max:255',
            'email'   => 'email|unique:users,email,'.$id,
            'password'         => 'min:8|confirmed',
        ];
        $this->validate($request, $rules);

        $user = User::findOrFail($id);

        $user->fill($request->all());

        //cifrar la contraseña
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        //si no hay cambios
        if ($user->isClean()) {

            //HTTP_CREATED es una conmtante que devuelve 422  que no puede ser procesada
            return $this->errorResponse('Al menos un valor debe cambiar', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user->save();

        return $this->validResponse($user);

    }

    /**
     * Remove the informations of a user
     * @return Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();
        
        return $this->validResponse($user);
    }

    /**
     * Identifies the curren user
     * @return Illuminate\Http\Response
     */

    public function me(Request $request)
    {
        return $this->validResponse($request->user());
    }
}
