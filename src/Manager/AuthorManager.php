<?php
namespace App\Manager;


use App\Entity\Author;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class AuthorManager
{
    /** @var EntityManager */
    protected $entityManager;


    /** @var EntityRepository */
    protected $authorRepository;

    /**
     * AuthorManager constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->authorRepository= $entityManager->getRepository(Author::class);
    }

    /**
     * @param int $id
     * @return Author
     */
    public function find(int $id): Author
    {
        return $this->authorRepository->findOneById($id);
    }

    /**
     * @param Author $author
     * @return Author
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function persist(Author $author)
    {
        $this->entityManager->persist($author);
        $this->entityManager->flush();

        return $author;
    }

    /**
     * @param Author $author
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function delete(Author $author)
    {
        $this->entityManager->remove($author);
        $this->entityManager->flush();
    }
}