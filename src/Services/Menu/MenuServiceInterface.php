<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 9/23/2019
 * Time: 4:49 PM
 */

namespace StanimiraNikolova\Services\Menu;


interface MenuServiceInterface
{
    public function getMenu() : array;

    public function getMenuItems(): array;
}