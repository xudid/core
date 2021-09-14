<?php

namespace Core\Controller;

use Core\Contracts\ControllerInterface;
use Core\Contracts\RouterInterface;
use Psr\Container\ContainerInterface;

class BaseController implements ControllerInterface
{
	private ContainerInterface $container;
	private RouterInterface $router;

	/**
	 * @param ContainerInterface $container
	 */
	public function __construct(ContainerInterface $container, RouterInterface $router)
	{
		$this->container = $container;
		$this->router = $router;
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
}