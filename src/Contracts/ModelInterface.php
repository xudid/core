<?php

namespace Entity\Model;


use Core\Contracts\DataColumnInterface;
use Entity\Metadata\Association;
use Entity\Metadata\DataColumn;
use Exception;
use ReflectionException;

/**
 * Class Model
 * @package Entity\Model
 */
interface ModelInterface
{
	public static function model(string $model): ModelInterface;

	/**
	 * @return false|string
	 */
	public static function getClass();

	/**
	 * @return mixed|string
	 */
	public static function getShortClass();

	/**
	 * @return string
	 */
	public static function getTableName(): string;

	public static function getTable();

	/**
	 * @return array
	 */
	public static function getPrimaryKeys(): array;

	/**
	 * @return array
	 */
	public static function getForeignKeys(): array;

	/**
	 * @param string $name
	 * @return DataColumnInterface|null
	 */
	public static function getColumn(string $name): ?DataColumnInterface;

	/**
	 * @return array
	 * @throws ReflectionException
	 * @deprecated
	 */
	public static function getTableColumns(): array;

	/**
	 * @return array
	 * @throws ReflectionException
	 */
	public static function getColumns();

	/**
	 * @param string $className
	 * @return Association|false
	 */
	public static function getAssociation(string $className);

	/**
	 * Return Model association
	 * @return array
	 * @throws ReflectionException
	 */
	public static function getAssociations(): array;

	/**
	 * @return array
	 * @throws Exception
	 * @deprecated
	 */
	public static function getTableAssociations();

	/**
	 * @param string $propertyName
	 * @return |null
	 */
	public function getPropertyValue(string $propertyName);

	/**
	 * @return bool
	 */
	public function isProxy(): bool;

	/**
	 * @return array
	 */
	public static function getGetters();

	/**
	 * @return array
	 */
	public static function getSetters();

	public function __construct(array $datas = []);

	public static function hydrate(array $datas);

	/**
	 * @param string $className
	 * @return bool
	 */
	public static function exists(string $className): bool;

	public function __get($key);

	/**
	 * Magic setter to allow PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE
	 * to set table_ized column names
	 * @param $name
	 * @param $value
	 */
	public function __set($name, $value);

	/**
	 * @return int
	 */
	public function getId(): int;

	/**
	 * @param $id
	 * @return $this
	 */
	public function setId($id);
}