<?php


namespace App\Factory;


use App\Api\Model\RoleInterface;
use App\Api\Role\RoleFactoryInterface;
use App\Api\Role\RoleRepositoryInterface;

class RoleFactory implements RoleFactoryInterface
{
    protected $role;
    protected $roleRepository;

    public function __construct
    (
        RoleInterface $role,
        RoleRepositoryInterface $roleRepository
    )
    {
        $this->role = $role;
        $this->roleRepository = $roleRepository;
    }

    public function make($role_name)
    {
        $role = $this->role->make([
            'role_name' => $role_name,
        ]);
        return $role;
    }
    public function create($role_name)
    {
        $role = $this->make($role_name);
        $this->roleRepository->save($role);
        return $role;
    }
}