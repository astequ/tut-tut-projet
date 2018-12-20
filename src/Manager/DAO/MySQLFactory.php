<?php
/**
 * Created by PhpStorm.
 * User: astequ
 * Date: 21/12/18
 * Time: 00:19
 */

namespace App\Manager\DAO;


use App\Manager\DAO\Interfaces\AuthorDAO;
use App\Manager\DAO\MySQL\MySQLEntryDAO;
use App\Manager\Interfaces\EntryDAO;
use App\Manager\Interfaces\TagDAO;

class MySQLFactory extends Factory
{

    public function getAuthorDAO(): AuthorDAO
    {
        return MySQLEntryDAO::getInstance();
    }

    public function getEntryDAO(): EntryDAO
    {
        // TODO: Implement getEntryDAO() method.
    }

    public function getTagDAO(): TagDAO
    {
        // TODO: Implement getTagDAO() method.
    }
}