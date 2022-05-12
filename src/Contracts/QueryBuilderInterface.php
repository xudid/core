<?php

namespace Core\Contracts;

/**
 * Class QueryBuilder
 * @package QueryBuilder
 */
interface QueryBuilderInterface
{
	public function createTable(string $name) : TableRequestInterface;

	public function dropTable(string $name) : TableRequestInterface;

	public function select(...$fields): SelectRequestInterface;

	public function insert(string $table): InsertRequestInterface;

	public function update(string $table): UpdateRequestInterface;

	public function delete(... $tables): DeleteRequestInterface;

	public function enableDebug():QueryBuilderInterface;

	public function execute(RequestInterface $request);
}