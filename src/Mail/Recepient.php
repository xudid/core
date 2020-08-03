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
     * @param string $name
     * @param string $mail
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

    /**
     * @return string : the recepient name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string : the recepient mail
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * Set this recepient as the mail origin
     * @return $this
     */
    public function from()
    {
        $this->type = self::FROM;
        return$this;
    }

    /**
     * Set this recepient as cc of the mail
     * @return $this
     */
    public function cc()
    {
        $this->type = self::CC;
        return$this;
    }

    /**
     * Set this recepient as bcc of the mail
     * @return $this
     */
    public function bcc()
    {
        $this->type = self::BCC;
        return$this;
    }

    /**
     * Set this recepient as reply to
     * @return $this
     */
    public function reply()
    {
        $this->type = self::REPLY;
        return$this;
    }

    /**
     * @return string : the recepient type (FROM ...)
     */
    public function getType(): string
    {
        return $this->type;
    }
}
