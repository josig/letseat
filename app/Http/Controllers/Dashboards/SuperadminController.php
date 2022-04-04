<?php

namespace App\Http\Controllers\Dashboards;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuperadminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = array('Dashboard','Super Administrador');
        //$users = User::with(['relations', 'roles'])->get();
        
        return view('dashboards.superadmin', compact('title'));
    }
}
