<?php

namespace Core\Mail;


class Account
{
    private string $host;
    private int $port = 25;
    private ?string $userName;
    private ?string $password;

    /**
     * Account constructor.
     * @param string $host
     * @param string $userName
     * @param string $password
     */
    public function __construct(string $host, ?string $userName, ?string $password)
    {
        $this->host = $host;
        $this->userName = $userName;
        $this->password = $password;
    }


    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @param string $host
     * @return Account
     */
    public function setHost(string $host): Account
    {
        $this->host = $host;
        return $this;
    }

    /**
     * @return int
     */
    public function getPort(): int
    {
        return $this->port;
    }

    /**
     * @param int $port
     * @return Account
     */
    public function setPort(int $port): Account
    {
        $this->port = $port;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserName(): ?string
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     * @return Account
     */
    public function setUserName(?string $userName): Account
    {
        $this->userName = $userName;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return Account
     */
    public function setPassword(?string $password): Account
    {
        $this->password = $password;
        return $this;
    }


}