<?php
/**
 * Created by PhpStorm.
 * User: astequ
 * Date: 20/12/18
 * Time: 23:39
 */

namespace App\Manager\DAO;


use App\Manager\DAO\Interfaces\AuthorDAO;
use App\Manager\Interfaces\EntryDAO;
use App\Manager\Interfaces\TagDAO;

abstract class Factory
{
    public const MYSQL = 0;
    private static $dao;

    /**
     * @param int $type
     * @return mixed
     */
    public static function getDao(int $type): Factory
    {
        switch ($type) {
            case self::MYSQL:
                self::$dao = new MySQLFactory();
        }

    }

    public abstract function getAuthorDAO(): AuthorDAO;

    public abstract function getEntryDAO(): EntryDAO;

    public abstract function getTagDAO(): TagDAO;

}

