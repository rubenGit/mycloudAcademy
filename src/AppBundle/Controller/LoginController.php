<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use OAuth2\OAuth2ServerException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends Controller
{

    private $translationTable = [
        'Missing parameters. "username" and "password" required' =>
            '{"errorCode":201,"errorMsg":"Falta usuario o contraseña"}',
        'The client credentials are invalid' =>
            '{"errorCode":202,"errorMsg":"Las credenciales del cliente no son válidas"}',
        'Invalid username and password combination' =>
            '{"errorCode":203,"errorMsg":"Contraseña incorrecta"}',
        'Invalid refresh token' =>
            '{"errorCode":204,"errorMsg":"Vuelva a introducir los datos, la sesión ha caducado."}',

    ];

    /**
     * @Route("/v2/token", methods={"GET", "POST"})
     * @param Request $request
     * @return Response
     */
    public function getTokenAction(Request $request)
    {
        $userRequest = $request->request->all();

        if (isset($userRequest['username'])) {
            /** @var User $user */
            $user = $this->get('doctrine')->getRepository('AppBundle:User')->findOneBy(
                [
                    'emailCanonical' => $userRequest['username'],
                    'enabled' => 1
                ]
            );

            if (!$user) {
                $response = new Response(
                    '{"errorCode":205,"errorMsg":"Usuario incorrecto"}',
                    400
                );

                return $response;
            }
        }

        try {
            return $this->get('fos_oauth_server.server')->grantAccessToken($request);
        } catch (OAuth2ServerException $e) {
            $response = new Response(
                $this->translationTable[$e->getDescription()],
                $e->getHttpCode(),
                $e->getResponseHeaders()
            );

            return $response;
        }
    }
}