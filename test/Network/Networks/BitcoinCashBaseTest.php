<?php

namespace pingi\BitcoinCash\Test\Network\Networks;

use pingi\BitcoinCash\Network\Networks\BitcoinCash;
use pingi\BitcoinCash\Network\Networks\BitcoinCashRegtest;
use pingi\BitcoinCash\Network\Networks\BitcoinCashTestnet;
use pingi\BitcoinCash\Test\AbstractTestCase;
use BitWasp\Bitcoin\Network\Network;

class BitcoinCashBaseTest extends AbstractTestCase
{
    public function getNetworks()
    {
        return [
            [new BitcoinCash()],
            [new BitcoinCashTestnet()],
            [new BitcoinCashRegtest()],
        ];
    }

    /**
     * @dataProvider getNetworks
     * @param Network $network
     * @throws \Exception
     */
    public function testSegwitBech32Disabled(Network $network)
    {
        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage("Cannot use bech32 addresses with bitcoin cash");

        $network->getSegwitBech32Prefix();
    }
}
