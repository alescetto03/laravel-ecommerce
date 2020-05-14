<?php


namespace App\Repository;


use App\Api\Category\CategoryRepositoryInterface;
use App\Api\Model\CategoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $category;

    public function __construct
    (
        CategoryInterface $category
    )
    {
        $this->category = $category;
    }

    public function save($category)
    {
        return $category->save();
    }

    public function getById($id)
    {
        return $this->category->find($id);
    }

    public function deleteById($id)
    {
        $category = $this->getById($id);
        $category->delete();
        return $category;
    }

    public function getAll()
    {
        return $this->category->all();
    }

    public function delete($category)
    {
        $this->category->delete();
        return $category;
    }
}