<?php

namespace App\Http\Controllers;

use App\User;
use App\HealthCondition;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:users.index')->only('index');
        $this->middleware('can:users.create')->only('create','store');
        $this->middleware('can:users.edit')->only('edit', 'update');
        $this->middleware('can:users.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = array('Relaciones','Ver todos');
        $role = Auth::user()->roles[0]->name;

        if($role == 'Super Administrador') {
            $users = User::all();
        }
        elseif($role == 'Administrador'){
            //Cambiar a todos los Establishments = 1
            $users = User::all();
        }
        elseif($role == 'Empleado'){
            $users = User::find(Auth::user()->id)->relations()->get();
        }
        elseif($role == 'Responsable'){
            $users = User::find(Auth::user()->id)->relations()->get();
        }
        else{

        }
        
        //dd($users);
        return view('user.index',compact('title','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = array('Usuarios','Crear usuario');
        $healthConditions = HealthCondition::all();

        return view('user.create', compact('title','healthConditions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $request->save();

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $title = array('Usuario','1');
        $user = User::find($user->id);
        //dd($user);
        return view('user.show', compact('user','title'));
    }

    public function edit(User $user)
    {
        $title = array('Usuarios', 'Editar a: '.$user->fullName);
        $user = User::where('id',$user->id)->with(['establishments','healthConditions'])->get();
        $healthConditions = HealthCondition::all();
        //dd($user);
        return view('user.edit',compact('title','user','healthConditions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        
        $request->save();

        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->id == $id){
            return redirect()->route('')->with('warning', 'No podés eliminarte a vos mismo.');
        }

        $user = User::find($id);
        if ($user){
            $user->roles()->detach();
            $user->delete();

            return redirect()->route('')->with('success','Eliminado correctamente.');
        }

        return redirect()->route('')->with('warning','Este usuario no puede eliminarse.');
    }
}
