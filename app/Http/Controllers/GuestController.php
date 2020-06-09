<?php

namespace App\Http\Controllers;

use App\Api\Category\CategoryRepositoryInterface;
use App\Api\Model\BadgeInterface;
use App\Api\Model\ProductInterface;
use App\Api\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class GuestController extends Controller
{
    protected $categoryRepository;
    protected $productRepository;
    protected $product;
    protected $badge;

    public function __construct
    (
        CategoryRepositoryInterface $categoryRepository,
        ProductRepositoryInterface $productRepository,
        ProductInterface $product,
        BadgeInterface $badge
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->product = $product;
        $this->badge = $badge;
    }

    public function homepage()
    {
        $products = $this->badge->where('title', 'New')->first()->products->chunk(3);
        return view('homepage', compact('products'));
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

    public function search(Request $request)
    {
        if($request->category == "Tutte") {
            $products = $this->product->where('name', 'like', '%' . $request->search . '%')->get();
            return view('search', compact('products'));
        }
        $products = $this->product->where('category_id', $request->category)->where('name', 'like', '%' . $request->search . '%')->get();
        return view('search', compact('products'));
    }

    public function fetch(Request $request)
    {
        $query = $request->get('query');
        if($query) {
            if($request->category == "Tutte") {
                $data = $this->product->where('name', 'like', '%' . $query . '%')->get();
            }
            else {
                $data = $this->product->where('category_id', $request->category)->where('name', 'like', '%' . $query . '%')->get();
            }
            $data = $data->slice(0, 3);
            $output = '<ul class="dropdown-menu bg-dark w-100 d-block">';
            foreach($data as $row)
            {
                $output .= '<li class="dropdown-item">' . '<div class="row">' . '<div class="image-wrapper w-25 col-auto"><img src="' . asset('storage/' . $row->image) . '" class="img-dim"></div>' . '<div class="w-75 col-auto">' . '<p class="my-0"><a href="' . url('products/' . $row->id . '/' . $row->name) . '" class="text-orangeBrand link-hover_Orange">' . $row->name . '</a></p>';
                if ($row->badges->where('title', 'New')->isNotEmpty()) {
                    $output .=
                    '<p class="my-0">
                        <svg class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                        <span>Nuovo!</span>
                        <svg class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                    </p>';
                }
                $output .= '<p class="my-0">' . '<span class="mr-1">' . $row->price . '</span>' . '</p>' . '</div>' . '</div>' . '</li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
}
