<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 9/23/2019
 * Time: 5:20 PM
 */

namespace StanimiraNikolova\Repositories\Menu;


interface MenuRepositoryInterface
{
    public function getMainMenu(array $params = []) : array;

    public function getSubMenu(array $params =[]) : array;
}