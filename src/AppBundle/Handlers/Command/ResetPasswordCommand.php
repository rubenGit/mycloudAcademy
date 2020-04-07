<?php

namespace AppBundle\Handlers\Command;

use AppBundle\Entity\User;

class ResetPasswordCommand
{
    /**
     * @var User
     */
    private $user;

    /**
     * ResetPasswordCommand constructor.
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
}