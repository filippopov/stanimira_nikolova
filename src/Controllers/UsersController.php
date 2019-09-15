<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 25.11.2016 г.
 * Time: 13:48
 */

namespace StanimiraNikolova\Controllers;


use StanimiraNikolova\Core\ViewInterface;
use StanimiraNikolova\Models\Binding\User\UserLoginBindingModel;
use StanimiraNikolova\Models\Binding\User\UserProfileEditBindingModel;
use StanimiraNikolova\Models\Binding\User\UserRegisterBindingModel;
use StanimiraNikolova\Models\View\User\UserProfileEditViewModel;
use StanimiraNikolova\Models\View\User\UserProfileViewModel;
use StanimiraNikolova\Services\Application\AuthenticationServiceInterface;
use StanimiraNikolova\Services\Application\ResponseServiceInterface;
use StanimiraNikolova\Services\User\UserServiceInterface;

class UsersController
{
    private $view;
    private $service;
    private $authenticationService;
    private $responseService;

    public function __construct(
        ViewInterface $view,
        UserServiceInterface $service,
        AuthenticationServiceInterface $authenticationService,
        ResponseServiceInterface $responseService)
    {
        $this->view = $view;
        $this->service = $service;
        $this->authenticationService = $authenticationService;
        $this->responseService = $responseService;
    }
}