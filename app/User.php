<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'middleName', 'lastName', 'fullName', 'nickName', 'gender', 'birthday', 'governmentIdType', 'governmentId', 'email', 'mobile', 'username', 'password', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //No se usa aun
    public function isAdmin()
    {
        $role = Auth::user()->roles[0]->name;

        if ($role == "admin") {
            return true;
        }
        return false;
    }

    public function establishments()
    {
        return $this->belongstoMany('App\Establishment', 'establishments_users', 'user_id', 'establishment_id')
        ->withPivot('id','establishment_id','branch_id','degree', 'section', 'shift', 'year', 'status', 'created_at', 'updated_at')
        ->withTimestamps();
    }

    public function branches()
    {
        return $this->belongstoMany('App\Branch', 'establishments_users', 'user_id', 'branch_id')
        ->withPivot('id','establishment_id','branch_id','degree', 'section', 'shift', 'year', 'status', 'created_at', 'updated_at')
        ->withTimestamps();
    }

    public function relations()
    {
        return $this->belongstoMany('App\User', 'usersRelations', 'parent_id', 'child_id')->withTimestamps();
    }

    public function accounts()
    {
        return $this->belongstoMany('App\Account', 'accounts_users', 'user_id', 'account_id')->withTimestamps();
    }

    public function transactions()
    {
        return $this->hasMany('App\Transaction', 'user_id', 'id');
    }

    public function healthConditions()
    {
        return $this->belongstoMany('App\HealthCondition', 'healthConditions_users', 'user_id', 'healthCondition_id');
    }

    public function hasAnyRoles($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    public function hasAnyRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }
}
