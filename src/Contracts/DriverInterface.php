<?php

namespace Core\Contracts;

interface DriverInterface
{
	public function __construct(DataSourceInterface $dataSource);
	public function getConnectionUrl() : string;
	public function getConnexion();
}
