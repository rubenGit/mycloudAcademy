<?php

namespace AppBundle\Handlers\CommandHandler;

use AppBundle\Entity\User;
use AppBundle\Exception\EmailNotFoundException;
use AppBundle\Handlers\Command\SendMailCommand;
use AppBundle\Handlers\Command\SendResetPasswordCommand;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Translation\TranslatorInterface;

class SendResetPasswordHandler
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var ObjectRepository
     */
    private $userRepository;

    /**
     * @var SendMailHandler
     */
    private $sendEmailHandler;

    /**
     * @var TwigEngine
     */
    private $templating;

    /**
     * SendResetPasswordHandler constructor.
     * @param EntityManagerInterface $entityManager
     * @param SendMailHandler $sendEmailHandler
     * @param TwigEngine $twigEngine
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        SendMailHandler $sendEmailHandler,
        TwigEngine $twigEngine,
        TranslatorInterface $translator
    ) {
        $this->em = $entityManager;
        $this->userRepository = $entityManager->getRepository('AppBundle:User');
        $this->sendEmailHandler = $sendEmailHandler;
        $this->templating = $twigEngine;
        $this->translator = $translator;
    }

    public function handle(SendResetPasswordCommand $command)
    {
        /** @var User $user */
        $email = $command->getEmail();
        $user = $this->userRepository->findOneBy(
            [
                'email' => $email
            ]
        );

        if (!$user) {
            throw new EmailNotFoundException($email);
        }


        $subject = $this->translator->trans('reset password');


        $user->setResetToken();

        $this->em->persist($user);
        $this->em->flush();
        $this->sendEmailHandler->handle(
            new SendMailCommand(
                $user->getEmail(),
                $user->getName(),
                $subject,
                "Text",
                $this->templating->render(
                    '@App/users/reset-password.html.twig',

                    ['reset_url' => $command->getUrl() . $user->getResetToken(),
                     'user'=> $user
                    ]
                ),
                []
            )
        );
    }
}