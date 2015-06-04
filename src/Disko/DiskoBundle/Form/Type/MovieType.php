<?php

namespace Disko\DiskoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class MovieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, array ('label' => 'Titre'))
            ->add('year', null, array ('label' => 'Year'))
            ->add('director', null, array ('label' => 'Producteur'))
            ->add('image', new ImageType(),array ('label' => 'Uploader image'))

            ->add('save', 'submit', array('label' => 'Sauvegarder'));
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array('data_class' => 'Disko\DiskoBundle\Entity\Movie' ));

    }


    public function getName()
    {
        return 'movie';
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