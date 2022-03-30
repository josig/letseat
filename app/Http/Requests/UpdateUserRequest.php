<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;


class UpdateUserRequest extends FormRequest
{
    //protected $redirectRoute = 'user.edit';

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
            'firstName' => 'required',
            'middleName' => '',
            'lastName' => 'required',
            'nickName' => '',
            'gender' => 'required',
            'birthday' => 'required',
            'governmentIdType' => 'required',
            'governmentId' => 'required',
            'email' => 'required',
            'mobile' => '',
            'username' => '',
            'password' => '',
            'status' => '',

            'establishment' => 'required',
            'degree' => 'required',
            'section' => 'required',
            'shift' => 'required',

            'healthConditions' => ['nullable', 'array']
        ];
    }
    public function messages()
    {
        return [
            'firstName.required' => 'El campo "Primer nombre" es obligatorio',
            //'middleName.required' => 'Este campo es obligatorio',
            'lastName.required' => 'El campo "Apellido" es obligatorio',
            //'nickName.required' => 'Este campo es obligatorio',
            'gender.required' => 'El campo "Género" es obligatorio',
            'birthday.required' => 'El campo "Fecha de nacimiento" es obligatorio',
        ];
    }
    public function save()
    {
        DB::transaction(function () {
            $data = $this->validated();

            if($data['middleName']){
                $middleName = " ".$data['middleName']." ";
            }
            else {
                $middleName = " ";
            }

            $fullname = $data['firstName'] . $middleName . $data['lastName'];

            $user = User::find($this->route('user')->id);

            $user->firstName = Str::title($data['firstName']);
            $user->middleName = Str::title($data['middleName']);
            $user->lastName = Str::title($data['lastName']);
            $user->fullName = Str::title($fullname);
            $user->nickName = Str::title($data['nickName']);
            $user->gender = $data['gender'];
            $user->birthday = $data['birthday'];
            $user->governmentIdType = $data['governmentIdType'];
            $user->governmentId = $data['governmentId'];
            $user->email = Str::lower($data['email']);
            $user->mobile = $data['mobile'];
            $user->status = '1';

            $user->save();



            // Inserto info de institucion

            $pivotId = $this->route('user')
                ->establishments()
                ->where('user_id', $this->route('user')->id)
                ->where('establishment_id', $data['establishment'])
                ->first()->pivot->id;

            $now = Carbon::now();

            $this->route('user')
                ->establishments()
                ->newPivotStatement()
                ->where('id', $pivotId)->update([
                    'degree' => $data['degree'],
                    'section' => $data['section'],
                    'shift' => $data['shift'],
                    'year' => $now->year,
                    'status' => '1',
                    'updated_at' => $now
                ]);

            //$updatedAt = $user->freshTimestamp();

            // Inserto datos de salud
            if (empty($data['healthConditions'])) {
                $user->healthConditions()->detach();
            } else {
                $user->healthConditions()->sync($data['healthConditions']);
            }

        });
    }
}
