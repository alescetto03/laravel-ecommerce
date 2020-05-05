<?php


namespace App\Api\User;


interface UserRepositoryInterface
{
    public function save($user);
    public function getById($id);
    public function deleteById($id);
    public function getAll();
    public function delete($user);
}