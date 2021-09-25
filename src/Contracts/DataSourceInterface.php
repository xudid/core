<?php


namespace Core\Contracts;;

/**
 * Interface DataSourceInterface
 * @package Core\Contracts
 * @author Didier Moindreau <dmoindreau@gmail.com> on 20/09/2021.
 */
interface DataSourceInterface
{
    public function getName(): string;
    public function getConfig(): array;
	public function getDriver();
}
