<?php

use Illuminate\Database\Seeder;
use App\Api\Product\ProductFactoryInterface;

class ProductTableSeeder extends Seeder
{
    protected $productFactory;

    public function __construct
    (
        ProductFactoryInterface $productFactory
    )
    {
        $this->productFactory = $productFactory;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = new Faker\Product();
        $this->productFactory->create($faker->sku('Scarpe sportive'), 'Scarpe sportive', 'Nere', 19.99, 'uploads/shoes.jpg', 3);
        $this->productFactory->create($faker->sku('Maglione di lana'), 'Maglione di lana', 'Rosso', 49.99, 'uploads/sweater.jpg', 3);
        $this->productFactory->create($faker->sku('Calzini di cotone'), 'Calzini di cotone', 'Bianchi', 4.99, 'uploads/socks.jpg', 3);
        $this->productFactory->create($faker->sku('iPad'), 'iPad', 'Bianco', 199.99, 'uploads/ipad.jpg', 2);
        $this->productFactory->create($faker->sku('Computer'), 'Computer', 'Nero', 499.99, 'uploads/computer.jpg', 2);
        $this->productFactory->create($faker->sku('Drone'), 'Drone', 'Bianco', 399.99, 'uploads/drone.jpg', 2);
        $this->productFactory->create($faker->sku('Palla da basket'), 'Palla da basket', 'Bella', 124.99, 'uploads/basket.jpg', 4);
        $this->productFactory->create($faker->sku('Pallone da calcio'), 'Pallone da calcio', 'Bello', 24.99, 'uploads/soccer.jpg', 4);
        $this->productFactory->create($faker->sku('Palla da bowling'), 'Palla da bowling', 'Bella', 24.99, 'uploads/bowling.jpg', 4);
    }
}
