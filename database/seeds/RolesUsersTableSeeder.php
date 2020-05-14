<?php

use Illuminate\Database\Seeder;
use App\Api\Model\UserInterface;
use App\Api\Model\RoleInterface;
use App\Api\RoleUser\RoleUserFactoryInterface;

class RolesUsersTableSeeder extends Seeder
{
    protected $user, $role, $roleUserFactory;

    public function __construct
    (
        UserInterface $user,
        RoleInterface $role,
        RoleUserFactoryInterface $roleUserFactory
    )
    {
        $this->user = $user;
        $this->role = $role;
        $this->roleUserFactory = $roleUserFactory;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = $this->user->where('name', 'Super')->where('surname', 'Admin')->first();
        $superadmin = $this->role->where('role_name', 'superadmin')->first();
        $admin = $this->role->where('role_name', 'admin')->first();
        $this->roleUserFactory->create($user['id'], $superadmin['id']);
        $this->roleUserFactory->create($user['id'], $admin['id']);
    }
}
