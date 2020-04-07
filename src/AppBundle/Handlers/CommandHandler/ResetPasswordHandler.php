<?php

namespace AppBundle\Handlers\CommandHandler;

use AppBundle\Event\UserPasswordReset;
use AppBundle\Handlers\Command\ResetPasswordCommand;
use AppBundle\Handlers\Command\SendMailCommand;
use FOS\UserBundle\Doctrine\UserManager;
use SimpleBus\Message\Recorder\RecordsMessages;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\Translation\TranslatorInterface;

class ResetPasswordHandler
{
    /**
     * @var UserManager
     */
    private $userManager;

    /**
     * @var SendMailHandler
     */
    private $sendEmailHandler;

    /**
     * @var TwigEngine
     */
    private $templating;

    /**
     * @var RecordsMessages
     */
    private $eventRecorder;

    /**
     * ResetPasswordHandler constructor.
     * @param UserManager $userManager
     * @param SendMailHandler $sendEmailHandler
     * @param TwigEngine $templating
     * @param RecordsMessages $eventRecorder
     */
    public function __construct(
        UserManager $userManager,
        SendMailHandler $sendEmailHandler,
        TwigEngine $templating,
        RecordsMessages $eventRecorder,
        TranslatorInterface $translator

    ) {
        $this->userManager = $userManager;
        $this->sendEmailHandler = $sendEmailHandler;
        $this->templating = $templating;
        $this->eventRecorder = $eventRecorder;
        $this->translator = $translator;
    }

    /**
     * @param ResetPasswordCommand $command
     * @throws \Twig_Error
     */
    public function handle(ResetPasswordCommand $command)
    {
        $user = $command->getUser();

        $password = $this->random_password();

        $user
            ->setPlainPassword($password)
            ->setResetToken();


        $subject = $this->translator->trans('new password');


        $this->userManager->updateUser($user);

        $this->sendEmailHandler->handle(
            new SendMailCommand(
                $user->getEmail(),
                $user->getName(),
                $subject,
                "Text",
                $this->templating->render(
                    '@App/users/new-password.html.twig',
                    ['password' => $password]
                ),
                []
            )
        );

        $this->eventRecorder->record(new UserPasswordReset($user));
    }

    private function random_password( $length = 8 ) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        $password = substr( str_shuffle( $chars ), 0, $length );
        return $password;
    }
}