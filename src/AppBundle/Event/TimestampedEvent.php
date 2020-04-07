<?php

namespace AppBundle\Event;

abstract class TimestampedEvent
{
    /**
     * @var \DateTime
     */
    protected $occuredOn;

    /**
     * TimestampedEvent constructor.
     */
    public function __construct()
    {
        $this->occuredOn = new \DateTime();
    }

    /**
     * @return \DateTime
     */
    public function occuredOn()
    {
        return $this->occuredOn;
    }
}