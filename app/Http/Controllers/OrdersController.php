<?php

namespace App\Http\Controllers;

use App\Api\Order\OrderFactoryInterface;
use App\Api\Order\OrderRepositoryInterface;
use App\Api\Order\OrderManagementInterface;
use App\Api\Model\OrderInterface;
use App\Api\User\UserRepositoryInterface;
use App\Api\Model\CartInterface;
use App\Repository\UserRepository;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /*
     *  TODO::creare un select per selezionare gli utenti di un ordine;
     */

    protected $orderFactory;
    protected $orderRepository;
    protected $orderManagement;
    protected $order;
    protected $cart;
    protected $user;

    public function __construct
    (
        OrderFactoryInterface $orderFactory,
        OrderRepositoryInterface $orderRepository,
        OrderManagementInterface $orderManagement,
        OrderInterface $order,
        CartInterface $cart,
        UserRepositoryInterface $user
    )
    {
        $this->orderFactory = $orderFactory;
        $this->orderRepository = $orderRepository;
        $this->orderManagement = $orderManagement;
        $this->order = $order;
        $this->cart = $cart;
        $this->user = $user;
        $this->middleware('is-admin');
    }

    public function add()
    {
        $users = $this->user->getAll();
        return view('order.add', compact('users'));
    }

    public function create(Request $request)
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
        $cart = $this->cart->content();
        $user_id = $request->user;
        $this->orderFactory->create($validatedData['name'], $validatedData['surname'], $validatedData['email'], $validatedData['address'], serialize($credit_card), $cart, $user_id);
        $request->session()->flash('alert-success', 'Ordine creato con successo');
        return redirect('order/add');
    }

    public function edit()
    {
        $users = $this->user->getAll();
        $orders = $this->orderRepository->getAll();
        return view('order.update', compact('orders', 'users'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'nullable',
            'surname' => 'nullable',
            'email' => 'nullable|email',
            'address' => 'nullable',
            'card_number' => 'nullable|numeric|digits:16',
            'cvv' => 'nullable|numeric|digits:3',
            'card_intestatary' => 'nullable',
            'expiration' => 'nullable|date_format:m/Y',
        ]);
        $credit_card = [
            'card_number' => $validatedData['card_number'],
            'cvv' => $validatedData['cvv'],
            'card_intestatary' => $validatedData['card_intestatary'],
            'expiration' => $validatedData['expiration'],
        ];
        $order = $this->orderRepository->getById($request->order);
        $this->orderManagement->update($validatedData, $order, $credit_card, $request->user);
        $request->session()->flash('alert-success', 'Ordine modificato con successo');
        return redirect('order/update');
    }

    public function remove()
    {
        $orders = $this->orderRepository->getAll();
        return view('order.delete', compact('orders'));
    }

    public function delete(Request $request)
    {
        $this->orderRepository->deleteById($request->order);
        $request->session()->flash('alert-success', 'Ordine eliminato con successo');
        return redirect('order/delete');
    }

    public function read()
    {
        $orders = $this->orderRepository->getAll();
        return view('order.read', compact('orders'));
    }
}
