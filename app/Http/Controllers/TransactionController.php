<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\BusinessDocument;
use App\User;
use App\Http\Requests\CreateTransactionRequest;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = array('Transacciones', 'Todas');
        $transactions = Transaction::all();
        return view('extranet.transaction.index', compact('title','transactions'));
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

    public function store(CreateTransactionRequest $request)
    {
        $request->save();
        
        $Response = ['success' => 'La transacción fue procesada correctamente.'];
        return response()->json($Response,200);
        //return redirect()->route('index');

    }

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
