<?php


namespace App\Factory;


use App\Api\Model\OrderInterface;
use App\Api\Order\OrderFactoryInterface;
use App\Api\Order\OrderRepositoryInterface;

class OrderFactory implements OrderFactoryInterface
{
    protected $order;
    protected $orderRepository;

    public function __construct
    (
        OrderInterface $order,
        OrderRepositoryInterface $orderRepository
    )
    {
        $this->order = $order;
        $this->orderRepository = $orderRepository;
    }

    public function make($name, $surname, $email, $address, $credit_card, $cart, $user_id)
    {
        $order = $this->order->make([
            'name' => $name,
            'surname' => $surname,
            'email' => $email,
            'address' => $address,
            'credit_card' => $credit_card,
            'cart' => $cart,
            'user_id' => $user_id,
        ]);
        return $order;
    }

    public function create($name, $surname, $email, $address, $credit_card, $cart, $user_id)
    {
        $order = $this->make($name, $surname, $email, $address, $credit_card, $cart, $user_id);
        $this->orderRepository->save($order);
        return $order;
    }

}