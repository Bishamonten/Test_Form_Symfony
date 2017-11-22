<?php
/**
 * Created by PhpStorm.
 * User: emanuelevella
 * Date: 22/11/2017
 * Time: 10:36
 */
namespace App\Controller;

//use App\Fight\DamageCalculator;
use App\Form\FightType;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FightController extends Controller
{

    public function indexAction(Request $request, EntityManager $manager)
    {
        $form = $this->createForm(FightType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var \App\Fight\Fight $fight */
            $fight = $form->getData();
        }

        return $this->render('Fight/index.html.twig', ['form' => $form->createView()]);
    }
}
