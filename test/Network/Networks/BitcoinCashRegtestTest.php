<?php

namespace pingi\BitcoinCash\Test\Network\Networks;

use pingi\BitcoinCash\Network\Networks\BitcoinCashRegtest;
use pingi\BitcoinCash\Network\Networks\BitcoinCashTestnet;
use pingi\BitcoinCash\Test\AbstractTestCase;

class BitcoinCashRegtestTest extends AbstractTestCase
{
    public function testBitcoinCash()
    {
        $regtest = new BitcoinCashRegtest();
        $testnet = new BitcoinCashTestnet();
        $this->assertEquals($testnet->getAddressByte(), $regtest->getAddressByte());
        $this->assertEquals($testnet->getP2shByte(), $regtest->getP2shByte());
        $this->assertEquals($testnet->getPrivByte(), $regtest->getPrivByte());
        $this->assertEquals($testnet->getHDPrivByte(), $regtest->getHDPrivByte());
        $this->assertEquals($testnet->getHDPubByte(), $regtest->getHDPubByte());
        $this->assertEquals('dab5bffa', $regtest->getNetMagicBytes());
        $this->assertEquals("bchreg", $regtest->getCashAddressPrefix());
    }
}
