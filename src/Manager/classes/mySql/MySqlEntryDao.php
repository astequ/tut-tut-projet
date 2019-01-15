<?php
/**
 * Created by PhpStorm.
 * User: astequ
 * Date: 15/01/19
 * Time: 15:00
 */

namespace App\Manager\classes\mySql;

use App\Manager\interfaces\EntryDao;

class MySqlEntryDao implements EntryDao
{
    private static $instance = null;

    /**
     * MySqlEntryDao constructor.
     */
    private function __construct()
    {
    }

    public static function getInstance(): MySqlEntryDao
    {
        if (self::$instance == null) {
            self::$instance = new MySqlEntryDao();
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
        return "It works for an entry";
    }
}