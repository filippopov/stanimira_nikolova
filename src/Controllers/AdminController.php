<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 6.10.2019 г.
 * Time: 19:59
 */

namespace StanimiraNikolova\Controllers;


use StanimiraNikolova\Core\MVC\Message;
use StanimiraNikolova\Core\MVC\MVCContext;
use StanimiraNikolova\Core\ViewInterface;
use StanimiraNikolova\Models\Binding\User\UserLoginBindingModel;
use StanimiraNikolova\Models\View\Menu\MenuViewModel;
use StanimiraNikolova\Models\View\Page\PageViewModel;
use StanimiraNikolova\Models\View\User\UserViewModel;
use StanimiraNikolova\Services\Application\AuthenticationServiceInterface;
use StanimiraNikolova\Services\Application\ResponseServiceInterface;
use StanimiraNikolova\Services\Menu\MenuServiceInterface;
use StanimiraNikolova\Services\PageData\PageDataServiceInterface;
use StanimiraNikolova\Services\User\UserServiceInterface;

class AdminController
{
    private $view;
    private $userService;
    private $authenticationService;
    private $responseService;
    private $pageDataService;
    private $menuService;

    public function __construct(
        ViewInterface $view,
        UserServiceInterface $userService,
        AuthenticationServiceInterface $authenticationService,
        ResponseServiceInterface $responseService,
        MVCContext $MVCContext,
        PageDataServiceInterface $pageDataService,
        MenuServiceInterface $menuService)
    {
        $this->view = $view;
        $this->userService = $userService;
        $this->authenticationService = $authenticationService;
        $this->responseService = $responseService;
        $this->pageDataService = $pageDataService;
        $this->menuService = $menuService;
    }

    public function login()
    {
        if ($this->authenticationService->isAuthenticated()) {
            $this->responseService->redirect('admin', 'admin');
        }

        $params = [
            'withHeader' => false,
            'withFooter' => false,
            'withAdminHeader' => true,
            'bodyClass' => ''
        ];

        $this->view->render($params);
    }

    public function loginPost(UserLoginBindingModel $bindingModel)
    {
        $username = $bindingModel->getUsername();
        $password = $bindingModel->getPassword();

        $loginResult = $this->authenticationService->login($username, $password);

        if ($loginResult) {
            Message::postMessage('Successfully login user!', Message::POSITIVE_MESSAGE);
            $this->responseService->redirect('admin', 'admin');
            exit();
        }

        $this->responseService->redirect('admin', 'login');
        exit();
    }

    public function logout()
    {
        if (! $this->authenticationService->isAuthenticated()) {
            $this->responseService->redirect('admin', 'login');
        }

        $this->authenticationService->logout();

        $this->responseService->redirect('admin', 'login');
    }

    public function admin()
    {
        if (! $this->authenticationService->isAuthenticated()) {
            $this->responseService->redirect('admin', 'login');
        }

        $params = [
            'withHeader' => false,
            'withFooter' => false,
            'withAdminHeader' => true,
            'withAdminFooter' => true,
            'withAdminAside' => true,
            'bodyClass' => 'skin-blue'
        ];

        $this->view->render($params);
    }

    public function pages()
    {
        if (! $this->authenticationService->isAuthenticated()) {
            $this->responseService->redirect('admin', 'login');
        }

        $pages = $this->pageDataService->getPages();

        $params = [
            'withHeader' => false,
            'withFooter' => false,
            'withAdminHeader' => true,
            'withAdminFooter' => true,
            'withAdminAside' => true,
            'bodyClass' => 'skin-blue',
            'model' => (new PageViewModel($pages))
        ];

        $this->view->render($params);
    }

    public function menu()
    {
        if (! $this->authenticationService->isAuthenticated()) {
            $this->responseService->redirect('admin', 'login');
        }

        $menuItems = $this->menuService->getMenuItems();

        $params = [
            'withHeader' => false,
            'withFooter' => false,
            'withAdminHeader' => true,
            'withAdminFooter' => true,
            'withAdminAside' => true,
            'bodyClass' => 'skin-blue',
            'model' => (new MenuViewModel($menuItems))
        ];

        $this->view->render($params);
    }

    public function users()
    {
        if (! $this->authenticationService->isAuthenticated()) {
            $this->responseService->redirect('admin', 'login');
        }

        $users = $this->userService->getUsers();

        $params = [
            'withHeader' => false,
            'withFooter' => false,
            'withAdminHeader' => true,
            'withAdminFooter' => true,
            'withAdminAside' => true,
            'bodyClass' => 'skin-blue',
            'model' => (new UserViewModel($users))
        ];

        $this->view->render($params);
    }
}