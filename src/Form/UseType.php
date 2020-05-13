<?php

namespace App\Form;

use App\Entity\Articulos\Articles;
use App\Entity\Articulos\Categories;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UseType extends AbstractType
{

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Articles::class,
            'categorias' => null
        ]);
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('artTitle', TextType::class, [
                'attr' => [
                    'placeholder' => "Introduzca un Titule",
                    'aria-describedby' => "emailHelp",
                    "class" => "form-control",
                ],
                'label' => "Titulo Articulo"

            ])
            ->add('artDesc', TextType::class, [
                'attr' => [
                    'placeholder' => "Introduzca la descripcion",
                    'aria-describedby' => "emailHelp",
                    "class" => "form-control",
                ],
                'label' => "Decripcion Articulo"
            ])
            ->add('artEvalu', NumberType::class, [
                'attr' => [
                    'placeholder' => "Introduzca la evaluacion",
                    'aria-describedby' => "emailHelp",
                    "class" => "form-control",
                ],
                'label' => "Titulo Evaluacion"
            ])
            ->add('visitedCnt', NumberType::class, [
                'attr' => [
                    'placeholder' => "Introduzca la evaluacion",
                    'aria-describedby' => "emailHelp",
                    "class" => "form-control",
                ],
                'label' => "Visitas Articulo"
            ])
            ->add('visitedAt')
            ->add('createAt')
            ->add(
                'idCat',
                ChoiceType::class,
                [
                    'label' => "Titulo Evaluacion",
                    'attr' => [
                        'placeholder' => "Introduzca la evaluacion",
                        'aria-describedby' => "emailHelp",
                        "class" => "form-control",
                    ],
                    'choices' => $options["categorias"],
                    'choice_value' => 'id',
                    'choice_label' => function (?Categories $category) {
                        return $category ? strtoupper($category->getName()) : '';
                    },
                    'choice_attr' => function ($choice, $key, $value) {
                        // adds a class like attending_yes, attending_no, etc
                        return ['class' => 'attending_' . strtolower($key)];
                    },
                ]
            )->add(
                "Save_it", SubmitType::class
            );
    }
}
