<?php

namespace App\Model;

use App\Api\Model\ProductBadgeInterface;
use Illuminate\Database\Eloquent\Model;

class ProductBadge extends Model implements ProductBadgeInterface
{
    protected $table = 'product_badge';

    protected $fillable = [
        'product_id', 'badge_id',
    ];
}
