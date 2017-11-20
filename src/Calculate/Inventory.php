<?php
/**
 * Created by PhpStorm.
 * User: emanuelevella
 * Date: 20/11/2017
 * Time: 15:57
 */

namespace App\Calculate;

class Inventory
{

    private $entityManager;
    private $person;
    private $inventory;

    /**
     * Inventory constructor.
     * @param $entityManager
     */
    public function __construct(\Doctrine\Orm\EntityManager $em)
    {
        $this->entityManager = $em;

    }

    public function calcul(){
        $poidTot = 0;
        \Doctrine\Common\Util\Debug::dump($this->inventory);
        foreach ($this->inventory as $items){
            $poidTot += $items->getMaterial()->getWeight() * $items->getNbItem();
        }
        return $poidTot > $this->person->getMaxWeight();
    }

    /**
     * @return \Doctrine\Orm\EntityManager
     */
    public function getEntityManager(): \Doctrine\Orm\EntityManager
    {
        return $this->entityManager;
    }

    /**
     * @param \Doctrine\Orm\EntityManager $entityManager
     */
    public function setEntityManager(\Doctrine\Orm\EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return mixed
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param mixed $person
     */
    public function setPerson($person)
    {
        $this->person = $person;
    }

    /**
     * @return mixed
     */
    public function getInventory()
    {
        return $this->inventory;
    }

    /**
     * @param mixed $inventory
     */
    public function setInventory($inventory)
    {
        $this->inventory = $inventory;
    }


}