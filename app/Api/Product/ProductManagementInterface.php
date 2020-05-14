<?php


namespace App\Api\Product;


interface ProductManagementInterface
{
    public function update($array, $product);
    public function switchCategory($collection, $category_id);
}