<?php

namespace AppBundle\Event;

class EmailSent extends TimestampedEvent
{
    /**
     * @var array
     */
    private $result;

    /**
     * EmailSent constructor.
     * @param $result
     */
    public function __construct($result)
    {
        $this->result = $result;
        parent::__construct();
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }
}