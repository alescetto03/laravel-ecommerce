<?php


namespace App\Factory;


use App\Api\Model\UserInterface;
use App\Api\User\UserFactoryInterface;
use App\Api\User\UserRepositoryInterface;

class UserFactory implements UserFactoryInterface
{
    protected $user;
    protected $userRepository;

    public function __construct
    (
        UserInterface $user,
        UserRepositoryInterface $userRepository
    )
    {
        $this->user = $user;
        $this->userRepository = $userRepository;
    }

    public function make($name, $surname, $email, $password, $profile_image)
    {
        $user = $this->user->make([
            'name' => $name,
            'surname' => $surname,
            'email' => $email,
            'password' => $password,
            'profile_image' => $profile_image,
        ]);
        return $user;
    }

    public function create($name, $surname, $email, $password, $profile_image)
    {
        $user = $this->make($name, $surname, $email, $password, $profile_image);
        $this->userRepository->save($user);
        return $user;
    }
}