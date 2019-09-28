<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 9/23/2019
 * Time: 11:21 AM
 */

namespace StanimiraNikolova\Models\View\Home;


class HomeViewModel
{
    private $menu;
    private $pageData;
    private $active;
    private $subActive;

    public function __construct(array $menu, array $pageData, string $active, string $subActive)
    {
        $this->setMenu($menu);
        $this->setPageData($pageData);
        $this->setActive($active);
        $this->setSubActive($subActive);
    }

    /**
     * @return mixed
     */
    public function getMenu() : array
    {
        return $this->menu;
    }

    /**
     * @param mixed $menu
     */
    public function setMenu(array $menu)
    {
        $this->menu = $menu;
    }

    /**
     * @return mixed
     */
    public function getPageData() : array
    {
        return $this->pageData;
    }

    /**
     * @param mixed $pageData
     */
    public function setPageData(array $pageData)
    {
        $this->pageData = $pageData;
    }

    /**
     * @return mixed
     */
    public function getActive(): string
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive(string $active)
    {
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function getSubActive(): string
    {
        return $this->subActive;
    }

    /**
     * @param mixed $subActive
     */
    public function setSubActive(string $subActive)
    {
        $this->subActive = $subActive;
    }
}