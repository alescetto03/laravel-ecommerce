<?php


namespace App\Management;


use App\Api\Product\ProductManagementInterface;

class ProductManagement implements ProductManagementInterface
{
    public function update($array, $product)
    {
        foreach ($array as $index => $item) {
            if ($item !== null) {
                $product->update([$index => $item]);
            }
        }
        return $product;
    }

    public function switchCategory($collection, $category_id)
    {
        foreach ($collection as $item) {
            $item->update(['category_id' => $category_id]);
        }
    }
}