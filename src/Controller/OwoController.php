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
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class OwoController extends AbstractController
{
    public function yay()
    {

        $entry = new Entry(1, "Article", date_create(), "Contenu", new Author(1, "Nom", "Prenom", "yay@mail.xyz"));
        $entry->addTag(new Tag(1, "tug"));
        $entry->addTag(new Tag(1, "teg"));

        $manager = $this->getDoctrine()->getManager();
        $manager->persist($entry);
        $manager->flush();

        return new Response(
            '<html lang="fr"><body>done</body></html>'
        );
    }
}