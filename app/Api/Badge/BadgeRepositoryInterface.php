<?php


namespace App\Api\Badge;


interface BadgeRepositoryInterface
{
    public function save($badge);
    public function getById($id);
    public function deleteById($id);
    public function getAll();
    public function delete($badge);
}