<?php


namespace App\Form;

use App\Entity\Fight;
use App\Entity\Player;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\{SubmitType, TextType, DateType, IntegerType, CheckboxType};




class PlayerType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("player", EntityType::class, [
                'class' => Player::class,
                'choice_label' => "name",
                'multiple' => false,
                'expanded' => false
            ])
            ->add("target", EntityType::class, [
                'class' => Player::class,
                'choice_label' => "name",
                'multiple' => false,
                'expanded' => false
            ])
            ->add("distance", IntegerType::class)
            ->add("save", SubmitType::class, array('label' => "creer"));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
    }

}