<?php

use Illuminate\Database\Seeder;
use App\Api\Role\RoleFactoryInterface;

class RolesTableSeeder extends Seeder
{
    protected $roleFactory;

    public function __construct
    (
        RoleFactoryInterface $roleFactory
    )
    {
        $this->roleFactory = $roleFactory;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $this->roleFactory->create('admin');
        $this->roleFactory->create('superadmin');
    }
}
