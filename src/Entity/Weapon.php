<?php
/**
 * Created by PhpStorm.
 * User: emanuelevella
 * Date: 22/11/2017
 * Time: 08:55
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Weapon
 * @package App\Entity
 * @ORM\Entity
 * @Orm\Table(name="weapon")
 */
class Weapon
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
    protected $damage;

    /**
     * @ORM\Column(type="decimal")
     */
    protected $damageDistanceCoef;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $fireRate;

    /**
     * Weapon constructor.
     * @param $name
     * @param $damage
     * @param $damageDistanceCoef
     * @param int $fireRate
     */
    public function __construct($name, $damage, $damageDistanceCoef, $fireRate)
    {
        $this->name = $name;
        $this->damage = $damage;
        $this->damageDistanceCoef = $damageDistanceCoef;
        $this->fireRate = $fireRate;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getDamage()
    {
        return $this->damage;
    }

    /**
     * @return mixed
     */
    public function getDamageDistanceCoef()
    {
        return $this->damageDistanceCoef;
    }

    /**
     * @return int
     */
    public function getFireRate(): int
    {
        return $this->fireRate;
    }




}