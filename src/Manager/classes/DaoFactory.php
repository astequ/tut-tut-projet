<?php
/**
 * Created by PhpStorm.
 * User: astequ
 * Date: 15/01/19
 * Time: 14:22
 */

namespace App\Manager;

abstract class DaoFactory
{

    public static const MYSQL = 0;

    public static function getDaoFactory($persistance): DaoFactory
    {
        $daof = null;
        switch ($persistance) {
            case DaoFactory::MYSQL:
                $daof = new MySqlDaoFactory();
                break;
        }
        return $daof;
    }

    public abstract function getAuthorDao();

    public abstract function getEntryDao();

    public abstract function getTagDao();
}