<?php

namespace App\Manager;

use App\Entity\Entry;

class EntryManager
{
    protected $entryDAO;

    public function __construct(EntryDaoInterface $entryDAO)
    {
        $this->entryDAO = $entryDAO;
    }

    public function persist(Entry $entry): Entry
    {
        // TOOO validate the entry entity

        return $this->entryDAO->persist($entry);
    }
}