<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;


class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'firstName' => ['required', 'string', 'max:100'],
            'middleName' => ['string', 'nullable'],
            'lastName' => 'required',
            'nickName' => 'nullable',
            'gender' => 'required',
            'birthday' => 'required',
            'governmentIdType' => 'required',
            'governmentId' => ['required', 'digits_between:7,8', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'mobile' => ['required', 'digits_between:9,14'],
            'username' => ['required', 'string', 'min:4', 'max:20', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'status' => '',

            'establishment' => 'required',
            'degree' => 'required',
            'section' => 'required',
            'shift' => 'required',

            'healthConditions' => ['nullable','array']
        ];
    }
    public function messages(){
        return [
            'firstName.required' => 'El campo "Primer nombre" es obligatorio',
            //'middleName.required' => 'Este campo es obligatorio',
            'lastName.required' => 'El campo "Apellido" es obligatorio',
            //'nickName.required' => 'Este campo es obligatorio',
            'gender.required' => 'El campo "Género" es obligatorio',
            'birthday.required' => 'El campo "Fecha de nacimiento" es obligatorio',
        ];
    }
    public function save(){

        

        DB::transaction(function() {
            $data = $this->validated();

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
            }
        });

        
    }
}
