<?php
/**
 * Created by PhpStorm.
 * User: astequ
 * Date: 17/01/19
 * Time: 10:51
 */

namespace App\Utilities;


use App\Entity\Entry;
use App\Entity\Tag;
use App\Manager\TagManager;
use Transliterator;

class TagUtils
{
    /**
     * @param String $s
     * @return array
     */
    public static function format(String $s): array
    {
        $transliterator = Transliterator::create('NFD; [:Nonspacing Mark:] Remove; NFC;');
        $tagStringArray = explode(",", $s);
        foreach ($tagStringArray as $key => $tag) {
            $tagStringArray[$key] = trim(strtolower($transliterator->transliterate($tag)));
        }
        return $tagStringArray;
    }

    /**
     * @param array $formattedTagStringArray
     * @param TagManager $manager
     * @param Entry $entry
     * @return Entry
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public static function manageTags(array $formattedTagStringArray, TagManager $manager, Entry $entry): Entry
    {
        foreach ($formattedTagStringArray as $tag) {
            $newTag = $manager->findByLabel($tag);
            if ($newTag == null) {
                $newTag = new Tag();
                $newTag
                    ->setLabel($tag);
                $manager->persist($newTag);
                $newTag = $manager->findByLabel($tag);
            }
            $entry->addTag($newTag);
        }
        return $entry;
    }
}