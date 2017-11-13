<?php


namespace App\Form;

use App\Entity\Person;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\{SubmitType, TextType, DateType, IntegerType, CheckboxType};




class PersonType extends AbstractType{

    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults(array(
            'data_class' => Entity::class,
            ));
    }


    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add("name", TextType::class)
            ->add('name', TextType::class)
            ->add('age', IntegerType::class)
            ->add('color', TextType::class)
            ->add('visible', CheckboxType::class)
            ->add('createdAt', DateType::class)
            ->add('save', SubmitType::class, array('label' => 'creer'));
    }


    public function getBlockPrefix(){
        return 'app_person';
    }

    public function getParent()
    {
        return EntityType::class;
    }


}