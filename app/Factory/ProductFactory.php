<?php


namespace App\Factory;


use App\Api\Model\ProductInterface;
use App\Api\Product\ProductFactoryInterface;
use App\Api\Product\ProductRepositoryInterface;

class ProductFactory implements ProductFactoryInterface
{
    protected $product;
    protected $productRepository;

    public function __construct
    (
        ProductInterface $product,
        ProductRepositoryInterface $productRepository
    )
    {
        $this->product = $product;
        $this->productRepository = $productRepository;
    }

    public function make($sku, $name, $description, $quantity, $price, $image, $category_id)
    {
        $product = $this->product->make([
            'sku' => $sku,
            'name' => $name,
            'description' => $description,
            'quantity' => $quantity,
            'price' => $price,
            'image' => $image,
            'category_id' => $category_id,
        ]);
        return $product;
    }

    public function create($sku, $name, $description, $quantity, $price, $image, $category_id)
    {
        $product = $this->make($sku, $name, $description, $quantity, $price, $image, $category_id);
        $this->productRepository->save($product);
        return $product;
    }
}