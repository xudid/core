<?php

namespace Xudid\Core\Event;

use Psr\EventDispatcher\ListenerProviderInterface;

/**
 * Class ListenerProvider
 * @package Core\Event
 */
class ListenerProvider implements ListenerProviderInterface
{
    private array $listeners = [];

    /**
     * @param string $name
     * @param $listener
     */
    public function on(string $name, $listener)
    {
        $this->listeners[$name][]= $listener;
        uasort($this->listeners[$name], function ($listenerA, $listenerB) {
            return $listenerA->getPriority() < $listenerB->getPriority();
        });
    }

    /**
     * @inheritDoc
     */
    public function getListenersForEvent(object $event): iterable
    {
        return $this->listeners[$event->getName()];
    }
}
