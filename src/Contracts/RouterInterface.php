<?php

namespace Core\Contracts;

interface RouterInterface
{
	public function generateUrl(string $routeName, $params): string;

}