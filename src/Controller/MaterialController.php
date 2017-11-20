<?php
/**
 * Created by PhpStorm.
 * User: emanuelevella
 * Date: 20/11/2017
 * Time: 13:26
 */

namespace App\Controller;


use App\Entity\Person;
use App\Entity\Material;
use App\Form\PersonType;
use Doctrine\DBAL\Types\DecimalType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\{
    NumberType, SubmitType, TextType, DateType, IntegerType, CheckboxType
};
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MaterialController extends Controller {
    public function new_(Request $request){

        $material = new Material();
        $material->setName('Wood');
        $material->setWeight('Wood');


        $form = $this->createFormBuilder($material)
            ->add('name', TextType::class)
            ->add('weight', NumberType::class)
            ->add('save', SubmitType::class, array('label' => 'creer'))
            ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($material);
            $em->flush();
            //return $this->redirectToRoute('person');
        }

        return $this->render(
            'Material/new.html.twig', ['form' => $form->createView(),]
        );
    }

    public function newGetPostAction(Request $request){
        $material = new Material();
        $form = $this->createForm(EntityType::class, $material);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($material);
            $em->flush();
        }
        return $this->render(
            'Material/newGetPostAction.html.twig', ['form' => $form->createView(),]
        );
    }


    public function index(){
        $em = $this->getDoctrine()->getManager();
        return $this->render(
            'Material/index.html.twig'
        );
    }

}