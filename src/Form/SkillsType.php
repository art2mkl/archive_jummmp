<?php

namespace App\Form;

use App\Entity\Skills;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class SkillsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('icon', ChoiceType::class, [
            'placeholder' => 'Choisis une icone',
            'choices'  => [
                'Logo js' => 'fab fa-js',
                'Logo php' => 'fab fa-php',
                'Logo Symfony' => 'fab fa-symfony',
                'Logo Angular' => 'fab fa-angular',
                'Logo Vue-JS' => 'fab fa-vuejs',
                'Logo Python' => 'fab fa-python',
                'Logo bootstrap' => 'fab fa-bootstrap',
                'Logo wordpress' => 'fab fa-wordpress',
                'Logo node-js' => 'fab fa-node',
                'Logo html' => 'fab fa-hml5',
                'Logo css' => 'fab fa-css3-alt',
                'Logo sass' => 'fab fa-sass',
                'Logo SQL' => 'fab fas-database',
                'Logo Github' => 'fab fa-github',
                'Logo shell' => 'fas fa-terminal',
                
            ],
        ]
        
        )
            ->add('skillName')
            // ->add('userId')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Skills::class,
        ]);
    }
}
