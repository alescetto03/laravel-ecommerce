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

    public function badges()
    {
        return $this->belongsToMany('App\Model\Badge', 'product_badge');
    }

    public function discount($sale)
    {
        $discount = $this->attributes['price'] * $sale / 100;
        $discount = $this->attributes['price'] - $discount;
        return round($discount, 2, 1);
    }
}
