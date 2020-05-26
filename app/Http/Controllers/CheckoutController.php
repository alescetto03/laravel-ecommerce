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
        return view('checkout.checkout', compact('total'));
    }

    public function payment()
    {

    }
}
