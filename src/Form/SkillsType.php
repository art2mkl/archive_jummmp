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
            ->add(
                'icon',
                ChoiceType::class,
                [
                    'placeholder' => 'Choisis ton icone',
                    'choices' => [
                        'Logo PHP' => 'fab fa-php',
                        'Logo Java Script' => 'fab fa-js',
                        'Logo Angular' => 'fab fa-angular',
                        'Logo Symfony' => 'fab fa-symfony',
                        'Logo VueJS' => 'fab fa-vuejs',
                        'Logo de bootstrap' => 'fab fa-bootstrap',
                        'Logo de nodeJS' => 'fab fa-node-js',
                        'Logo de Wordpress' => 'fab fa-wordpress',
                        'Logo de html' => 'fab fa-html5',
                        'Logo de css' => 'fab fa-css3-alt',
                        'Logo de Sass' => 'fab fa-sass',
                        'Logo SQL' => 'fas fa-database',
                        'Logo Git' => 'fab fa-git-square',
                        'Logo Bash Shell' => 'fas fa-terminal',
                        'Logo Python' => 'fab fa-pŷthon',
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
