<?php

namespace App\Listeners;

use App\Api\Model\CartInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CartRestoring
{
    protected $cart;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct
    (
        CartInterface $cart
    )
    {
        $this->cart = $cart;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $this->cart->restore($event->user);
    }
}
