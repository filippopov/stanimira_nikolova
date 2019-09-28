<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 9/23/2019
 * Time: 4:48 PM
 */

namespace StanimiraNikolova\Services\Menu;


use StanimiraNikolova\Adapter\DatabaseInterface;
use StanimiraNikolova\Repositories\Menu\MenuRepository;
use StanimiraNikolova\Repositories\Menu\MenuRepositoryInterface;
use StanimiraNikolova\Services\AbstractService;

class MenuService extends AbstractService implements MenuServiceInterface
{
    const ACTIVE = 1;
    const MAIN_MENU = 0;

    /** @var  MenuRepository */
    private $menuRepository;

    public function __construct(MenuRepositoryInterface $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    public function getMenu() : array
    {
        $mainMenu = $this->menuRepository->getMainMenu([':active' => self::ACTIVE,':main_menu' => self::MAIN_MENU]);
        $subMenu = $this->menuRepository->getSubMenu([':active' => self::ACTIVE,':main_menu' => self::MAIN_MENU]);
        $menu = [];

        foreach ($mainMenu as $menuItem){

            $withSubMenu = isset($menuItem['with_sub_menu']) ? (int) $menuItem['with_sub_menu'] : 0;
            $code = isset($menuItem['code']) ? $menuItem['code'] : '';
            $title = isset($menuItem['title']) ? $menuItem['title'] : '';

            if ($withSubMenu) {
                $menu[$code] = [$title => []];
            } else {
                $menu[$code] = $title;
            }
        }

        foreach ($subMenu as $menuItem) {
            $code = isset($menuItem['code']) ? $menuItem['code'] : '';
            $title = isset($menuItem['title']) ? $menuItem['title'] : '';

            $parent_code = isset($menuItem['parent_code']) ? $menuItem['parent_code'] : '';
            $parent_title = isset($menuItem['parent_title']) ? $menuItem['parent_title'] : '';

            if (isset($menu[$parent_code][$parent_title])) {
                $menu[$parent_code][$parent_title][$code] = $title;
            }
        }

        return $menu;
    }
}