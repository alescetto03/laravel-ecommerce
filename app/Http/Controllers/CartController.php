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
        $totalTax = $this->cart->total();
        $tax = $totalTax - $total;
        return view('cart.index', compact('tax', 'cart', 'totalTax'));
    }

    public function store(Request $request)
    {
        $this->cart->add($request->id, $request->name, +1, $request->price, 0, ['description' => $request->description, 'image' => $request->image]);
        return redirect('/cart/index');
    }

    public function update(Request $request)
    {
        $this->cart->update($request->id, $request->quantity);
        return back();
    }

    public function delete(Request $request)
    {
        $this->cart->remove($request->id);
        return redirect('cart/index');
    }
}
