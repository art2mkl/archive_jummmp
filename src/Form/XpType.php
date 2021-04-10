<?php

namespace App\Form;

use App\Entity\Xp;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class XpType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('jobDateFrom',DateType::class, [
                'widget' => 'single_text',
                'placeholder' => 'dd/mm/aaaa',  
            ])
            ->add('jobDateTo',DateType::class, [
                'widget' => 'single_text',
                'placeholder' => 'dd/mm/aaaa',  
            ])
            ->add('jobName')
            ->add('companyName')
            ->add('jobLocation')
            ->add('jobDescription')
            // ->add('userId')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Xp::class,
        ]);
    }
}
