<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Establishment;
use App\User;
use App\Branch;
use Illuminate\Support\Facades\Auth;

class EstablishmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:establishments.index')->only('index');
        $this->middleware('can:establishments.create')->only('create','store');
        $this->middleware('can:establishments.edit')->only('edit', 'update');
        $this->middleware('can:establishments.destroy')->only('destroy');
    }
    public function index()
    {
        $user = User::find(Auth::user()->id);
        $establishment = $user->establishments;
        

        $title = array('Establecimientos', 'Ver todos');
        $role = Auth::user()->roles[0]->name;

        if($role == 'Super Administrador') {
            $establishments = Establishment::with('branches')->get();
        }
        elseif($role == 'Administrador'){
            $user = User::find(Auth::user()->id);
            $establishment = $user->establishments->id;
dd($establishment);
            $establishments = Establishment::find()->with('branches')->get();
        }
        else{
            $establishments = "";
        }

        return view('extranet.establishment.index', compact('title','establishments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
