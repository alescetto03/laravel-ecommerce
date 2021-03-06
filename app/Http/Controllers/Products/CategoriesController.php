<?php

namespace App\Http\Controllers;

use App\Api\Category\CategoryFactoryInterface;
use App\Api\Category\CategoryManagementInterface;
use App\Api\Category\CategoryRepositoryInterface;
use App\Api\Model\CategoryInterface;
use App\Api\Product\ProductManagementInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    protected $categoryFactory;
    protected $categoryRepository;
    protected $categoryManagement;
    protected $category;
    protected $productManagement;

    public function __construct
    (
        CategoryFactoryInterface $categoryFactory,
        CategoryRepositoryInterface $categoryRepository,
        CategoryManagementInterface $categoryManagement,
        CategoryInterface $category,
        ProductManagementInterface $productManagement
    )
    {
        $this->categoryFactory = $categoryFactory;
        $this->categoryRepository = $categoryRepository;
        $this->categoryManagement = $categoryManagement;
        $this->category = $category;
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
            'image' => 'required|file|image',
        ]);
        $category = $this->categoryFactory->create($validatedData['title'], $validatedData['description'], $validatedData['image']->store('uploads', 'public'));
        Storage::disk('uploads')->put('uploads', $validatedData['image']);
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
            'image' => 'nullable|file|image',
        ]);
        $category = $this->categoryRepository->getById($request->category);
        if ($category->title == 'Varie') {
            $request->session()->flash('alert-danger', 'Non puoi modificare la categoria Varie!');
            return redirect('categories/update');
        }
        if ($request->has('image')) {
            Storage::disk('uploads')->put('uploads', $validatedData['image']);
            $validatedData['image'] = $validatedData['image']->store('uploads', 'public');
            Storage::disk('uploads')->delete($category->image);
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
        $varie = $this->category->where('title', 'Varie')->first()->id;
        $this->productManagement->switchCategory($category->products()->get(), $varie);
        $category->delete();
        Storage::disk('uploads')->delete($category->image);
        $request->session()->flash('alert-success', 'Categoria eliminata con successo');
        return redirect('categories/delete');
    }

    public function read()
    {
        $categories =  $this->categoryRepository->getAll();
        return view('categories-products.categories.read', ['categories' => $categories]);
    }
}
