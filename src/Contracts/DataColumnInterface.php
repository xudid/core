<?php

namespace Core\Contracts;

interface DataColumnInterface
{
	/**
	 * @return string
	 */
	public function getName(): string;

	/**
	 * @return string
	 */
	public function getType(): string;

	public function setIsPrimary();

	public function setIsAutoIncrement();

	/**
	 * @return bool
	 */
	public function isPrimary(): bool;

	/**
	 * @return bool
	 */
	public function isAutoIncrement(): bool;
}