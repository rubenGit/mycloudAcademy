<?php

namespace AppBundle\Event;

use AppBundle\Entity\User;

class UserPasswordReset extends TimestampedEvent
{
    /**
     * @var User
     */
    private $user;

    /**
     * MachineUpdated constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        parent::__construct();
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
}