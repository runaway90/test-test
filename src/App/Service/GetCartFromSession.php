<?php

namespace App\App\Service;

use App\Entity\Cart;
use App\Entity\Item;
use App\Infrastructure\Exception\GetCartException;
use App\Infrastructure\Provider\Cart\AbstractCartProvider;
use Symfony\Component\HttpKernel\Log\Logger;

class GetCartFromSession extends AbstractCartProvider
{

    public function getCart(): Cart
    {
        $deserializationData = $this->deserializeFromSession();

        $cart = (new Cart())->setAmount($deserializationData->amount)->setCurrency($deserializationData->currency);
        foreach ($deserializationData->items as $item) {
            $item = (new Item())->setPrice($item->price)->setQuantity($item->quantity)->setName($item->name)->setCart($cart);
            $cart->addItem($item);
        }
        // without saving, only get like Object
        return $cart;
    }

    public function deserializeFromSession()
    {
        return json_decode($_SESSION['cart']);
    }
}