<?php


namespace App\Factory;

use App\Api\Model\RoleUserInterface;
use App\Api\RoleUser\RoleUserFactoryInterface;
use App\Api\RoleUser\RoleUserRepositoryInterface;

class RoleUserFactory implements RoleUserFactoryInterface
{
    protected $roleUser;
    protected $roleUserRepository;

    public function __construct
    (
        RoleUserInterface $roleUser,
        RoleUserRepositoryInterface $roleUserRepository
    )
    {
        $this->roleUser = $roleUser;
        $this->roleUserRepository = $roleUserRepository;
    }

    public function make($user_id, $role_id)
    {
        $roleUser = $this->roleUser->make([
            'user_id' => $user_id,
            'role_id' => $role_id,
        ]);
        return $roleUser;
    }

    public function create($user_id, $role_id)
    {
        $roleUser = $this->make($user_id, $role_id);
        $this->roleUserRepository->save($roleUser);
        return $roleUser;
    }
}