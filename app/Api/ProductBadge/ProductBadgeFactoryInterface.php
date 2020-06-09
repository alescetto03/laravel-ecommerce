<?php


namespace App\Api\ProductBadge;


interface ProductBadgeFactoryInterface
{
    public function make($product_id, $badge_id);
    public function create($product_id, $badge_id);
}