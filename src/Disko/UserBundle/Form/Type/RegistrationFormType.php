<?php

namespace Disko\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Disko\DiskoBundle\Form\Type\ImageType;


class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fn', null, array('label' => 'Prénom :'))
            ->add('ln', null, array('label' => 'Nom :'))
            ->add('gender', 'choice', array(
                'choices'  => array('0' => 'Masculin', '1' => 'Féminin'),
                'required' => true,
                'label' => 'Sexe :'
            ))
            ->add('image', new ImageType(),array ('label' => 'Image de profile :'))
           // ->add('image', new ImageType())

            ->add('save', 'submit', array('label' => 'C\'est parti !'));

    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'disko_user_registration';
    }
}