<?php


namespace App\Api\Category;


interface CategoryFactoryInterface
{
    public function make($title, $description, $image);
    public function create($title, $description, $image);
}