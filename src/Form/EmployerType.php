<?php

namespace App\Form;

use App\Entity\Employer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Service;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EmployerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mat',TextType::class)
            ->add('nom',TextType::class)
            ->add('dateneS')
            ->add('salair',TextType::class)
            ->add('Service',EntityType::class,
            ['class'=>Service::class,'choice_label'=>'lib']
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Employer::class,
        ]);
    }
}
