<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 15.9.2019 г.
 * Time: 16:45
 */

namespace StanimiraNikolova\Controllers;

use StanimiraNikolova\Core\ViewInterface;
use StanimiraNikolova\Models\View\Home\HomeViewModel;
use StanimiraNikolova\Services\Application\ResponseServiceInterface;
use StanimiraNikolova\Services\Menu\MenuServiceInterface;
use StanimiraNikolova\Services\PageData\PageDataServiceInterface;
use StanimiraNikolova\Services\User\UserServiceInterface;

class HomeController
{
    private $view;
    private $service;
    private $responseService;
    private $menuService;
    private $pageDataService;

    public function __construct(ViewInterface $view, UserServiceInterface $service, ResponseServiceInterface $responseService, MenuServiceInterface $menuService, PageDataServiceInterface $pageDataService)
    {
        $this->view = $view;
        $this->service = $service;
        $this->responseService = $responseService;
        $this->menuService = $menuService;
        $this->pageDataService = $pageDataService;
    }

    public function index($page = 'home', $subPage = '')
    {
        $pageData = $this->pageDataService->GetPageData($page, $subPage);

        if (empty($pageData)) {
            throw new \Exception('Page information cannot be found!');
        }

        $menu = $this->menuService->getMenu();

        $params = [
            'model' => new HomeViewModel($menu, $pageData, $page, $subPage),
            'isEscape' => false
        ];

        $this->view->render($params);
    }

    public function download($fileName = '')
    {
        $file = "http://localhost/stanimira_nikolova/files/{$fileName}";
        header("Content-Description: File Transfer");
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=" . basename($file));

        readfile ($file);
        exit();
    }
}