<?php

namespace App\Tests;

use App\App\Service\GetCartFromSession;
use App\Entity\Cart;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;

class GetCartTest extends TestCase
{
    public function testReturnCartObject(): void
    {
        $this->setSession();
        $cart = (new GetCartFromSession())->getCart();
        $this->assertIsObject($cart);
    }

    public function testCartObjectHaveAttr(): void
    {
        $this->setSession();
        $cart = (new GetCartFromSession())->getCart();
        $this->assertObjectHasAttribute('currency', $cart);
        $this->assertObjectHasAttribute('amount', $cart);
        $this->assertObjectHasAttribute('items', $cart);

    }

    public function test09Something(): void
    {
        $cart= new Cart();

        $mock = $this->getMockBuilder(GetCartFromSession::class);
        $CartCheck = $mock->setMethods(['getCart'])->disableOriginalConstructor()->getMock();
        $CartCheck->expects($this->once())
            ->method('getCart')
            ->will($this->returnValue($cart));
        $CartCheck->getCart();
    }

    private function setSession(): void
    {
        $_SESSION["cart"] = '{"amount":120,"currency":"PLN","items":[{"name":"Koszulka z bufiastymi rękawami","price":100,"quantity":1},{"name":"Gumka do włosów","price":10,"quantity":2}]}';
    }

}
