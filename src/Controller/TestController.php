<?php
/**
 * Created by PhpStorm.
 * User: astequ
 * Date: 09/12/18
 * Time: 00:23
 */

namespace App\Controller;


use App\Entity\Author;
use App\Entity\Entry;
use App\Entity\Tag;
use App\Manager\AuthorManager;
use App\Manager\classes\mySql\MySqlAuthorDao;
use App\Manager\DaoFactory;
use App\Manager\EntryManager;
use App\Manager\Persistence;
use App\Manager\TagManager;
use App\Utilities\TagUtils;
use PhpParser\Node\Expr\Cast\Int_;
use PhpParser\Node\Scalar\String_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TestController extends AbstractController
{
    public function yay(AuthorManager $authorManager, TagManager $tagManager, EntryManager $entryManager, Request $request)
    {
        /*$post = $request->request->all();
        $author = new Author();
        $author
            ->setId(4)
            ->setSurname('Toto')
            ->setMail('bobo@bobo.fr')
            ->setName('My name');

        echo '<pre>';print_r($authorManager->persist($author));die;
        var_dump('okokok');die;
        //$entry = new Entry(1, "Article", date_create(), "Contenu", new Author(1, "Nom", "Prenom", "yay@mail.xyz"));
        //$entry->addTag(new Tag(1, "tug"));
        //$entry->addTag(new Tag(1, "teg"));

        //$manager = $this->getDoctrine()->getManager();
        //$manager->persist($entry);
        //$manager->flush();

        $dao = DaoFactory::getDaoFactory(Persistence::MYSQL);
        $result = $dao->getEntryDao();

        */
        /*$author = new Author();
        $author
            ->setSurname('Toto')
            ->setMail('bobo@bobo.fr')
            ->setName('My name');
        $authorManager->persist($author);

        $author2 = new Author();
        $author2
            ->setSurname('Africa')
            ->setMail('afaf@afri.ca')
            ->setName('Shinedown');
        $authorManager->persist($author2);*/

        /*$tag = new Tag();
        $tag
            ->setLabel('testouille');
        $tagManager->persist($tag);

        $tag2 = new Tag();
        $tag2
            ->setLabel('testaie');
        $tagManager->persist($tag2);*/

        /*$entry = new Entry();
        $entry
            ->setTitle('StpMarche')
            ->setDate(date_create())
            ->setContent('Promis ça marche stp crois moi')
            ->setAuthor($authorManager->find(1))
            ->addTag($tagManager->find(1))
            ->addTag($tagManager->find(2));
        $entryManager->persist($entry);

        $entry = new Entry();
        $entry
            ->setTitle('plzwork')
            ->setDate(date_create())
            ->setContent('aleeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeed')
            ->setAuthor($authorManager->find(2))
            ->addTag($tagManager->find(1));
        $entryManager->persist($entry);*/

        return new Response(
            $this->render('base.html.twig', ['entries' => $entryManager->findAll()])
        );
    }

    public function yoy(EntryManager $entryManager, $page) {

        $page = $page +0;

        return new Response(
            $this->render('article.html.twig', ['entry' => $entryManager->find($page)])
        );
    }

    public function yuy() {

        return new Response(
            $this->render('new.html.twig')
        );
    }

    public function process(AuthorManager $authorManager, TagManager $tagManager, EntryManager $entryManager, Request $request) {

        $post = $request->request->all();

        $entry = new Entry();
        $entry
            ->setTitle($post['title_article'])
            ->setDate(date_create())
            ->setContent($post['content_article'])
            ->setAuthor($authorManager->find(1));
        $entryManager->persist(TagUtils::manageTags(TagUtils::format($post['tags']),$tagManager,$entry));

        return new Response(
            $this->render('base.html.twig', ['entries' => $entryManager->findAll()])
            //var_dump($post)
        );
    }
}