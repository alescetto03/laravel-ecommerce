<?php


namespace App\Factory;


use App\Api\Category\CategoryFactoryInterface;
use App\Api\Category\CategoryRepositoryInterface;
use App\Api\Model\CategoryInterface;

class CategoryFactory implements CategoryFactoryInterface
{
    protected $category;
    protected $categoryRepository;

    public function __construct
    (
        CategoryInterface $category,
        CategoryRepositoryInterface $categoryRepository
    )
    {
        $this->category = $category;
        $this->categoryRepository = $categoryRepository;
    }

    public function make($title, $description, $image)
    {
        $category = $this->category->make([
            'title' => $title,
            'description' => $description,
            'image' => $image,
        ]);
        return $category;
    }

    public function create($title, $description, $image)
    {
        $category = $this->make($title, $description, $image);
        $this->categoryRepository->save($category);
        return $category;
    }
}