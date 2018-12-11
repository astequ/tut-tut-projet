<?php
/**
 * Created by PhpStorm.
 * User: astequ
 * Date: 08/12/18
 * Time: 22:50
 */

namespace App\Entity;


use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\OneToOne;

/**
 * @ORM\Entity
 * @ORM\Table(name="entry")
 */
class Entry
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @ORM\Column(type="string")
     */
    protected $title;
    /**
     * @ORM\Column(type="datetime")
     */
    protected $date;
    /**
     * @ORM\Column(type="text")
     */
    protected $content;
    /**
     * One Entry has one Author
     * @OneToOne(targetEntity="Author",cascade={"persist"})
     * @JoinColumn(name="author", referencedColumnName="id")
     */
    protected $author;
    /**
     * One entry may have several tags
     * @ManyToMany(targetEntity="Tag",cascade={"persist"})
     * @JoinTable(name="entry_tags",
     *      joinColumns={@JoinColumn(name="entry", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="tag", referencedColumnName="id", unique=true)}
     *      )
     */
    protected $tags;

    /**
     * Entry constructor.
     * @param int $id
     * @param string $title
     * @param DateTime $date
     * @param string $content
     * @param Author $author
     */
    public function __construct(int $id, string $title, DateTime $date, string $content, Author $author)
    {
        $this->id = $id;
        $this->title = $title;
        $this->date = $date;
        $this->content = $content;
        $this->author = $author;
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return DateTime
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     */
    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getTags(): \Doctrine\Common\Collections\ArrayCollection
    {
        return $this->tags;
    }

    /**
     * @param Tag $tag
     */
    public function addTag(Tag $tag): void
    {
        $this->tags->add($tag);
    }


}