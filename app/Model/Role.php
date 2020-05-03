<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'role_name'
    ];

    public function user()
    {
        return $this->belongsToMany('App\Model\User');
    }
}
