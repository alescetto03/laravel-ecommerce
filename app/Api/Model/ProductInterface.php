<?php


namespace App\Api\Model;


interface ProductInterface
{
    public function category();
    public function badges();
    public function discount($sale);
}