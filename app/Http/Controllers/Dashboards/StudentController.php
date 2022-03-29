<?php

namespace App\Http\Controllers\Dashboards;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //$users = User::with(['relations', 'roles'])->get();
        return view('dashboards.student');
        
        //return view('index', compact('users'));
    }
}
