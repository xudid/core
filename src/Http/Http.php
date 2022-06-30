<?php

namespace Core\Http;

use function Http\Response\send;
use Psr\Http\Message\ResponseInterface;

abstract class Http
{
    public static function send(ResponseInterface $response)
    {
        send($response);
    }
}