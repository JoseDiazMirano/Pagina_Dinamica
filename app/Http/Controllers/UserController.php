<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Http\Requests\UserEditFormRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if($request){
            $query = trim($request->get('search'));
            $users = User::where('name','LIKE','%'. $query.'%')
            ->orderBy('id','asc')
            ->simplePaginate(5);
            return view('usuarios.index',['users' => $users , 'search' => $query]);
        }
        /*$users = User::all();
        return view('usuarios.index',['users' => $users]);*/
    }

    public function create()
    {
        $roles = Role::all();
        return view('usuarios.create',['roles' => $roles]);
    }

    public function store(UserFormRequest $request)
    {
        $usuario = new User();

        $usuario->name = request('name'); 
        $usuario->email = request('email');
        $usuario->celular = request('celular');
        $usuario->password = bcrypt(request('password'));

        $usuario->save();

        $usuario->asignarRol($request->get('rol'));

        return redirect('usuarios');
    }

    public function show($id)
    {
        return view('usuarios.show',['user' => User::findOrFail($id)]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all(); 
        return view('usuarios.edit',['user' => $user, 'roles' => $roles]);
    }

    public function update(UserEditFormRequest $request, $id)
    {
        $this->validate(request(),['email' =>['required', 'email','max:225','unique:users,email,' . $id]]);
        $usuario = User::findOrFail($id);

        $usuario->name = $request->get('name');
        $usuario->email = $request->get('email'); 
        $usuario->celular = $request->get('celular');

        $pass = $request->get('password');
        if($pass !=null){
            $usuario->password = bcrypt($request->get('password'));
        }else{
            unset($usuario->password);
        }
        //modiificamos esta parte paar que actualice roles y usuarios
        //si tiene rol actualizamos 
        //si no tiene rol se le asigna uno
        $role = $usuario->roles;
        if(count($role) > 0){
            $role_id = $role[0]->id;
            User::find($id)->roles()->updateExistingPivot($role_id, ['role_id' => $request->get('rol')]);
        }else{
            $usuario->asignarRol($request->get('rol'));
        }

        $usuario->update();

        return redirect('/usuarios');
    }

    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return redirect('/usuarios');
    }
}
