<?php

namespace Xudid\Core\Event;

use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\EventDispatcher\ListenerProviderInterface;

/**
 * Class Dispatcher
 * @package Core\Event
 */
class Dispatcher implements EventDispatcherInterface
{
    /**
     * @var ListenerProviderInterface
     */
    private ListenerProviderInterface $listenerProvider;

    /**
     * Dispatcher constructor.
     * @param ListenerProviderInterface $listenerProvider
     */
    public function __construct(ListenerProviderInterface $listenerProvider)
    {
        $this->listenerProvider = $listenerProvider;
    }

    /**
     * @param string $name
     * @param Listener $listener
     */
    public function on(string $name, Listener $listener)
    {
        $this->listenerProvider->on($name, $listener);
    }

    /**
     * @param string $name
     * @param Listener $listener
     */
    public function once(string $name, Listener $listener)
    {
        $this->listenerProvider->on($name, $listener->once());
    }


    /**
     * @inheritDoc
     */
    public function dispatch(object $event)
    {
        foreach ( $this->listenerProvider->getListenersForEvent($event) as $listener) {
            $listener->handle([$event]);
            if ($event->isPropagationStopped) {
                return $event;
            }
        }
        return $event;
    }
}