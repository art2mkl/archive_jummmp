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
            ->add(
                'icon',
                ChoiceType::class,
                [
                    'placeholder' => 'Choisis ton icone',
                    'choices' => [
                        '📖' => '📖
                        ',
                        '🎼' => '🎼',
                        '🏃🏼‍♀️' => '🏃🏼‍♀️',
                        '🚴‍♀️' => '🚴‍♀️',
                        '🛹' => '🛹',
                        'L⛳️' => '⛳️',
                        '⚽️' => '⚽️',
                        '🎮' => '🎮',
                        '🎬' => '🎬',
                        '🏝' => '🏝',
                        '🧗‍♀️' => '🧗‍♀️',

                    ],
                ]
            )
            ->add('hobbyName')
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
