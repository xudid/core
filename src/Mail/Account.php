<?php

namespace Core\Mail;

class Account
{
    private string $host;
    private int $port;
    private ?string $userName;
    private ?string $password;
    private bool $tls;

    /**
     * Account constructor.
     */
    public function __construct(string $host, ?string $userName, ?string $password, string $port = '25', bool $tls = false)
    {
        $this->host = $host;
        $this->userName = $userName;
        $this->password = $password;
        $this->port = (int)$port;
        $this->tls = $tls;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function setHost(string $host): static
    {
        $this->host = $host;
        return $this;
    }

    public function getPort(): int
    {
        return $this->port;
    }

    public function setPort(int $port): static
    {
        $this->port = $port;
        return $this;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     * @return Account
     */
    public function setUserName(?string $userName): static
    {
        $this->userName = $userName;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }
    public function setPassword(?string $password): static
    {
        $this->password = $password;
        return $this;
    }
}
