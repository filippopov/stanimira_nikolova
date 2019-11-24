<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 6.10.2019 г.
 * Time: 19:59
 */

namespace StanimiraNikolova\Controllers;


use StanimiraNikolova\Core\MVC\MVCContext;
use StanimiraNikolova\Core\ViewInterface;
use StanimiraNikolova\Services\Application\AuthenticationServiceInterface;
use StanimiraNikolova\Services\Application\ResponseServiceInterface;
use StanimiraNikolova\Services\User\UserServiceInterface;

class AdminController
{
    private $view;
    private $userService;
    private $authenticationService;
    private $responseService;

    public function __construct(
        ViewInterface $view,
        UserServiceInterface $userService,
        AuthenticationServiceInterface $authenticationService,
        ResponseServiceInterface $responseService,
        MVCContext $MVCContext)
    {
        $this->view = $view;
        $this->userService = $userService;
        $this->authenticationService = $authenticationService;
        $this->responseService = $responseService;
    }

    public function login()
    {
        $params = [
            'withHeader' => false,
            'withFooter' => false,
            'isMessage' => false,
            'withAdminHeader' => true,
            'bodyClass' => ''
        ];

        $this->view->render($params);
    }

    public function registration()
    {
        $params = [
            'withHeader' => false,
            'withFooter' => false
        ];

        $this->view->render($params);
    }

    public function admin()
    {
        $params = [
            'withHeader' => false,
            'withFooter' => false,
            'isMessage' => false,
            'withAdminHeader' => true,
            'withAdminFooter' => true,
            'withAdminAside' => true,
            'bodyClass' => 'skin-blue'
        ];

        $this->view->render($params);
    }
}