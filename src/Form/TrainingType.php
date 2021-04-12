<?php

namespace App\Form;

use App\Entity\Training;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class TrainingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('trainingDateFrom',DateType::class, [
                'widget' => 'single_text',
                'placeholder' => 'dd/mm/aaaa',  
            ])
            ->add('trainingDateTo',DateType::class, [
                'widget' => 'single_text',
                'placeholder' => 'dd/mm/aaaa',  
            ])
            ->add('diplomaName')
            ->add('schoolName')
            ->add('schoolLocation')
            ->add('diplomaDescription')
            // ->add('userId')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Training::class,
        ]);
    }
}
