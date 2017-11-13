<?php
/**
 * Created by PhpStorm.
 * User: emanuelevella
 * Date: 13/11/2017
 * Time: 14:19
 */

namespace App\Controller;


use App\Entity\Person;
use App\Form\PersonType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\{SubmitType, TextType, DateType, IntegerType, CheckboxType};
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PersonController extends Controller
{
    public function new_(Request $request){

        $person = new Person();
        $person->setName('salut');
        $person->setCreatedAt(new \DateTime('now'));

        $form = $this->createFormBuilder($person)
            ->add('name', TextType::class)
            ->add('age', IntegerType::class)
            ->add('color', TextType::class)
            ->add('visible', CheckboxType::class)
            ->add('createdAt', DateType::class)
            ->add('save', SubmitType::class, array('label' => 'creer'))
            ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($person);
            $em->flush();
            //return $this->redirectToRoute('person');
        }

        return $this->render(
            'Person/new.html.twig', ['form' => $form->createView(),]
        );
    }

        public function newGetPostAction(Request $request){
            $person = new Person();
            $form = $this->createForm(EntityType::class, $person);
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($person);
                $em->flush();
            }
            return $this->render(
                'Person/newGetPostAction.html.twig', ['form' => $form->createView(),]
            );
        }


    public function index(){
        $em = $this->getDoctrine()->getManager();
        return $this->render(
            'Person/index.html.twig'
        );
    }
}