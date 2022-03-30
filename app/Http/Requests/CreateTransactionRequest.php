<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Transaction;
use App\BusinessDocument;
use App\User;
use Illuminate\Http\JsonResponse;

class CreateTransactionRequest extends FormRequest
{
    //protected $redirectRoute = 'transaction.create';
    
    protected function prepareForValidation():void
    {
        // Sumo datos a los recibidos del formulario
        /*$this->merge([
            'id_user' => $user[0]->id,
            'id_paymentMethod' => 1,
            'id_transactionConcept' => 1,
            'id_businessDocument' => null,
            'id_currency' => 1,
            'reference' => ,
        ]);*/
    }

    public function authorize()
    {
        //return auth()->check();
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'governmentId' => ['required','exists:users','numeric','digits_between:7,8'],
            'paymentMethod' => ['nullable','numeric'],
            'transactionConcept' => ['required','numeric'],
            'currency' => ['required','numeric'],
            'amount' => ['required','numeric','regex:/^\d+(\.\d{1,2})?$/'],
            'status' => '',
        ];
    }

    public function save(){
        
        $transactionResult = DB::transaction(function() {

            $data = $this->validated();

            // Obtengo id del usuario
            $govId = $data['governmentId'];
            $user = User::where('governmentId',$data['governmentId'])->get();

            // Genero numero de referencia
            $reference = Str::random(9);

            //Creo un BusinessDocument
            $businessDocument = BusinessDocument::create([
                'businessDocumentDetail_id' => 1,
                'businessDocumentType_id' => 1,
                'number' => '1212121212',
                'amount' => $data['amount'],
                //'status' => '1'
            ]);

            Transaction::create([
                'user_id' => $user[0]->id,
                'paymentMethod_id' => $data['paymentMethod'],
                'transactionConcept_id' => $data['transactionConcept'],
                'businessDocument_id' => $businessDocument->id,
                'currency_id' => $data['currency'],
                'amount' => $data['amount'],
                'reference' => Str::upper($reference),
                'status' => '1'
            ]);
    
            
    
            // Asigno el Businessdocument a la transaction
            /*$data = $this->validated();

            $fullname = $data['firstName'].' '.$data['middleName'].' '.$data['lastName'];
            
            $user = User::create([
                'firstName' => Str::title($data['firstName']),
                'middleName' => Str::title($data['middleName']),
                'lastName' => Str::title($data['lastName']),
                'fullName' => Str::title($fullname),
                'nickName' => Str::title($data['nickName']),
                'gender' => $data['gender'],
                'birthday' => $data['birthday'],
                'governmentIdType' => $data['governmentIdType'],
                'governmentId' => $data['governmentId'],
                'email' => Str::lower($data['email']),
                'mobile' => $data['mobile'],
                'username' => Str::lower($data['username']),
                'password' => bcrypt($data['password']),
                'status' => '1'
            ]);
            
            // Inserto rol
            //Decido numero segun edad. Mayor = 2, Menor = 1

            //$age = Carbon::createFromDate(1970,19,12)->age;
            //$age = Carbon::createFromDate($data['birthday'])->age;

            if(Carbon::parse($data['birthday'])->age >= 19){
                $role = 4;
            }
            else
            {
                $role = 5;
            }

            $user->roles()->sync([$role]);

            // Inserto relacion parent/child
            $lastuser = $user->latest('id')->first();
            User::find(Auth::user()->id)->relations()->save($lastuser);

            // Inserto info de institucion
            $establishment = $data['establishment'];
            $now = Carbon::now();
            $user->establishments()->attach($establishment, [
                'degree' => $data['degree'],
                'section' => $data['section'],
                'shift' => $data['shift'],
                'year' => $now->year,
                'status' => '1',
                'created_at' => $now
            ]);

            // Inserto datos de salud
            if(!empty($data['healthConditions'])){
                $user->healthConditions()->sync($data['healthConditions']);
            }*/
        });

        //return $transaction->latest()->first;
    }


    public function response(array $errors)
    {
        if ($this->expectsJson()) {
            return new JsonResponse($errors, 422);
        }
        return $this->redirector->to($this->getRedirectUrl())
            ->withInput($this->except($this->dontFlash))
            ->withErrors($errors, $this->errorBag);
    }
}
