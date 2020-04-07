<?php

namespace AppBundle\Handlers;

use FOS\OAuthServerBundle\Model\AccessTokenManagerInterface;
use FOS\OAuthServerBundle\Model\RefreshTokenManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;

class LogoutHandler implements LogoutSuccessHandlerInterface
{
    /**
     * @var AccessTokenManagerInterface
     */
    private $accessTokenManager;

    /**
     * @var RefreshTokenManagerInterface
     */
    private $refreshTokenManager;

    /**
     * LogoutHandler constructor.
     * @param AccessTokenManagerInterface $accessTokenManager
     * @param RefreshTokenManagerInterface $refreshTokenManager
     */
    public function __construct(
        AccessTokenManagerInterface $accessTokenManager,
        RefreshTokenManagerInterface $refreshTokenManager
    ) {
        $this->accessTokenManager = $accessTokenManager;
        $this->refreshTokenManager = $refreshTokenManager;
    }

    /**
     * Creates a Response object to send upon a successful logout.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function onLogoutSuccess(Request $request)
    {
        if ($accessToken = $this->accessTokenManager
            ->findTokenByToken($request->get('access_token'))) {
            $this->accessTokenManager->deleteToken($accessToken);
        }

        $this->accessTokenManager->deleteExpired();

        if ($refreshToken = $this->refreshTokenManager
            ->findTokenByToken($request->get('refresh_token'))) {
            $this->refreshTokenManager->deleteToken($refreshToken);
        }

        $this->refreshTokenManager->deleteExpired();

        return new Response();
    }
}