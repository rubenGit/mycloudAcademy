<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateOAuthClientCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('oauth:client:create')
            ->setDescription('Create OAuth Client')
            ->addArgument(
                'name',
                InputArgument::REQUIRED,
                'Client Name?'
            )
            ->addArgument(
                'redirectUri',
                InputArgument::REQUIRED,
                'Redirect URI?'
            )
            ->addArgument(
                'grantType',
                InputArgument::OPTIONAL,
                'Grant type'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $container = $this->getContainer();

        $redirectUri = $input->getArgument('redirectUri');

        $clientManager = $container->get('fos_oauth_server.client_manager.default');
        $client = $clientManager->createClient();
        $client->setRedirectUris([$redirectUri]);
        if (!$grantType = $input->getArgument('grantType')) {
            $grantTypes = ["password", "refresh_token"];
        } else {
            $grantTypes = [$grantType];
        }
        $client->setAllowedGrantTypes($grantTypes);
        $clientManager->updateClient($client);

        $output->writeln(sprintf("<info>The client was created with <comment>%s</comment> as public id and <comment>%s</comment> as secret</info>",
            $client->getPublicId(),
            $client->getSecret()));


    }
}
