<?php

namespace Core\Contracts;

/**
 * Class QueryBuilder
 * @package QueryBuilder
 */
interface QueryBuilderInterface
{
	public function createTable(string $name) : TableRequest;

	public function dropTable(string $name) : bool;

	public function select(...$fields): SelectRequest;

	public function insert(string $table): InsertRequest;

	public function update(string $table): UpdateRequest;

	public function delete(... $tables): DeleteRequest;

	public function enableDebug();

	public function execute(Request $request);
}