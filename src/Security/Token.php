<?php


namespace Xudid\Core\Security;

use DateTimeImmutable;

/**
 * Class Token
 * @package Core\Security
 */
class Token
{
    private int $length;
    private string $token;

    private DateTimeImmutable $creationDate;

    /**
     * Token constructor.
     * @param int $length 16 is the minimal recommended value
     */
    public function __construct(int $length = 16)
    {
        $this->length = $length / 2;
        // $token = bin2hex(openssl_random_pseudo_bytes($this->length));
        $this->token = bin2hex(random_bytes($this->length));
        $this->creationDate = new DateTimeImmutable();
    }

    public function isExpired(int $validityMinutes): bool
    {
        $expirationDate = $this->creationDate->modify('+' . $validityMinutes . ' minutes');
        return $expirationDate < new DateTimeImmutable();
    }

    public function __toString(): string
    {
        return $this->token;
    }
}
