<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //Auth::user()->roles()->get();

        //return view('test');

        /*
        ESTO ESTA OK
        if (Auth::check()) {
            $role = Auth::user()->roles[0]->name;
           
            if ($role == "admin") {
                return redirect()->route('admin');
            } elseif ($role == "tutor") {
                return redirect()->route('tutor');
            } else {
                return redirect()->route('student');
            }
        }*/

        $users = User::with(['relations', 'roles'])->get();

        return view('index', compact('users'));
    }
}
