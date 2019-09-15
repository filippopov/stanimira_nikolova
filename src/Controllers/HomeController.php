<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 15.9.2019 г.
 * Time: 16:45
 */

namespace StanimiraNikolova\Controllers;


use StanimiraNikolova\Core\ViewInterface;
use StanimiraNikolova\Services\Application\ResponseServiceInterface;
use StanimiraNikolova\Services\User\UserServiceInterface;

class HomeController
{
    private $view;
    private $service;
    private $responseService;

    public function __construct(ViewInterface $view, UserServiceInterface $service, ResponseServiceInterface $responseService)
    {
        $this->view = $view;
        $this->service = $service;
        $this->responseService = $responseService;
    }

    public function index()
    {
        var_dump('hi'); die();
    }
}