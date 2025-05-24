<?php

namespace Xudid\Core\Contracts;

interface RouterInterface
{
	public function generateUrl(string $routeName, $params): string;

}