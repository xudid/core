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

    public static function redirect(ResponseInterface $response, $url)
    {
        $response = $response->withStatus(302)->withHeader('Location', $url);
        static::send($response);
        exit();
    }
}
