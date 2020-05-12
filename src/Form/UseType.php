<?php

namespace App\Form;

use App\Entity\Articulos\Articles;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('artTitle')
            ->add('artDesc')
            ->add('artEvalu')
            ->add('visitedCnt')
            ->add('visitedAt')
            ->add('createAt')
            ->add('isActive')
            ->add('idCat')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Articles::class,
        ]);
    }
}
