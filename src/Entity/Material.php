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
 * Class Material
 * @package App\Entity
 * @ORM\Entity
 * @Orm\Table(name="materials")
 */

class Material
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
     * @ORM\Column(type="string", length=40)
     */
    protected $name;
    /**
     * @var float
     * @ORM\Column(type="float")
     */
    protected $weight;

    /**
     * @var Inventory[]
     * @ORM\OneToMany(targetEntity="inventories", mappedBy="Material")
     * @ORM\Column(nullable=true)
     */
    protected $inventories;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     */
    public function setWeight(float $weight)
    {
        $this->weight = $weight;
    }

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

    public function __toString()
    {
        return $this->name;
    }

}