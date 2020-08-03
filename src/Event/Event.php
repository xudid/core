<?php

namespace Core\Event;

use Psr\EventDispatcher\StoppableEventInterface;

/**
 * Class Event
 * @package Core\Event
 */
class Event implements StoppableEventInterface
{
    private string $name;
    private $data;
    private bool $stoppable = false;
    private bool $stopPropagation;

    /**
     * Event constructor.
     * @param string $name
     * @param $data
     */
    public function __construct(string $name, $data)
    {
        $this->name = $name;
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Stop this Event propagation
     * @return  self
     */
    public function stopPropagation() : self
    {
        $this->stopPropagation = true;
    }

    /**
     * Return if the propagation must be stopped or not
     *
     * @return bool
     */
    public function isPropagationStopped(): bool
    {
        return $this->stopPropagation;
    }
}
