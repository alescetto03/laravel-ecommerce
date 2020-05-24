<?php


namespace App\Api\Product;


interface ProductFactoryInterface
{
    public function make($sku, $name, $description, $price, $image, $category_id);
    public function create($sku, $name, $description, $price, $image, $category_id);
}