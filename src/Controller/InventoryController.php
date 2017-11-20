<?php
/**
 * Created by PhpStorm.
 * User: emanuelevella
 * Date: 20/11/2017
 * Time: 14:38
 */

namespace App\Controller;


use App\Entity\Inventory;
use App\Entity\Person;
use App\Entity\Material;
use App\Form\PersonType;
use Doctrine\DBAL\Types\DecimalType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\{
    NumberType, SubmitType, TextType, DateType, IntegerType, CheckboxType};
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InventoryController extends Controller {
    public function new_(Request $request){

        $inventory = new Inventory();
        $inventory->setNbItem(0);


        $form = $this->createFormBuilder($inventory)
            ->add('person')
            ->add('material')
            ->add('nbItem', IntegerType::class)
            ->add('save', SubmitType::class, array('label' => 'creer'))
            ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($inventory);
            $em->flush();
            $this->container->get('session')->GetFlashBag()->add('kek', 'You got it m8, good job.');
            //return $this->redirectToRoute('person');
        }

        return $this->render(
            'Inventory/new.html.twig', ['form' => $form->createView(),]
        );
    }

    public function newGetPostAction(Request $request){
        $inventory = new Inventory();
        $form = $this->createForm(EntityType::class, $inventory);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($inventory);
            $em->flush();
        }
        return $this->render(
            'Inventory/newGetPostAction.html.twig', ['form' => $form->createView(),]
        );
    }


    public function index(){
        $em = $this->getDoctrine()->getManager();
        return $this->render(
            'Inventory/index.html.twig'
        );
    }

}