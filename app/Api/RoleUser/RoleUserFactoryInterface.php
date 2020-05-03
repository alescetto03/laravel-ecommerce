<?php


namespace App\Api\RoleUser;


interface RoleUserFactoryInterface
{
    public function make($user_id, $role_id);
    public function create($user_id, $role_id);
}