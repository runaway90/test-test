<?php

namespace App\App\Service;

use App\Domain\Model\Cart\Cart;
use App\Infrastructure\Provider\Cart\AbstractCartProvider;
use Symfony\Component\HttpFoundation\Request;

class GetCartService extends AbstractCartProvider
{

    public function getCart(Request $request): Cart
    {
        // TODO: Implement getCart() method.
    }
}