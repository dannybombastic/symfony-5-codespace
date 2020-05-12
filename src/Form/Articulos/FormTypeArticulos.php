<?php


namespace App\Form\Artticulos;


use App\From\Articulos\ArticulosForm as ArticulosArticulosForm;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;

class FormTypeArticulos extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('articuleTitle', EmailType::class, ['attr' => [
                'placeholder' => "Introduzca un texto",
                'aria-describedby' => "emailHelp",
                'type' => "email",
                "class" => "form-control",

            ]])
            ->add('articuleEval', NumberType::class,['attr' => [
                'placeholder' => "Introduzca un numero",
                'aria-describedby' => "emailHelp",
                'type' => "number",
                "class" => "form-control",

            ]])
            ->add('articuleVisitCnt', NumberType::class, ['attr' => [
                'placeholder' => "Introduzca un numero",
                'aria-describedby' => "emailHelp",
                'type' => "number",
                "class" => "form-control",

            ]])
            ->add('updateEntity', SubmitType::class, ['attr' => [
                'placeholder' => "Introduzca un texto",
                'aria-describedby' => "emailHelp",
                'type' => "email",
                "class" => "btn btn-primary",

            ]]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ArticulosArticulosForm::class,
        ]);
    }
}
