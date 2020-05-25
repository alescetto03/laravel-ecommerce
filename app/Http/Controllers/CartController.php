<?php

namespace App\Http\Controllers;

use App\Api\Model\CartInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cart;

    public function __construct
    (
        CartInterface $cart
    )
    {
        $this->middleware('auth');
        $this->cart = $cart;
    }

    public function index()
    {
        $cart = $this->cart->content();
        $total = $this->cart->priceTotal();
        return view('cart.index', compact('cart', 'total'));
    }

    public function store(Request $request)
    {
        $this->cart->add($request->id, $request->name, +1, $request->price, 0, ['description' => $request->description, 'image' => $request->image]);
        return back();
    }

    public function update(Request $request)
    {
        $this->cart->update($request->id, $request->quantity);
        return back();
    }
}
