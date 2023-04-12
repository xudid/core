<?php

namespace Core\Mail;

use TypeError;

/**
 * Class Recepient
 * @package Core\Mail
 */
class Recepient
{
    const FROM = 'from';
    const TO = 'to';
    const CC = 'cc';
    const BCC = 'bcc';
    const REPLY = 'reply';

    private string $name;
    private string $mail;
    private string $type = self::TO;

    /**
     * Recepient constructor.
     */
    public function __construct(string $name, string $mail)
    {
        $this->name = $name;
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $this->mail = $mail;
        } else {
            throw new TypeError('$mail parameter must be a valid mail adress');
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMail(): string
    {
        return $this->mail;
    }

    public function from(): static
    {
        $this->type = self::FROM;
        return $this;
    }

    public function cc(): static
    {
        $this->type = self::CC;
        return $this;
    }

    public function bcc(): static
    {
        $this->type = self::BCC;
        return $this;
    }

    public function reply(): static
    {
        $this->type = self::REPLY;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }
}
