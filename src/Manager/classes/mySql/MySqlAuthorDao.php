<?php
/**
 * Created by PhpStorm.
 * User: astequ
 * Date: 15/01/19
 * Time: 15:00
 */

namespace App\Manager\classes\mySql;

use App\Manager\interfaces\AuthorDao;

class MySqlAuthorDao implements AuthorDao
{
    private static $instance = null;

    /**
     * MySqlAuthoDao constructor.
     */
    private function __construct()
    {
    }

    public static function getInstance(): MySqlAuthorDao
    {
        if (self::$instance == null) {
            self::$instance = new MySqlAuthorDao();
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
        return "It works for an author";
    }
}