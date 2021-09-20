<?php
namespace Core\Contracts;

/**
 * Interface DaoInterface
 * @package Core\Contracts
 * @author Didier Moindreau <dmoindreau@gmail.com> on 20/09/2021.
 */
interface DaoInterface
{
	/**
	 * @param RequestInterface $request
	 * @param string $className
	 * @return mixed
	 */
    public function execute(RequestInterface $request, string $className );

    public function enableDebug();

    public function getDriver();

}

