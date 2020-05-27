<?php


namespace App\Api\Order;


interface OrderRepositoryInterface
{
    public function save($order);
    public function getById($id);
    public function deleteById($id);
    public function getAll();
    public function delete($order);
}