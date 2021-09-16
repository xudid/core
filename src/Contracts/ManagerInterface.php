<?php

namespace Core\Contracts;

interface ManagerInterface
{
	public function enableDebug();

	public function setProxyCachePath(string $path): ManagerInterface;

	public function setBuilder(QueryBuilderInterface $builder) : ManagerInterface;

	public function builder(): QueryBuilderInterface;

	public function findById($id);

	public function findBy(array $params);

	public function findAll();

	public function findAssociationValuesBy(string $associationClassname, ModelInterface $model);

	public function insert($object);

	public function create($object);

	public function update($object);

	public function delete($object);
}
