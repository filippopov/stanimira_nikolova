<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 15.12.2019 г.
 * Time: 12:29
 */

namespace StanimiraNikolova\Models\View\User;


class UserViewModel
{
    private $users;

    /**
     * UserViewModel constructor.
     * @param $users
     */
    public function __construct($users)
    {
        $this->users = $users;
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param mixed $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }
}