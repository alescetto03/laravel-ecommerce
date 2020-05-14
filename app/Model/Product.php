<?php

namespace App\Model;

use App\Api\Model\ProductInterface;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements ProductInterface
{
    protected $fillable = [
        'sku', 'name', 'description', 'quantity', 'price', 'image', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Model\Category');
    }
}
