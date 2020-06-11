<?php

namespace App\Http\Controllers;

use App\Api\Badge\BadgeRepositoryInterface;
use App\Api\Product\ProductRepositoryInterface;
use App\Model\Product;
use Illuminate\Http\Request;

class ProductBadgeController extends Controller
{
    protected $badgeRepository;
    protected $productRepository;

    public function __construct
    (
        BadgeRepositoryInterface $badgeRepository,
        ProductRepositoryInterface $productRepository
    )
    {
        $this->badgeRepository = $badgeRepository;
        $this->productRepository = $productRepository;
        $this->middleware('is-admin');
    }

    public function edit($id)
    {
        $product = $this->productRepository->getById($id);
        $badges = $this->badgeRepository->getAll();
        return view('admin.badges.edit')->with([
            'product' => $product,
            'badges' => $badges
        ]);
    }

    public function update(Request $request)
    {
        $product = $this->productRepository->getById($request->product);
        $product->badges()->sync($request->badges);
        return redirect('products/read');
    }
}
