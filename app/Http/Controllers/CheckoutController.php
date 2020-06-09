<?php

namespace App\Http\Controllers;

use App\Api\Order\OrderFactoryInterface;
use App\Api\Order\OrderRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use LVR\CreditCard\CardCvc;
use LVR\CreditCard\CardNumber;
use LVR\CreditCard\CardExpirationYear;
use LVR\CreditCard\CardExpirationMonth;
use App\Api\Model\CartInterface;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    protected $cart;
    protected $orderFactory;
    protected $orderRepository;

    public function __construct
    (
        CartInterface $cart,
        OrderFactoryInterface $orderFactory,
        OrderRepositoryInterface $orderRepository
    )
    {
        $this->middleware('auth');
        $this->cart = $cart;
        $this->orderFactory = $orderFactory;
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        $total = $this->cart->total();
        $cart = $this->cart->content();
        $tax = $this->cart->tax();
        return view('checkout.checkout', compact('cart', 'total', 'tax'));
    }

    public function payment(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'card_number' => 'required|numeric|digits:16',
            'cvv' => 'required|numeric|digits:3',
            'card_intestatary' => 'required',
            'expiration' => 'required|date_format:m/Y',
        ]);
        $credit_card = [
            'card_number' => $validatedData['card_number'],
            'cvv' => $validatedData['cvv'],
            'card_intestatary' => $validatedData['card_intestatary'],
            'expiration' => $validatedData['expiration'],
        ];
        $user_id = $request->user()->id;
        $cart = $this->cart->content();
        $this->orderFactory->create($validatedData['name'], $validatedData['surname'], $validatedData['email'], $validatedData['address'], serialize($credit_card), $cart, $user_id);
        $request->session()->flash('alert-success', '<strong>IL TUO ORDINE E\' STATO CONFERMATO</strong> Grazie per aver scelto il nostro servizio!');
        $this->cart->destroy();
        return redirect('/chronology');
    }

    public function chronology()
    {
        $orders = Auth::user()->orders;
        return view('purchase.chronology', compact('orders'));
    }
}
