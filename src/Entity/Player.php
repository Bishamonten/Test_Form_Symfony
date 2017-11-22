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
 * Class Player
 * @package App\Entity
 * @ORM\Entity
 * @Orm\Table(name="player")
 */

class Player
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=40)
     */
    protected $name;
    /**
     * @ORM\Column(type="integer")
     */
    protected $healthPoints=100;

    /**
     * @ORM\ManyToOne(targetEntity="Weapon")
     */
    protected $currentWeapon;

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
    public function getHealthPoints(): int
    {
        return $this->healthPoints;
    }

    /**
     * @param int $healthPoints
     */
    public function setHealthPoints(int $healthPoints)
    {
        $this->healthPoints = $healthPoints;
    }

    /**
     * @return mixed
     */
    public function getCurrentWeapon()
    {
        return $this->currentWeapon;
    }

    /**
     * @param mixed $currentWeapon
     */
    public function setCurrentWeapon($currentWeapon)
    {
        $this->currentWeapon = $currentWeapon;
    }



}