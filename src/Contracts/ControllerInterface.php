<?php

namespace Xudid\Core\Contracts;

/**
 * Interface ControllerInterface
 * @package Core\Contracts
 * @author Didier Moindreau <dmoindreau@gmail.com> on 20/09/2021.
 */
interface ControllerInterface
{
	public function modelManager(string $modelClass) : ManagerInterface;
	public function queryBuilder() : QueryBuilderInterface;
	public function routeTo(string $routeName);
	public function redirectTo(string $url);
}