<?php


namespace App\Api\Role;


interface RoleFactoryInterface
{
    public function make($role);
    public function create($role);
}