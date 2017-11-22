<?php
/**
 * Created by PhpStorm.
 * User: emanuelevella
 * Date: 22/11/2017
 * Time: 10:42
 */
namespace App\Fight;

use App\Entity\Fight;
use App\Entity\Weapon;
use App\Form\FightType;

class DamageCalculator {
    public function Calculate(Weapon $weapon, $damage){
        $damage = $weapon->getDamage() - $weapon->getDamageDistanceCoef();
            if($damage < 0) {
            return 0;
            }
            return round($damage);
    }

    public function handle(Fight $fight){
        $weapon = $fight->player->getCurrentWeapon();
    }
}