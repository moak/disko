<?php

namespace Disko\DiskoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class VoteMovieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mark', 'choice', array(
                'label' => 'Note',
                'placeholder' => 'Voter pour ce film',
                'choices'  => array(0 => 0,1 => 1 ,2 => 2 ,3 => 3, 4 => 4, 5 => 5 ),
                'required' => true,
            ))
            ->add('save', 'submit', array('label' => 'Voter'));

    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array('data_class' => 'Disko\DiskoBundle\Entity\Vote' ));

    }


    public function getName()
    {
        return 'vote';
    }
}

           /* ->add('player', 'entity', array
            (
                'class' => 'COC\COCBundle\Entity\Player',
                'query_builder' => function(\Application\Sonata\UserBundle\Repository\UserRepository $repository)
                {
                    return $repository->getNonAssignedUsers();
                }
            ))
           */