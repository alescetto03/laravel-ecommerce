<?php


namespace App\Repository;


use App\Api\Model\ProductInterface;
use App\Api\Product\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    protected $product;

    public function __construct
    (
        ProductInterface $product
    )
    {
        $this->product = $product;
    }

    public function save($product)
    {
        return $product->save();
    }

    public function getById($id)
    {
        return $this->product->find($id);
    }

    public function deleteById($id)
    {
        $product = $this->getById($id);
        $product->delete();
        return $product;
    }

    public function getAll()
    {
        return $this->product->all();
    }

    public function delete($product)
    {
        $this->product->delete();
        return $product;
    }
}