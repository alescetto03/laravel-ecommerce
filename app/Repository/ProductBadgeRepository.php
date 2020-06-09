<?php


namespace App\Repository;


use App\Api\Model\ProductBadgeInterface;
use App\Api\ProductBadge\ProductBadgeRepositoryInterface;

class ProductBadgeRepository implements ProductBadgeRepositoryInterface
{
    protected $productBadge;

    public function __construct
    (
        ProductBadgeInterface $productBadge
    )
    {
        $this->productBadge = $productBadge;
    }

    public function save($productBadge)
    {
        return $productBadge->save();
    }

    public function getById($id)
    {
        return $this->productBadge->find($id);
    }

    public function deleteById($id)
    {
        $productBadge = $this->getById($id);
        $productBadge->delete();
        return $productBadge;
    }

    public function getAll()
    {
        return $this->productBadge->all();
    }

    public function delete($productBadge)
    {
        $this->productBadge->delete();
        return $productBadge;
    }
}