<?php

namespace App\Http\Controllers;

use App\Api\Category\CategoryRepositoryInterface;
use App\Api\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    protected $categoryRepository;
    protected $productRepository;

    public function __construct
    (
        CategoryRepositoryInterface $categoryRepository,
        ProductRepositoryInterface $productRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function productIndex()
    {
        $categories = $this->categoryRepository->getAll();
        return view('categories-products.categories.index', compact('categories'));
    }
    public function category($id)
    {
        $category = $this->categoryRepository->getById($id);
        return view('categories-products.categories.category', compact('category'));
    }

    public function product($id)
    {
        $product = $this->productRepository->getById($id);
        return view('categories-products.products.product', compact('product'));
    }
}
