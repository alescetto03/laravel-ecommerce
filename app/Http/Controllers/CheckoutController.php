<?php

namespace App\Http\Controllers;

use App\Api\Model\CartInterface;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    protected $cart;

    public function __construct
    (
        CartInterface $cart
    )
    {
        $this->cart = $cart;
    }

    public function index()
    {
        $total = $this->cart->total();
        $cart = $this->cart->content();
        $totalNoTax = $this->cart->priceTotal();
        $tax = $total - $totalNoTax;
        return view('checkout.checkout', compact('cart', 'total', 'tax'));
    }

    public function payment()
    {

    }
}
