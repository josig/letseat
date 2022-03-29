<?php

namespace App\Http\Controllers\Dashboards;

use App\User;
use App\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TutorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = array('Dashboard','Responsable');

        $relations = User::find(Auth::user()->id)->relations()->get();

        // $transactions = User::find(Auth::user()->id)->transactions()->get(); //OK
        // $transactions = User::find(Auth::user()->id)->transactions;  //OK

        $transactions = Transaction::with(['paymentsMethods','transactionsConcepts', 'businessesDocuments'])->get();
        //$users = User::with(['relations', 'roles'])->get();
        //dd($transactions);
        
        return view('dashboards.tutor', compact('title','relations'));
        
        //return view('index', compact('users'));
    }
}
