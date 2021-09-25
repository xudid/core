<?php

namespace Core\Contracts;


/**
 * Class Association
 * @package Entity\Metadata
 * @author Didier Moindreau <dmoindreau@gmail.com> on 20/09/2021.
 */
interface AssociationInterface
{
	const ManyToMany = 'ManyToMany';
	const ManyToOne = 'ManyToOne';
	const OneToMany = 'OneToMany';
	const OneToOne = 'OneToOne';

	/**
	 * @param mixed $holdingClassName
	 * @return AssociationInterface
	 */
	public function setHoldingClassName(string $holdingClassName);

	/**
	 * @param mixed $outClassName
	 * @return AssociationInterface
	 */
	public function setOutClassName(string $outClassName);

	/**
	 * @return string
	 */
	public function getHoldingClassName(): string;

	/**
	 * @return string
	 */
	public function getOutClassName(): string;

	/**
	 * @return string
	 */
	public function getName(): string;

	/**
	 * @return string
	 */
	public function getType(): string;

	/**
	 * @return string
	 */
	public function getTableName(): string;
}
