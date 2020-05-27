<?php

namespace App\Http\Controllers;

use App\Api\Category\CategoryRepositoryInterface;
use App\Api\Product\ProductFactoryInterface;
use App\Api\Product\ProductManagementInterface;
use App\Api\Product\ProductRepositoryInterface;
use Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'price' => 'required',
            'image' => 'required|file|image',
            'category' => 'required',
        ]);
        $faker = new Faker\Product();
        $sku = $faker->sku($validatedData['name']);
        $this->productFactory->create($sku, $validatedData['name'], $validatedData['description'], $validatedData['price'], $validatedData['image']->store('uploads', 'public'), $validatedData['category']);
        Storage::disk('uploads')->put('uploads', $validatedData['image']);
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
            'price' => 'nullable',
            'image' => 'nullable|file|image',
            'category_id' => 'nullable',
        ]);
        $product = $this->productRepository->getById($request->product);
        if ($request->has('image')) {
            Storage::disk('uploads')->put('uploads', $validatedData['image']);
            $validatedData['image'] = $validatedData['image']->store('uploads', 'public');
            Storage::disk('uploads')->delete($product->image);
        }
        $this->productManagement->update($validatedData, $product);
        $request->session()->flash('alert-success', 'Prodotto modificato con successo');
        return redirect('products/update');
    }

    public function read()
    {
        $products =  $this->productRepository->getAll();
        return view('categories-products.products.read', ['products' => $products]);
    }

    public function remove()
    {
        $products = $this->productRepository->getAll();
        return view('categories-products.products.delete', compact('products'));
    }

    public function delete(Request $request)
    {
        $product = $this->productRepository->deleteById($request->product);
        Storage::disk('uploads')->delete($product->image);
        $request->session()->flash('alert-success', 'Prodotto eliminato con successo');
        return redirect('products/delete');
    }
}
