<?php

namespace App\Http\Controllers;

use App\Api\Category\CategoryRepositoryInterface;
use App\Api\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $categoryRepository;
    protected $productRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct
    (
        CategoryRepositoryInterface $categoryRepository,
        ProductRepositoryInterface $productRepository
    )
    {
        $this->middleware('auth');
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function productIndex()
    {
        $categories = $this->categoryRepository->getAll();
        return view('categories-products.categories.index', compact('categories'));
    }

    public function management()
    {
        if (Auth::user()->can('product-management') || Auth::user()->can('user-management')) {
            return view('admin.admin_page');
        }
        return redirect('/');
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
