<?php

namespace App\Http\Controllers;

use App\Api\Category\CategoryRepositoryInterface;
use App\Api\Product\ProductFactoryInterface;
use App\Api\Product\ProductManagementInterface;
use App\Api\Product\ProductRepositoryInterface;
use Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    protected $categoryRepository;
    protected $productFactory;
    protected $productRepository;
    protected $productManagement;

    public function __construct
    (
        CategoryRepositoryInterface $categoryRepository,
        ProductFactoryInterface $productFactory,
        ProductRepositoryInterface $productRepository,
        ProductManagementInterface $productManagement
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->productFactory = $productFactory;
        $this->productRepository = $productRepository;
        $this->productManagement = $productManagement;
        $this->middleware('is-admin');
    }

    public function add()
    {
        $categories = $this->categoryRepository->getAll();
        return view('categories-products.products.add', compact('categories'));
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'image' => 'required|image',
            'category' => 'required',
        ]);
        $faker = new Faker\Product();
        $sku = $faker->sku($validatedData['name']);
        $this->productFactory->create($sku, $validatedData['name'], $validatedData['description'], $validatedData['quantity'], $validatedData['price'], $validatedData['image']->store('uploads', 'public'), $validatedData['category']);
        $request->session()->flash('alert-success', 'Prodotto aggiunto con successo');
        return redirect('products/add');
    }

    public function edit()
    {
        $categories = $this->categoryRepository->getAll();
        $products = $this->productRepository->getAll();
        return view('categories-products.products.update', compact('categories', 'products'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'nullable',
            'description' => 'nullable',
            'quantity' => 'nullable',
            'price' => 'nullable',
            'image' => 'nullable|image',
            'category' => 'nullable',
        ]);
        $validatedData['image'] = $validatedData['image']->store('uploads', 'public');
        $product = $this->productRepository->getById($request->product);
        $product = $this->productManagement->update($validatedData, $product);
        $request->session()->flash('alert-success', 'Prodotto modificato con successo');
        return redirect('products/update');
    }

    public function read()
    {
        $products =  DB::table('products')->paginate(15);
        return view('categories-products.products.read', ['products' => $products]);
    }

    public function remove()
    {
        $products = $this->productRepository->getAll();
        return view('categories-products.products.delete', compact('products'));
    }

    public function delete(Request $request)
    {
        $this->productRepository->deleteById($request->product);
        $request->session()->flash('alert-success', 'Prodotto eliminato con successo');
        return redirect('products/delete');
    }

    public function product($id)
    {
        $product = $this->productRepository->getById($id);
        return view('categories-products.products.product', compact('product'));
    }
}
