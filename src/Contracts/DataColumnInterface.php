<?php

namespace Core\Contracts;

/**
 * Interface DataColumnInterface
 * @package Core\Contracts
 * @author Didier Moindreau <dmoindreau@gmail.com> on 20/09/2021.
 */
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
