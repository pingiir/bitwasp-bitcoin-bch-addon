<?php

namespace pingi\BitcoinCash\Address;

use BitWasp\Bitcoin\Address\AddressInterface;
use pingi\BitcoinCash\Network\BitcoinCashNetworkInterface;

interface CashAddressInterface extends AddressInterface
{
    /**
     * @param BitcoinCashNetworkInterface $network
     * @return string
     */
    public function getPrefix(BitcoinCashNetworkInterface $network);
}
