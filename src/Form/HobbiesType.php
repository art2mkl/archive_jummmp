<?php

namespace App\Form;

use App\Entity\Hobbies;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class HobbiesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('hobbyName')
            ->add('icon', ChoiceType::class, [
                'placeholder' => 'Choisis une icone',
                'choices'  => [
                    'Logo de lecture' => 'fas fa-book-reader',
                    'Logo de musique' => 'fas fa-music',
                    'Logo de cinema' => 'fas fa-film',
                    'Logo de jeux vidéo' => 'fas fa-gamepad',
                    'Logo de voyage' => 'fas fa-suitcase',
                    'Logo de course à pied' => 'fas fa-running',
                    'Logo de skate' => 'fas fa-snowboarding',
                    'Logo de vélo' =>  'fas fa-biking',
                    'Logo de football' =>  'fas fa-futbol',
                    'Logo de ping pong' =>  'fas fa-table-tennis',
                ],
            ]
            
            )
            // ->add('userId')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Hobbies::class,
        ]);
    }
}
