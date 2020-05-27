<?php


namespace App\Api\Order;


interface OrderFactoryInterface
{
    public function make($name, $surname, $email, $address, $credit_card, $cart, $user_id);
    public function create($name, $surname, $email, $address, $credit_card, $cart, $user_id);
}