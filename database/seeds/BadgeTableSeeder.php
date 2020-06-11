<?php

use Illuminate\Database\Seeder;
use App\Api\Badge\BadgeFactoryInterface;
class BadgeTableSeeder extends Seeder
{
    protected $badgeFactory;

    public function __construct
    (
        BadgeFactoryInterface $badgeFactory
    )
    {
        $this->badgeFactory = $badgeFactory;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->badgeFactory->create('New', 'uploads/new.png', NULL);
    }
}
