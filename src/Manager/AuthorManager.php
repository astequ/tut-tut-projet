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

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->authorRepository= $entityManager->getRepository(Author::class);
    }

    public function find(int $id): Author
    {
        return $this->authorRepository->findOneBy($id);
    }


    public function persist(Author $author)
    {
        $this->entityManager->persist($author);
        $this->entityManager->flush();

        return $author;
    }
}