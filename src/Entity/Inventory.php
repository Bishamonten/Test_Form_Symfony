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
 * Class Inventory
 * @package App\Entity
 * @ORM\Entity
 * @Orm\Table(name="inventories")
 */

class Inventory
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var Person
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="inventories")
     * @ORM\JoinColumn(name="person_id", referencedColumnName="id")
     */
    protected $person;
    /**
     * @var Material
     * @ORM\ManyToOne(targetEntity="Material", inversedBy="inventories")
     * @ORM\JoinColumn(name="material_id", referencedColumnName="id")
     */
    protected $material;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $nbItem;

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
     * @return int
     */
    public function getNbItem(): int
    {
        return $this->nbItem;
    }

    /**
     * @param int $nbItem
     */
    public function setNbItem(int $nbItem)
    {
        $this->nbItem = $nbItem;
    }

    /**
     * @return Person
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param Person $person
     */
    public function setPerson(Person $person)
    {
        $this->person = $person;
    }

    /**
     * @return Material
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * @param Material $material
     */
    public function setMaterial(Material $material)
    {
        $this->material = $material;
    }





}


