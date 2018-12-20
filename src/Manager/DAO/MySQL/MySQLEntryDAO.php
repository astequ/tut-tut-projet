<?php
/**
 * Created by PhpStorm.
 * User: astequ
 * Date: 13/12/18
 * Time: 22:16
 */

namespace App\Manager\DAO\MySQL;

use App\Manager\Interfaces\EntryDAO;
use Doctrine\ORM\EntityManager;

class MySQLEntryDAO implements EntryDAO
{

    protected $manager;

    /**
     * MySQLEntryDAO constructor.
     */
    public function __construct()
    {
        $manager = $this->getDoctrine()->getManager(); //TODO: aaaaah comment on set ça
    }

    

    public function create($e)
    {
        // TODO: Implement create() method.
    }

    public function getById(int $id)
    {
        // TODO: Implement getById() method.
    }

    public function update($e)
    {
        // TODO: Implement update() method.
    }

    public function delete($e)
    {
        // TODO: Implement delete() method.
    }
}