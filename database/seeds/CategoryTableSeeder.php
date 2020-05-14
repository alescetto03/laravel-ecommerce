<?php

use Illuminate\Database\Seeder;
use App\Api\Category\CategoryFactoryInterface;

class CategoryTableSeeder extends Seeder
{
    protected $categoryFactory;

    public function __construct
    (
        CategoryFactoryInterface $categoryFactory
    )
    {
        $this->categoryFactory = $categoryFactory;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $this->categoryFactory->create('Varie', 'Prodotti vari', null);
    }
}
