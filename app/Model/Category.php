<?php

namespace App\Model;

use App\Api\Model\CategoryInterface;
use Illuminate\Database\Eloquent\Model;

class Category extends Model implements CategoryInterface
{
    protected $fillable = [
        'title', 'description', 'image'
    ];

    public function products()
    {
        return $this->hasMany('App\Model\Product');
    }
}
