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
        $this->categoryFactory->create('Varie', 'Prodotti vari', 'uploads/prodotti.jpg');
        $this->categoryFactory->create('Tecnologia', 'Lorem ipsum dolor', 'uploads/image-topCtgs_1.jpg');
        $this->categoryFactory->create('Abbigliamento', 'Lorem ipsum dolor', 'uploads/image-topCtgs_2.jpg');
        $this->categoryFactory->create('Sport', 'Lorem ipsum dolor', 'uploads/image-topCtgs_3.jpg');
    }
}
