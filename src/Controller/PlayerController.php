<?php
/**
 * Created by PhpStorm.
 * User: emanuelevella
 * Date: 22/11/2017
 * Time: 10:34
 */
namespace App\Controller;

use App\Entity\Player;
use App\Form\PlayerType;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PlayerController extends Controller
{
    public function indexAction()
    {
        $players = $this->getDoctrine()->getRepository(Player::class)->findAll();

        return $this->render('Player/index.html.twig', ['players' => $players]);
    }

    public function playerNew()
    {
        $players = $this->getDoctrine()->getRepository(Player::class)->findAll();

        return $this->render('Player/index.html.twig', ['players' => $players]);
    }
}