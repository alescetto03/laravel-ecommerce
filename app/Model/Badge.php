<?php

namespace App\Model;

use App\Api\Model\BadgeInterface;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model implements BadgeInterface
{
    protected $fillable = [
        'title', 'badge', 'value'
    ];

    public function products()
    {
        return $this->belongsToMany('App\Model\Product', 'product_badge');
    }
}
