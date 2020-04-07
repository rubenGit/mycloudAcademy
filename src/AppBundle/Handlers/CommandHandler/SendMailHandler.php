<?php

namespace AppBundle\Handlers\CommandHandler;

use AppBundle\Event\EmailSent;
use AppBundle\Handlers\Command\SendMailCommand;
use SimpleBus\Message\Recorder\RecordsMessages;
use Symfony\Component\Translation\Translator;

class SendMailHandler
{
    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    /**
     * @var string
     */
    private $companyName;

    /**
     * @var string
     */
    private $companyEmail;

    /**
     * @var Translator
     */
    private $translator;

    /**
     * @var RecordsMessages
     */
    private $eventRecorder;

    /**
     * SendEmailHandler constructor.
     * @param \Swift_Mailer $mailer
     * @param Translator $translator
     * @param $companyName
     * @param $companyEmail
     * @param RecordsMessages $eventRecorder
     */
    public function __construct(
        \Swift_Mailer $mailer,
        Translator $translator,
        $companyName,
        $companyEmail,
        RecordsMessages $eventRecorder
    ) {
        $this->mailer = $mailer;
        $this->translator = $translator;
        $this->companyName = $companyName;
        $this->companyEmail = $companyEmail;
        $this->eventRecorder = $eventRecorder;
    }

    public function handle(SendMailCommand $command)
    {
        $message = (new \Swift_Message($this->translator->trans($command->getSubject())))
            ->setFrom($this->companyEmail, $this->companyName)
            ->setTo($command->getTo(), $command->getToName())
            ->setBody($command->getBody(), 'text/html');

        $result = $this->mailer->send($message);


        $this->eventRecorder->record(new EmailSent($result));
    }
}