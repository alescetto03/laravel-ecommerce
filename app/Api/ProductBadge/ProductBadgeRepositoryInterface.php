<?php


namespace App\Api\ProductBadge;


interface ProductBadgeRepositoryInterface
{
    public function save($productBadge);
    public function getById($id);
    public function deleteById($id);
    public function getAll();
    public function delete($productBadge);
}