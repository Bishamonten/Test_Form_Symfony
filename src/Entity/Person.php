<?php
/**
 * Created by PhpStorm.
 * User: emanuelevella
 * Date: 13/11/2017
 * Time: 14:11
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Person
 * @package App\Entity
 * @ORM\Entity
 * @Orm\Table(name="persons")
 */

class Person
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=40)
     */
    protected $name;
    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $max_weight;

    /**
     * @var Inventory[]
     * @ORM\OneToMany(targetEntity="inventories", mappedBy="person")
     * @ORM\Column(nullable=true)
     */
    protected $inventories;

    /**
     * @return Inventory[]
     */
    public function getInventories(): array
    {
        return $this->inventories;
    }

    /**
     * @param Inventory[] $inventories
     */
    public function setInventories(array $inventories)
    {
        $this->inventories = $inventories;
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
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getMaxWeight(): int
    {
        return $this->max_weight;
    }

    /**
     * @param int $max_weight
     */
    public function setMaxWeight(int $max_weight)
    {
        $this->max_weight = $max_weight;
    }

    public function __toString()
    {
        return $this->name;
    }


}