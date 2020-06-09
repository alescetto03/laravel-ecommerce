<?php

use Illuminate\Database\Seeder;
use App\Api\ProductBadge\ProductBadgeFactoryInterface;

class ProductBadgeTableSeeder extends Seeder
{
    protected $productBadgeFactory;

    public function __construct
    (
        ProductBadgeFactoryInterface $productBadgeFactory
    )
    {
        $this->productBadgeFactory = $productBadgeFactory;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 9; $i++) {
            $this->productBadgeFactory->create($i, 1);
        }
    }
}
