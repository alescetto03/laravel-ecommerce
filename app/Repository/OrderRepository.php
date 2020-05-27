<?php


namespace App\Repository;


use App\Api\Model\OrderInterface;
use App\Api\Order\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{
    protected $order;

    public function __construct
    (
        OrderInterface $order
    )
    {
        $this->order = $order;
    }

    public function save($order)
    {
        return $order->save();
    }

    public function getById($id)
    {
        return $this->order->find($id);
    }

    public function deleteById($id)
    {
        $order = $this->getById($id);
        $order->delete();
        return $order;
    }

    public function getAll()
    {
        return $this->order->all();
    }

    public function delete($order)
    {
        $this->order->delete();
        return $order;
    }
}