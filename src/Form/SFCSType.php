<?php
/**
 * Created by PhpStorm.
 * User: Student
 * Date: 25-01-18
 * Time: 15:08
 */

namespace App\Form;

use App\Entity\Sfcs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SFCSType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NameSfc', TextType::class)
            ->add('description', TextType::class)
            ->add('indicatorObservable1', TextType::class)
            ->add('indicatorObservable2', TextType::class)
            ->add('indicatorObservable3', TextType::class)
            ->add('indicatorObservable4', TextType::class)
            ->add('indicatorGeneric1', TextType::class)
            ->add('indicatorGeneric2', TextType::class)
            ->add('indicatorGeneric3', TextType::class)
            ->add('indicatorGeneric4', TextType::class)


        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Sfcs::class,
        ));
    }
}