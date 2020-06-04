<?php


namespace App\Api\Order;


interface OrderManagementInterface
{
    public function update($array, $order, $credit_card, $user_id);
}