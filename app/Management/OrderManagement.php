<?php

namespace App\Management;


use App\Api\Order\OrderManagementInterface;
use App\Api\Model\OrderInterface;

class OrderManagement implements OrderManagementInterface
{
    protected $order;

    public function __construct
    (
        OrderInterface $order
    )
    {
        $this->order = $order;
    }

    public function update($array, $order, $credit_card, $user_id)
    {
        foreach ($array as $index => $item) {
            if ($item !== null) {
                $order->update([$index => $item]);
            }
        }
        if($credit_card !== null) {
            $order->update(['credit_card' => $credit_card]);
        }
        if($user_id !== null) {
            $order->update(['user_id' => $user_id]);
        }
        return $order;
    }
}