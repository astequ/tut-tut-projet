<?php
/**
 * Created by PhpStorm.
 * User: astequ
 * Date: 15/01/19
 * Time: 15:00
 */

namespace App\Manager\mySql;


use App\Manager\interfaces\TagDao;

class MySqlTagDao implements TagDao
{
    private static $instance = null;

    /**
     * MySqlTagDao constructor.
     */
    private function __construct()
    {
    }

    public static function getInstance(): MySqlTagDao
    {
        if (self::$instance == null) {
            self::$instance = new MySqlTagDao();
        }
        return self::$instance;
    }

    function create($e)
    {
        // TODO: Implement create() method.
    }

    function update($e)
    {
        // TODO: Implement update() method.
    }

    function delete($e)
    {
        // TODO: Implement delete() method.
    }

    function getById($e)
    {
        // TODO: Implement getById() method.
    }
}