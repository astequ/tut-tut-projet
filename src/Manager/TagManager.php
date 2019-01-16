<?php
/**
 * Created by PhpStorm.
 * User: astequ
 * Date: 16/01/19
 * Time: 14:38
 */

namespace App\Manager;


use App\Entity\Tag;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class TagManager
{
    /** @var EntityManager */
    protected $entityManager;


    /** @var EntityRepository */
    protected $tagRepository;

    /**
     * TagManager constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->tagRepository = $entityManager->getRepository(Tag::class);
    }

    /**
     * @param int $id
     * @return Tag
     */
    public function find(int $id): Tag
    {
        return $this->tagRepository->findOneById($id);
    }

    /**
     * @param Tag $tag
     * @return Tag
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function persist(Tag $tag)
    {
        $this->entityManager->persist($tag);
        $this->entityManager->flush();

        return $tag;
    }

    /**
     * @param Tag $tag
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function delete(Tag $tag)
    {
        $this->entityManager->remove($tag);
        $this->entityManager->flush();
    }
}