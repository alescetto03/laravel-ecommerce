<?php


namespace App\Api\Badge;


interface BadgeFactoryInterface
{
    public function make($title, $badge, $value);
    public function create($title, $badge, $value);
}