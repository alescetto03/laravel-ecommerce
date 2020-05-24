<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cart = Cart::content();
        $total = Cart::total();
        return view('cart.index', compact('cart', 'total'));
    }

    public function store(Request $request)
    {
        Cart::add($request->id, $request->name, +1, $request->price, 0, ['description' => $request->description, 'image' => $request->image]);
        return back();
    }

    public function update(Request $request)
    {
        Cart::update($request->id, $request->quantity);
        return back();
    }
}
