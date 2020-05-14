<?php


namespace App\Management;


use App\Api\Category\CategoryManagementInterface;
use App\Api\Model\CategoryInterface;

class CategoryManagement implements CategoryManagementInterface
{
    protected $category;

    public function __construct
    (
        CategoryInterface $category
    )
    {
        $this->category = $category;
    }

    public function update($array, $category)
    {
        foreach ($array as $index => $item) {
            if ($item !== null) {
                $category->update([$index => $item]);
            }
        }
        return $category;
    }

    public function getByTitle($title)
    {
        return $this->category->where('title', $title)->first();
    }
}