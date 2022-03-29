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
        return $this->belongstoMany('App\Establishment', 'users_establishments', 'id_user', 'id_establishment')
        ->withPivot('id','degree', 'section', 'shift', 'year', 'status', 'created_at', 'updated_at')
        ->withTimestamps();
    }

    public function relations()
    {
        return $this->belongstoMany('App\User', 'usersRelations', 'id_parent', 'id_child')->withTimestamps();
    }

    /*
    Hace conflicto con Spatie
    public function roles()
    {
        return $this->belongstoMany('App\Role', 'users_roles', 'id_user', 'id_role')->withTimestamps();
    }*/

    public function accounts()
    {
        return $this->belongstoMany('App\Account', 'users_accounts', 'id_user', 'id_account')->withTimestamps();
    }

    public function transactions()
    {
        return $this->hasMany('App\Transaction', 'id_user', 'id');
    }

    public function healthConditions()
    {
        return $this->belongstoMany('App\HealthCondition', 'users_healthConditions', 'id_user', 'id_healthCondition');
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
