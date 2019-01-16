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
use Doctrine\ORM\Mapping\ManyToOne;
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
     * Many Entries has one Author
     * @ManyToOne(targetEntity="Author",cascade={"persist"})
     * @JoinColumn(name="author", referencedColumnName="id")
     */
    protected $author;
    /**
     * One entry may have several tags
     * @ManyToMany(targetEntity="Tag",cascade={"persist"})
     * @JoinTable(name="entry_tags",
     *      joinColumns={@JoinColumn(name="entry", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="tag", referencedColumnName="id")}
     *      )
     */
    protected $tags;

    /**
     * Entry constructor.
     */
    public function __construct()
    {
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
     * @return Entry
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
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
     * @return Entry
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
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
     * @return Entry
     */
    public function setDate(DateTime $date): self
    {
        $this->date = $date;
        return $this;
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
     * @return Entry
     */
    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getTags(): \Doctrine\Common\Collections\ArrayCollection
    {
        return $this->tags;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     * @return Entry
     */
    public function setAuthor(Author $author): self
    {
        $this->author = $author;
        return $this;
    }

    public function getPreview(): String
    {
        $out = wordwrap($this->content, 80, "\n", false);
        $out = explode("\n", $out, 2)[0] . '…';
        return $out;
    }

    /**
     * @param Tag $tag
     * @return Entry
     */
    public function addTag(Tag $tag): self
    {
        $this->tags->add($tag);
        return $this;
    }

    /**
     * @return bool
     */
    public function check(): bool
    {
        return isset($this->title) && isset($this->date) && isset($this->content) && isset($this->author) && !empty($this->title) && !empty($this->content);
    }


}