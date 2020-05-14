<?php


namespace App\Api\Product;


interface ProductRepositoryInterface
{
    public function save($product);
    public function getById($id);
    public function deleteById($id);
    public function getAll();
    public function delete($product);
}