<?php


namespace App\Factory;


use App\Api\Model\ProductBadgeInterface;
use App\Api\ProductBadge\ProductBadgeFactoryInterface;
use App\Api\ProductBadge\ProductBadgeRepositoryInterface;

class ProductBadgeFactory implements ProductBadgeFactoryInterface
{
    protected $productBadge;
    protected $productBadgeRepository;

    public function __construct
    (
        ProductBadgeInterface $productBadge,
        ProductBadgeRepositoryInterface $productBadgeRepository
    )
    {
        $this->productBadge = $productBadge;
        $this->productBadgeRepository = $productBadgeRepository;
    }

    public function make($product_id, $badge_id)
    {
        $productBadge = $this->productBadge->make([
            'product_id' => $product_id,
            'badge_id' => $badge_id,
        ]);
        return $productBadge;
    }

    public function create($product_id, $badge_id)
    {
        $productBadge = $this->make($product_id, $badge_id);
        $this->productBadgeRepository->save($productBadge);
        return $productBadge;
    }
}