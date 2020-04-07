<?php

namespace AppBundle\Exception;

class EmailNotFoundException extends \Exception implements MessageUnderscoredExceptionInterface
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var array
     */
    private $parameters;

    /**
     * @var string
     */
    private $messageTemplate = 'El email %s no existe en la base de datos';

    /**
     * EmailNotFoundException constructor.
     * @param string $email
     */
    public function __construct($email)
    {
        $this->parameters = [
            $email
        ];

        parent::__construct(sprintf($this->messageTemplate, $email));

        $this->email = $email;
    }

    public function getOriginalMessage()
    {
        return sprintf($this->messageTemplate, $this->email);
    }

    public function getErrorCode()
    {
        return 'E106';
    }

    public function getErrorParameters()
    {
        return $this->parameters;
    }
}