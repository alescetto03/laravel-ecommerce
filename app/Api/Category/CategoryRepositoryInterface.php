<?php


namespace App\Api\Category;


interface CategoryRepositoryInterface
{
    public function save($category);
    public function getById($id);
    public function deleteById($id);
    public function getAll();
    public function delete($category);
}