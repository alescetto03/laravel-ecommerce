<?php

namespace App\Model;

use App\Api\Model\RoleUserInterface;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model implements RoleUserInterface
{
    protected $table = 'role_user';

    protected $fillable = [
        'role_id', 'user_id',
    ];
}
