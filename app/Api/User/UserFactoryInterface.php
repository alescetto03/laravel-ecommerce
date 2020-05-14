<?php


namespace App\Api\User;


interface UserFactoryInterface
{
    public function make($name, $surname, $email, $password, $profile_image);
    public function create($name, $surname, $email, $password, $profile_image);
}