<?php

namespace App\Model;

use App\Api\Model\OrderInterface;
use Illuminate\Database\Eloquent\Model;

class Order extends Model implements OrderInterface
{
    protected $fillable = [
        'name', 'surname', 'email', 'address', 'credit_card', 'cart', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }
}
