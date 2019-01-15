<?php
/**
 * Created by PhpStorm.
 * User: astequ
 * Date: 15/01/19
 * Time: 13:59
 */

namespace App\Manager\interfaces;


interface Dao
{
    function create($e);

    function update($e);

    function delete($e);

    function getById($e);
}