<?php

namespace Core\Controller;

use Core\Contracts\ControllerInterface;
use Core\Contracts\ManagerInterface;
use Core\Contracts\QueryBuilderInterface;
use Core\Contracts\RouterInterface;
use Psr\Container\ContainerInterface;

class BaseController implements ControllerInterface
{
	private ContainerInterface $container;
	private RouterInterface $router;
	private ManagerInterface $managerInterface;
	private QueryBuilderInterface $queryBuilderInterface;
	private mixed $request;
	private mixed $response;

	/**
	 * @param ContainerInterface $container
	 */
	public function __construct(ContainerInterface $container, RouterInterface $router)
	{
		$this->container = $container;
		$this->router = $router;
		$this->managerInterface = $this->get(ManagerInterface::class);
		$this->queryBuilderInterface = $this->get(QueryBuilderInterface::class);
		$this->request = $this->get('request');
		$this->response = $this->get('response');
	}

	protected function get($key)
	{
		return $this->container->get($key);
	}

	protected function getEnvironment()
	{
		return $this->container->get('environment');
	}

	protected function send()
	{

	}

	public function modelManager(string $modelClass): ManagerInterface
	{
		return $this->managerInterface;
	}

	public function queryBuilder(): QueryBuilderInterface
	{
		return $this->queryBuilderInterface;
	}
}