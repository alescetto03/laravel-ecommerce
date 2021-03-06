<?php

namespace App\Model;

use App\Api\Model\UserInterface;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements UserInterface
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'password',
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

    public function roles()
    {
        return $this->belongsToMany('App\Model\Role');
    }

    public function orders()
    {
        return $this->hasMany('App\Model\Order');
    }

    public function hasAnyRoles($roles)
    {
        if($this->roles()->whereIn('role_name', $roles)->first()) {
            return true;
        }
        return false;
    }

    public function hasRole($role)
    {
        if($this->roles()->where('role_name', $role)->first()) {
            return true;
        }
        return false;
    }
}
