<?php

namespace Core\Http;

use Psr\Http\Message\ServerRequestInterface;

class Request
{
    public static function has(ServerRequestInterface $request, $field): bool
    {
        $requestDatas = $request->getParsedBody() ?? [];
        return array_key_exists($field, $requestDatas);
    }

    public static function get(ServerRequestInterface $request, $field)
    {
        if (static::has($request, $field)) {
            $requestDatas = $request->getParsedBody() ?? [];
            return $requestDatas[$field];
        }
       return '';
    }
}
