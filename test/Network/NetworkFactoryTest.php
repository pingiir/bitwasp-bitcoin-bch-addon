<?php

namespace pingi\BitcoinCash\Test\Network;

use pingi\BitcoinCash\Network\NetworkFactory;
use pingi\BitcoinCash\Network\Networks\BitcoinCash;
use pingi\BitcoinCash\Network\Networks\BitcoinCashRegtest;
use pingi\BitcoinCash\Network\Networks\BitcoinCashTestnet;
use pingi\BitcoinCash\Test\AbstractTestCase;

class NetworkFactoryTest extends AbstractTestCase
{
    public function testBitcoinCash()
    {
        $this->assertInstanceOf(
            BitcoinCash::class,
            NetworkFactory::bitcoinCash()
        );
    }

    public function testBitcoinCashTestnet()
    {
        $this->assertInstanceOf(
            BitcoinCashTestnet::class,
            NetworkFactory::bitcoinCashTestnet()
        );
    }

    public function testBitcoinCashRegtest()
    {
        $this->assertInstanceOf(
            BitcoinCashRegtest::class,
            NetworkFactory::bitcoinCashRegtest()
        );
    }
}
