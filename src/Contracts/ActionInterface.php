<?php

namespace Core\Contracts;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;

interface ActionInterface extends MiddlewareInterface
{
    public function __construct(ResponseInterface $response, ...$properties);

    public function handle(ServerRequestInterface $request): ResponseInterface;
}