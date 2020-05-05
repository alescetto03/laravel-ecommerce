<?php


namespace App\Repository;


use App\Api\Model\UserInterface;
use App\Api\User\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    protected $user;

    public function __construct
    (
        UserInterface $user
    )
    {
        $this->user = $user;
    }

    public function save($user)
    {
        return $user->save();
    }

    public function getById($id)
    {
        return $this->user->find($id);
    }

    public function deleteById($id)
    {
        $user = $this->getById($id);
        $user->delete();
        return $user;
    }

    public function getAll()
    {
        return $this->user->all();
    }

    public function delete($user)
    {
        $this->user->delete();
        return $user;
    }
}