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

class MainController extends AbstractController
{
    public function Main(EntryManager $entryManager)
    {

        return new Response(
            $this->render('base.html.twig', ['entries' => $entryManager->findAll()])
        );  
    }

    public function Article(EntryManager $entryManager, $page) {

        $page = $page +0;

        return new Response(
            $this->render('article.html.twig', ['entry' => $entryManager->find($page)])
        );
    }

    public function Redaction() {

        return new Response(
            $this->render('new.html.twig')
        );
    }

    public function Process(AuthorManager $authorManager, TagManager $tagManager, EntryManager $entryManager, Request $request) {

        $post = $request->request->all();

        if (($post['title_article'] == "") && ($post['content_article'] == "") && ($post['tags'] == "")) {
            return new Response(
                $this->render('base.html.twig', ['entries' => $entryManager->findAll()])
            //var_dump($post)
            );
        }
        else {
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
}