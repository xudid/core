<?php


namespace Core\Security;


class Token
{
    private int $length;
    private string $token;

    public function __construct(int $length = 16)
    {
        $this->length = $length;
        // $token = bin2hex(openssl_random_pseudo_bytes($this->length));
        $this->token = bin2hex(random_bytes($this->length));
    }

    public function __toString()
    {
        return $this->token;
    }
}
