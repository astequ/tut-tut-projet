<?php
/**
 * Created by PhpStorm.
 * User: astequ
 * Date: 15/01/19
 * Time: 14:39
 */

namespace App\Manager\classes;


use App\Manager\classes\mySql\MySqlAuthorDao;
use App\Manager\classes\mySql\MySqlEntryDao;
use App\Manager\classes\mySql\MySqlTagDao;
use App\Manager\DaoFactory;
use App\Manager\interfaces\AuthorDao;
use App\Manager\interfaces\EntryDao;
use App\Manager\interfaces\TagDao;


class MySqlDaoFactory extends DaoFactory
{

    public function getAuthorDao(): AuthorDao
    {
        return MySqlAuthorDao::getInstance();
    }

    public function getEntryDao(): EntryDao
    {
        return MySqlEntryDao::getInstance();
    }

    public function getTagDao(): TagDao
    {
        return MySqlTagDao::getInstance();
    }
}