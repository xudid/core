<?php

namespace Core\Contracts;

/**
 * Class Request
 * @package Entity\Database\QueryBuilder
 * @author Didier Moindreau <dmoindreau@gmail.com> on 27/02/2021.
 */
interface RequestInterface
{
	public function setDDaoInterface(DaoInterface $databaseAbstractLayer);

	public function execute();
}