<?php
declare(strict_types=1);

namespace App\Core\Domain\Provider\Cart;

use App\Core\Domain\Model\Cart\Cart;

abstract class AbstractCartProvider
{
    abstract function getCart(): Cart;
}