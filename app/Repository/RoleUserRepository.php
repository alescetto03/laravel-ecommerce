<?php


namespace App\Repository;


use App\Api\Model\RoleUserInterface;

class RoleUserRepository
{
    protected $roleUser;

    public function __construct
    (
        RoleUserInterface $roleUser
    )
    {
        $this->roleUser = $roleUser;
    }

    public function save($roleUser)
    {
        return $roleUser->save();
    }

    public function getById($id)
    {
        return $this->roleUser->find($id);
    }

    public function deleteById($id)
    {
        $roleUser = $this->getById($id);
        $roleUser->delete();
        return $roleUser;
    }

    public function getAll()
    {
        return $this->roleUser->all();
    }

    public function delete($roleUser)
    {
        $this->roleUser->delete();
        return $roleUser;
    }
}