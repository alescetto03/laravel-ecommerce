<?php

namespace App\Http\Controllers;

use App\Api\Order\OrderFactoryInterface;
use App\Api\Order\OrderRepositoryInterface;
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
        $totalNoTax = $this->cart->priceTotal();
        $tax = $total - $totalNoTax;
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
        $this->cart->destroy();
        return redirect('thankyou');
    }

    public function thanks()
    {
        echo "thank you :)";
    }

    public function chronology()
    {
        $orders = $this->orderRepository->getAll();
        return view('purchase.chronology', compact('orders'));
    }
}
