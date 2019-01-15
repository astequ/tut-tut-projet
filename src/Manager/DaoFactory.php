<?php
/**
 * Created by PhpStorm.
 * User: astequ
 * Date: 15/01/19
 * Time: 14:22
 */

namespace App\Manager;

use App\Manager\classes\MySqlDaoFactory;

abstract class DaoFactory
{

    public static function getDaoFactory($persistance): DaoFactory
    {
        $daof = null;
        switch ($persistance) {
            case Persistence::MYSQL:
                $daof = new MySqlDaoFactory();
                break;
        }
        return $daof;
    }

    public abstract function getAuthorDao();

    public abstract function getEntryDao();

    public abstract function getTagDao();
}