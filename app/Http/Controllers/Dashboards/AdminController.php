<?php

namespace App\Http\Controllers\Dashboards;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = array('Dashboard','Administrador');
        $users = User::with(['relations', 'roles'])->get();
        
        return view('dashboards.admin', compact('title', 'users'));
        
        //return view('index', compact('title','users'));
    }
}
