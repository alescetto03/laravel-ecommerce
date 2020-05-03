<?php


namespace App\Api\Role;


interface RoleRepositoryInterface
{
    public function save($role);
    public function getById($id);
    public function deleteById($id);
    public function getAll();
    public function delete($role);
}