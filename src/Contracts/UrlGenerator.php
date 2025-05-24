<?php

namespace Xudid\Core\Contracts;

interface UrlGenerator
{
    public function generate($pattern, $values): string;
}
