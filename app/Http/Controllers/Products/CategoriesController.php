<?php

namespace App\Http\Controllers;

use App\Api\Category\CategoryFactoryInterface;
use App\Api\Category\CategoryManagementInterface;
use App\Api\Category\CategoryRepositoryInterface;
use App\Api\Product\ProductManagementInterface;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    protected $categoryFactory;
    protected $categoryRepository;
    protected $categoryManagement;
    protected $productManagement;

    public function __construct
    (
        CategoryFactoryInterface $categoryFactory,
        CategoryRepositoryInterface $categoryRepository,
        CategoryManagementInterface $categoryManagement,
        ProductManagementInterface $productManagement
    )
    {
        $this->categoryFactory = $categoryFactory;
        $this->categoryRepository = $categoryRepository;
        $this->categoryManagement = $categoryManagement;
        $this->productManagement = $productManagement;
        $this->middleware('is-admin');
    }

    public function add() {
        return view('categories-products.categories.add');
    }

    public function create(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ]);
        $category = $this->categoryFactory->create($validatedData['title'], $validatedData['description'], $validatedData['image']);
        $request->session()->flash('alert-success', 'Categoria aggiunta con successo');
        return redirect('categories/add');
    }

    public function edit()
    {
        $categories = $this->categoryRepository->getAll();
        return view('categories-products.categories.update', compact('categories'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable|image',
        ]);
        $category = $this->categoryRepository->getById($request->category);
        if ($category->title == 'Varie') {
            $request->session()->flash('alert-danger', 'Non puoi modificare la categoria Varie!');
            return redirect('categories/update');
        }
        $this->categoryManagement->update($validatedData, $category);
        $request->session()->flash('alert-success', 'Categoria modificata con successo');
        return redirect('categories/update');
    }

    public function remove()
    {
        $categories = $this->categoryRepository->getAll();
        return view('categories-products.categories.delete', compact('categories'));
    }

    public function delete(Request $request)
    {
        $category = $this->categoryRepository->getById($request->category);
        if ($category->title == 'Varie') {
            $request->session()->flash('alert-danger', 'Non puoi eliminare la categoria Varie!');
            return redirect('categories/delete');
        }
        $this->productManagement->switchCategory($category->products()->get(), 1);
        $category->delete();
        $request->session()->flash('alert-success', 'Categoria eliminata con successo');
        return redirect('categories/delete');
    }
}
