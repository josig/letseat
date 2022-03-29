<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::check())
        {
            $role = Auth::user()->roles[0]->name;
        
            if ($role == "Super Administrador") {
                return redirect()->route('dashboard.superadmin');
            } elseif ($role == "Administrador") {
                return redirect()->route('dashboard.admin');
            } elseif ($role == "Responsable") {
                return redirect()->route('dashboard.tutor');
            } else {
                return redirect()->route('dashboard.student');
            }
        }
    }
}
