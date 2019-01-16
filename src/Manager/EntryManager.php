<?php
/**
 * Created by PhpStorm.
 * User: astequ
 * Date: 16/01/19
 * Time: 11:24
 */

namespace App\Manager;


use App\Entity\Entry;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class EntryManager
{

    protected $entityManager;

    /**@var EntityRepository */
    protected $entryRepository;

    /**
     * EntryManager constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->entryRepository = $entityManager->getRepository(Entry::class);
    }

    /**
     * @param int $id
     * @return Entry
     */
    public function find(int $id): Entry
    {
        return $this->entryRepository->findOneById($id);
    }

    /**
     * @param Entry $entry
     * @return Entry
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function persist(Entry $entry)
    {
        $this->entityManager->persist($entry);
        $this->entityManager->flush();

        return $entry;
    }

    /**
     * @param Author $entry
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function delete(Entry $entry)
    {
        $this->entityManager->remove($entry);
        $this->entityManager->flush();
    }

    public function findAll() : array
    {
        return $this->entryRepository->findAll();
    }
}