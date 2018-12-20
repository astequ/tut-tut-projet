<?php
/**
 * Created by PhpStorm.
 * User: astequ
 * Date: 08/12/18
 * Time: 23:42
 */

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tag")
 */
class Tag
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
    protected $label;

    /**
     * Tag constructor.
     * @param int $id
     * @param string $label
     */
    public function __construct(int $id, string $label)
    {
        $this->id = $id;
        $this->label = $label;
    }

    /**
     * @return int
     */
    public function getId(): int
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
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    /**
     * @return bool
     */
    public function check(): bool
    {
        //TODO
    }

}