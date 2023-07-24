<?php
declare(strict_types=1);

namespace App\Infrastructure\Provider\Cart;

use App\Entity\Cart;

abstract class AbstractCartProvider
{
    abstract public function getCart(): Cart;
}