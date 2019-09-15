<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 29.11.2016 г.
 * Time: 14:21
 */

namespace StanimiraNikolova\Repositories\User;


use StanimiraNikolova\Adapter\DatabaseInterface;
use StanimiraNikolova\Repositories\AbstractRepository;

class UserRepository extends AbstractRepository implements UserRepositoryInterface
{
    protected $db;
    /**
     * UserRepository constructor.
     */
    public function __construct(DatabaseInterface $db)
    {
        parent::__construct($db);
        $this->db = $db;
    }

    public function setOptions()
    {
        return array(
            'tableName' => 'users',
            'primaryKeyName' => 'id'
        );
    }
}