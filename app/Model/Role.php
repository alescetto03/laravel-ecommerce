<?php

namespace App\Model;

use App\Api\Model\RoleInterface;
use Illuminate\Database\Eloquent\Model;

class Role extends Model implements RoleInterface
{
    protected $fillable = [
        'role_name'
    ];

    public function users()
    {
        return $this->belongsToMany('App\Model\User');
    }
}
