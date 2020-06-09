<?php


namespace App\Factory;


use App\Api\Badge\BadgeFactoryInterface;
use App\Api\Badge\BadgeRepositoryInterface;
use App\Api\Model\BadgeInterface;

class BadgeFactory implements BadgeFactoryInterface
{
    protected $badge;
    protected $badgeRepository;

    public function __construct
    (
        BadgeInterface $badge,
        BadgeRepositoryInterface $badgeRepository
    )
    {
        $this->badge = $badge;
        $this->badgeRepository = $badgeRepository;
    }

    public function make($title, $badge, $value)
    {
        $badge = $this->badge->make([
            'title' => $title,
            'badge' => $badge,
            'value' => $value,
        ]);
        return $badge;
    }

    public function create($title, $badge, $value)
    {
        $badge = $this->make($title, $badge, $value);
        $this->badgeRepository->save($badge);
        return $badge;
    }
}