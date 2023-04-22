<?php
require_once dirname(__FILE__,2).'/models/Entities/InitEntity.php';

class GenerateKeys {

    private ?string $privateKey;
    private ?string $publicKey;

    /**
    * @return mixed
    */
    public function getPrivateKey()
    {
         return $this->privateKey;
    }

    /**
    * @param mixed $privateKey
    */
    public function setPrivateKey($privateKey = MY_PRIVATE_KEY): ?string
    {
        $this->privateKey = $privateKey;
    }

    /**
    * @return mixed
    */
    public function getPublicKey()
    {
        return $this->publicKey;
    }

    /**
    * @param mixed $publicKey
    */
    public function setPublicKey($publicKey = ""): ?string
    {
        $this->publicKey = $publicKey;
    }
}