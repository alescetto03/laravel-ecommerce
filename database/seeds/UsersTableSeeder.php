<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Api\User\UserFactoryInterface;

class UsersTableSeeder extends Seeder
{
    protected $userFactory;

    public function __construct
    (
        UserFactoryInterface $userFactory
    )
    {
        $this->userFactory = $userFactory;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->userFactory->create('Super', 'Admin', 'superadmin@test.com', Hash::make('12345678'), null);
    }
}
