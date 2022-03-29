<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
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
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //$today = Carbon::now();

        DB::transaction(function() use($data) {
            
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
                $role = 3;
            }
            else
            {
                $role = 4;
            }

            $user->roles()->sync([$role]);
            
            //return $user;
        });

        return User::latest('id')->first();
        
    }
}
