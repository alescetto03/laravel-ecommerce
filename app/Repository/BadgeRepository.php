<?php


namespace App\Repository;


use App\Api\Badge\BadgeRepositoryInterface;
use App\Api\Model\BadgeInterface;

class BadgeRepository implements BadgeRepositoryInterface
{
    protected $badge;

    public function __construct
    (
        BadgeInterface $badge
    )
    {
        $this->badge = $badge;
    }

    public function save($badge)
    {
        return $badge->save();
    }

    public function getById($id)
    {
        return $this->badge->find($id);
    }

    public function deleteById($id)
    {
        $badge = $this->getById($id);
        $badge->delete();
        return $badge;
    }

    public function getAll()
    {
        return $this->badge->all();
    }

    public function delete($badge)
    {
        $this->badge->delete();
        return $badge;
    }
}