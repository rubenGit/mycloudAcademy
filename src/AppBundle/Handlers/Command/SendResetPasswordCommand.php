<?php

namespace AppBundle\Handlers\Command;

class SendResetPasswordCommand
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $url;

    /**
     * SendResetPassword constructor.
     * @param $email
     * @param $url
     */
    public function __construct($email, $url)
{
    $this->email = $email;
    $this->url = $url;
}

    /**
     * @return mixed
     */
    public function getEmail()
{
    return $this->email;
}

    /**
     * @return string
     */
    public function getUrl()
{
    return $this->url;
}
}