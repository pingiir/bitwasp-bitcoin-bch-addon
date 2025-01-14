<?php

namespace pingi\BitcoinCash\Script\Interpreter;

use BitWasp\Bitcoin\Script\Interpreter\CheckerBase;
use BitWasp\Bitcoin\Script\ScriptInterface;
use BitWasp\Bitcoin\Transaction\SignatureHash\Hasher;
use BitWasp\Bitcoin\Transaction\SignatureHash\SigHash;
use pingi\BitcoinCash\Transaction\SignatureHash\SigHash as BchSigHash;
use BitWasp\Bitcoin\Transaction\SignatureHash\V1Hasher;
use BitWasp\Buffertools\Buffer;
use BitWasp\Buffertools\BufferInterface;

class BitcoinCashChecker extends CheckerBase
{
    /**
     * @var array
     */
    protected $sigHashCache = [];

    /**
     * @var int
     */
    protected $sigHashOptionalBits = SigHash::ANYONECANPAY | BchSigHash::BITCOINCASH;

    /**
     * @param ScriptInterface $script
     * @param int $sigHashType
     * @param int $sigVersion
     * @return BufferInterface
     * @throws \Exception
     */
    public function getSigHash(ScriptInterface $script, int $sigHashType, int $sigVersion): \BitWasp\Buffertools\BufferInterface
    {
        if ($sigVersion !== 0) {
            throw new \RuntimeException("SigVersion must be 0");
        }

        $cacheCheck = $sigHashType . $script->getBuffer()->getBinary();
        if (!isset($this->sigHashCache[$cacheCheck])) {
            if ($sigHashType & BchSigHash::BITCOINCASH) {
                $hasher = new V1Hasher($this->transaction, $this->amount);
            } else {
                $hasher = new Hasher($this->transaction);
            }

            $hash = $hasher->calculate($script, $this->nInput, $sigHashType);
            $this->sigHashCache[$cacheCheck] = $hash->getBinary();
        } else {
            $hash = new Buffer($this->sigHashCache[$cacheCheck], 32);
        }

        return $hash;
    }
}
