<?php

namespace StanimiraNikolova\Models\View\Menu;

class MenuViewModel
{
    private $menuItems;

    /**
     * MenuViewModel constructor.
     * @param $menuItems
     */
    public function __construct($menuItems)
    {
        $this->menuItems = $menuItems;
    }

    /**
     * @return mixed
     */
    public function getMenuItems()
    {
        return $this->menuItems;
    }

    /**
     * @param mixed $menuItems
     */
    public function setMenuItems($menuItems)
    {
        $this->menuItems = $menuItems;
    }
}