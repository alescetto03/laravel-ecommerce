<?php


namespace App\Repository;


use App\Api\Model\RoleInterface;
use App\Api\Role\RoleRepositoryInterface;

class RoleRepository implements RoleRepositoryInterface
{
    protected $role;

    public function __construct
    (
        RoleInterface $role
    )
    {
        $this->role = $role;
    }

    public function save($role)
    {
        return $role->save();
    }

    public function getById($id)
    {
        return $this->role->find($id);
    }

    public function deleteById($id)
    {
        $role = $this->getById($id);
        $role->delete();
        return $role;
    }

    public function getAll()
    {
        return $this->role->all();
    }

    public function delete($role)
    {
        $this->role->delete();
        return $role;
    }
}