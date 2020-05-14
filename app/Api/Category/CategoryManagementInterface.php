<?php


namespace App\Api\Category;


interface CategoryManagementInterface
{
    public function update($array, $category);
    public function getByTitle($title);
}