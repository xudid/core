<?php

namespace Xudid\Core\Controller;

use Xudid\Core\Contracts\ControllerInterface;
use Xudid\Core\Contracts\ManagerInterface;
use Xudid\Core\Contracts\QueryBuilderInterface;
use Xudid\Core\Contracts\RouterInterface;
use Psr\Container\ContainerInterface;
use function Http\Response\send;

class ApplicationController implements ControllerInterface
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
		send($this->response);
	}

	public function modelManager(string $modelClass): ManagerInterface
	{
		return $this->managerInterface;
	}

	public function queryBuilder(): QueryBuilderInterface
	{
		return $this->queryBuilderInterface;
	}

	public function routeTo(string $routeName, array $params = [])
	{
		$url = $this->router->generateUrl($routeName, $params);
		$this->redirectTo($url);
	}

	public function redirectTo(string $url)
	{
		$this->response = $this->response->withStatus(302)->withHeader('Location', $url);
		$this->send();
		exit();
	}

}