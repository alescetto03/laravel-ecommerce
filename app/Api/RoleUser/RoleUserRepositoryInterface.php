<?php


namespace App\Api\RoleUser;


interface RoleUserRepositoryInterface
{
    public function save($roleUser);
    public function getById($id);
    public function deleteById($id);
    public function getAll();
    public function delete($roleUser);
}