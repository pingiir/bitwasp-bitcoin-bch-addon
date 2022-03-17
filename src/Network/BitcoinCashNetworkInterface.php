<?php

namespace pingi\BitcoinCash\Network;

interface BitcoinCashNetworkInterface
{
    /**
     * @return string
     */
    public function getCashAddressPrefix();
}
