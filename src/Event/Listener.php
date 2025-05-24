<?php

namespace Xudid\Core\Event;

/**
 * Class Listener
 * @package Core\Event
 */
class Listener
{
    private $callback;
    private int $priority;
    private bool $once;
    private bool $called = false;

    /**
     * Listener constructor.
     * @param $callback
     * @param int $priority
     * @param bool $once
     */
    public function __construct($callback, $priority = 0, $once = false)
    {
        $this->callback = $callback;
        $this->priority = $priority;
        $this->once = $once;
    }

    /**
     * @param array $args
     */
    public function handle(array $args)
    {
        if (!$this->called()) {
            call_user_func_array($this->callback, $args);
            $this->called = true;
        }
    }

    /**
     * @return mixed
     */
    public function getCallback()
    {
        return $this->callback;
    }

    /**
     * @return int
     */
    public function getPriority(): int
    {
        return $this->priority;
    }

    /**
     * Set a listener execute callback only once
     * @return $this
     */
    public function once() : self
    {
        $this->once = true;
        return $this;
    }

    /**
     * Is the listener must execute the callback once
     * @return bool
     */
    public function isOnce(): bool
    {
        return $this->once;
    }

    /**
     * Was the callback already executed
     * @return bool
     */
    public function called()
    {
        return $this->called;
    }
}