<?php


namespace Core\Security;

/**
 * Class Token
 * @package Core\Security
 */
class Token
{
    private int $length;
    private string $token;

    /**
     * Token constructor.
     * @param int $length 16 is the minimal recommended value
     */
    public function __construct(int $length = 16)
    {
        $this->length = $length/2;
        // $token = bin2hex(openssl_random_pseudo_bytes($this->length));
        $this->token = bin2hex(random_bytes($this->length));
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->token;
    }
}
