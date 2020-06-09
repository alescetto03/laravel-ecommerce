<?php


namespace App\Management;


use App\Api\Badge\BadgeManagementInterface;

class BadgeManagement implements BadgeManagementInterface
{
    public function update($array, $badge)
    {
        foreach ($array as $index => $item) {
            if ($item !== null) {
                $badge->update([$index => $item]);
            }
        }
        return $badge;
    }
}