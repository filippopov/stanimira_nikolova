<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 27.11.2016 г.
 * Time: 10:50
 */

namespace StanimiraNikolova\Adapter;


interface DatabaseInterface
{
    public function prepare($statement) : DatabaseStatementInterface;
}