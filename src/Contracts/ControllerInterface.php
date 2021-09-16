<?php

namespace Core\Contracts;

interface ControllerInterface
{
	public function modelManager(string $modelClass) : ManagerInterface;
	public function queryBuilder() : QueryBuilderInterface;
}